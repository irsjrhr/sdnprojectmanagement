<?php
namespace App\Http\Controllers;

use App\Models\BlueprintDocument;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BlueprintController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read.blueprints', only: ['index', 'show', 'index_async']),
            new Middleware('can:create.blueprints', only: ['create', 'store']),
            new Middleware('can:update.blueprints', only: ['edit', 'update']),
            new Middleware('can:delete.blueprints', only: ['destroy']),
        ];
    }

    public function index()
    {
        $projects = Project::orderBy('name')->get();
        return view('blueprints.index', compact('projects'));
    }

    public function index_async(Request $request)
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        $query = BlueprintDocument::with('project', 'author')->orderBy('title', 'asc');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($perPage === 'all') {
            $blueprints = $query->paginate(100000);
        } else {
            $blueprints = $query->paginate((int) $perPage);
        }
        
        return response()->json([
            'html' => view('blueprints.index_async', compact('blueprints'))->render(),
            'pagination' => (string) $blueprints->appends($request->query())->links()
        ]);
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        $users    = User::orderBy('name')->get();
        return view('blueprints.create', compact('projects','users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'title'        => 'required|string|max:255',
            'background'   => 'nullable|string',
            'scope'        => 'nullable|string',
            'out_of_scope' => 'nullable|string',
            'status'       => 'required|string',
        ]);
        $data['author_id'] = auth()->id();
        BlueprintDocument::create($data);
        return redirect()->route('blueprints.index')->with('success', 'Blueprint created.');
    }

    public function show(BlueprintDocument $blueprint)
    {
        $blueprint->load('project','author','approvedBy');
        return view('blueprints.show', compact('blueprint'));
    }

    public function edit(BlueprintDocument $blueprint)
    {
        $projects = Project::orderBy('name')->get();
        $users    = User::orderBy('name')->get();
        return view('blueprints.edit', compact('blueprint','projects','users'));
    }

    public function update(Request $request, BlueprintDocument $blueprint)
    {
        $data = $request->validate([
            'project_id'   => 'required|exists:projects,id',
            'title'        => 'required|string|max:255',
            'background'   => 'nullable|string',
            'scope'        => 'nullable|string',
            'out_of_scope' => 'nullable|string',
            'status'       => 'required|string',
        ]);
        if (!$blueprint->author_id) {
            $data['author_id'] = auth()->id();
        }
        $blueprint->update($data);
        return redirect()->route('blueprints.show', $blueprint)->with('success', 'Blueprint updated.');
    }

    public function destroy(BlueprintDocument $blueprint)
    {
        $blueprint->delete();
        return redirect()->route('blueprints.index')->with('success', 'Blueprint deleted.');
    }
}
