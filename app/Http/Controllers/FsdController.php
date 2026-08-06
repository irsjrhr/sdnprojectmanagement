<?php
namespace App\Http\Controllers;

use App\Models\Fsd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FsdController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read.fsds', only: ['index', 'show', 'index_async']),
            new Middleware('can:create.fsds', only: ['create', 'store']),
            new Middleware('can:update.fsds', only: ['edit', 'update']),
            new Middleware('can:delete.fsds', only: ['destroy']),
        ];
    }
    public function index()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        $search = request('search', '');
        
        $query = Fsd::orderBy('code', 'asc');
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        if ($perPage === 'all') {
            $fsds = $query->paginate(100000);
        } else {
            $fsds = $query->paginate((int) $perPage);
        }
        
        return view('fsds.index', compact('fsds'));
    }

    public function index_async()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        $search = request('search', '');
        
        $query = Fsd::orderBy('code', 'asc');
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        if ($perPage === 'all') {
            $fsds = $query->paginate(100000);
        } else {
            $fsds = $query->paginate((int) $perPage);
        }
        
        return response()->json([
            'html' => view('fsds.index_async', compact('fsds'))->render(),
            'pagination' => (string) $fsds->appends(request()->query())->links()
        ]);
    }

    public function create()
    {
        return view('fsds.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'        => 'required|string|unique:fsds,code',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'content'     => 'nullable|string',
        ]);
        Fsd::create($data);
        return redirect()->route('fsds.index')->with('success', 'FSD created.');
    }

    public function show(Fsd $fsd)
    {
        return view('fsds.show', compact('fsd'));
    }

    public function edit(Fsd $fsd)
    {
        return view('fsds.edit', compact('fsd'));
    }

    public function update(Request $request, Fsd $fsd)
    {
        $data = $request->validate([
            'code'        => 'required|string|unique:fsds,code,'.$fsd->id,
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'content'     => 'nullable|string',
        ]);
        $fsd->update($data);
        return redirect()->route('fsds.show', $fsd)->with('success', 'FSD updated.');
    }

    public function destroy(Fsd $fsd)
    {
        $fsd->delete();
        return redirect()->route('fsds.index')->with('success', 'FSD deleted.');
    }
}
