<?php
namespace App\Http\Controllers;

use App\Models\Erd;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ErdController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read erds', only: ['index', 'show']),
            new Middleware('can:create erds', only: ['create', 'store']),
            new Middleware('can:update erds', only: ['edit', 'update']),
            new Middleware('can:delete erds', only: ['destroy']),
        ];
    }
    public function index()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        if ($perPage === 'all') {
            $erds = Erd::latest()->paginate(100000);
        } else {
            $erds = Erd::latest()->paginate((int) $perPage);
        }
        return view('erds.index', compact('erds'));
    }

    public function create()
    {
        return view('erds.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'        => 'required|string|unique:erds,code',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'content'     => 'nullable|string',
            'dbml'        => 'nullable|string',
        ]);
        if (empty($data['dbml']) && !empty($data['content'])) {
            $data['dbml'] = $this->generateDbmlFromContent($data['content']);
        }
        
        Erd::create($data);
        return redirect()->route('erds.index')->with('success', 'ERD created.');
    }

    public function show(Erd $erd)
    {
        return view('erds.show', compact('erd'));
    }

    public function edit(Erd $erd)
    {
        return view('erds.edit', compact('erd'));
    }

    public function update(Request $request, Erd $erd)
    {
        $data = $request->validate([
            'code'        => 'required|string|unique:erds,code,'.$erd->id,
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'content'     => 'nullable|string',
            'dbml'        => 'nullable|string',
        ]);
        if (empty($data['dbml']) && !empty($data['content'])) {
            $data['dbml'] = $this->generateDbmlFromContent($data['content']);
        }
        
        $erd->update($data);
        return redirect()->route('erds.show', $erd)->with('success', 'ERD updated.');
    }

    public function destroy(Erd $erd)
    {
        $erd->delete();
        return redirect()->route('erds.index')->with('success', 'ERD deleted.');
    }

    private function generateDbmlFromContent($content)
    {
        $text = str_ireplace(['<li>', '</li>', '<br>', '<br/>', '<p>', '</p>', '<h4>', '</h4>', '<h3>', '</h3>'], "\n", $content);
        $text = html_entity_decode(strip_tags($text), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $lines = explode("\n", $text);
        
        // Pass 1: Collect all valid tables to prevent DBML syntax errors on non-existent refs
        $allTables = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (preg_match('/Table:\s*([a-zA-Z0-9_]+)/i', $line, $matches)) {
                $allTables[] = $matches[1];
            }
        }

        // Pass 2: Parse tables and columns
        $tablesData = [];
        $rawRelations = [];
        $currentTable = null;
        $inTable = false;

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            
            // Match table header
            if (preg_match('/Table:\s*([a-zA-Z0-9_]+)/i', $line, $matches)) {
                $currentTable = $matches[1];
                if (!isset($tablesData[$currentTable])) {
                    $tablesData[$currentTable] = [];
                }
                $inTable = true;
                continue;
            }

            // Match column
            if ($inTable && preg_match('/^([a-zA-Z0-9_]+)\s*\(/', $line, $matches)) {
                $column = $matches[1];
                $rest = trim(substr($line, strlen($column)));
                
                $dashPos = strpos($rest, ') - ');
                if ($dashPos !== false) {
                    $propsString = substr($rest, 1, $dashPos - 1);
                    $commentText = trim(substr($rest, $dashPos + 4));
                } else {
                    $lastParen = strrpos($rest, ')');
                    $propsString = substr($rest, 1, $lastParen - 1);
                    $commentText = '';
                }

                // Remove data type precision e.g. DECIMAL(10, 8) -> DECIMAL
                $propsString = preg_replace('/\([^)]*\)/', '', $propsString);
                $props = array_map('trim', explode(',', $propsString));
                $type = array_shift($props);
                
                $dbmlProps = [];
                $isFk = false;
                
                foreach ($props as $prop) {
                    $prop = strtoupper($prop);
                    if ($prop === 'PK') {
                        $dbmlProps[] = 'primary key';
                    } elseif (str_contains($prop, 'NULLABLE')) {
                        $dbmlProps[] = 'null';
                    } elseif (str_contains($prop, 'FK')) {
                        $isFk = true;
                    }
                }
                
                if ($isFk) {
                    $rawRelations[] = ['source' => $currentTable, 'col' => $column];
                }

                if (!empty($commentText)) {
                    $commentText = str_replace("'", "\'", $commentText);
                    $dbmlProps[] = "note: '$commentText'";
                }

                $propStr = !empty($dbmlProps) ? ' [' . implode(', ', $dbmlProps) . ']' : '';
                $tablesData[$currentTable][$column] = "$type$propStr";
             } elseif ($inTable && (str_starts_with($line, '[NEW]') || str_starts_with($line, '[MODIFY]') || preg_match('/^[0-9]+\.\s/', $line))) {
                $inTable = false;
                $currentTable = null;
            }
        }

        $allTables = array_keys($tablesData);

        // Resolve relations safely
        $resolvedRelations = [];
        foreach ($rawRelations as $rel) {
            $col = $rel['col'];
            $sourceTable = $rel['source'];
            $targetBase = preg_replace('/(_\d+)?_id$/', '', $col);
            $targetTable = Str::plural($targetBase);
            
            if (in_array($targetTable, $allTables)) {
                $resolvedRelations[] = "Ref: $sourceTable.$col > $targetTable.id";
                continue;
            }
            
            // Try fallback 1: chop first prefix word (e.g. local_currency -> currency)
            $parts = explode('_', $targetBase);
            if (count($parts) > 1) {
                array_shift($parts); // remove prefix
                $targetTable2 = Str::plural(implode('_', $parts));
                if (in_array($targetTable2, $allTables)) {
                    $resolvedRelations[] = "Ref: $sourceTable.$col > $targetTable2.id";
                    continue;
                }
                
                // Try fallback 2: chop second prefix (e.g. reference_sales_invoice -> sales_invoice)
                if (count($parts) > 1) {
                    array_shift($parts);
                    $targetTable3 = Str::plural(implode('_', $parts));
                    if (in_array($targetTable3, $allTables)) {
                        $resolvedRelations[] = "Ref: $sourceTable.$col > $targetTable3.id";
                        continue;
                    }
                }
            }

            // Try fallback 3: self-referencing tree (parent_id)
            if ($col === 'parent_id') {
                $resolvedRelations[] = "Ref: $sourceTable.$col > $sourceTable.id";
                continue;
            }

            // Specific hardcoded heuristics for common enterprise structures
            if (str_ends_with($col, 'customer_id') || str_ends_with($col, 'ship_to_id') || str_ends_with($col, 'bill_to_id')) {
                if (in_array('customers', $allTables)) $resolvedRelations[] = "Ref: $sourceTable.$col > customers.id";
                continue;
            }
            if (str_ends_with($col, 'supplier_id')) {
                if (in_array('suppliers', $allTables)) $resolvedRelations[] = "Ref: $sourceTable.$col > suppliers.id";
                continue;
            }
            if (str_ends_with($col, 'coa_id')) {
                if (in_array('coas', $allTables)) $resolvedRelations[] = "Ref: $sourceTable.$col > coas.id";
                continue;
            }

            // If all fails, DO NOT add the Ref to prevent DBML syntax errors!
        }

        // Build unified DBML text output
        $dbml = "";
        foreach ($tablesData as $tableName => $columns) {
            if (empty($columns)) continue;
            $dbml .= "Table $tableName {\n";
            foreach ($columns as $colName => $colDef) {
                $dbml .= "  $colName $colDef\n";
            }
            $dbml .= "}\n\n";
        }

        $resolvedRelations = array_unique($resolvedRelations);
        $dbml .= implode("\n", $resolvedRelations);

        return $dbml;
    }
}
