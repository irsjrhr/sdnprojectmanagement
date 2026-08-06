<?php
namespace App\Http\Controllers;

use App\Models\BrdDocument;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BrdDocumentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read brd', only: ['index', 'show', 'index_async']),
            new Middleware('can:create brd', only: ['create', 'store']),
            new Middleware('can:update brd', only: ['edit', 'update']),
            new Middleware('can:delete brd', only: ['destroy']),
        ];
    }

    public function index()
    {
        $projects = Project::orderBy('name')->get();
        return view('brd-documents.index', compact('projects'));
    }

    public function index_async(Request $request)
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        $query = BrdDocument::with('project', 'pic')->orderBy('brd_code', 'asc');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('brd_code', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($perPage === 'all') {
            $brds = $query->paginate(100000);
        } else {
            $brds = $query->paginate((int) $perPage);
        }
        
        return response()->json([
            'html' => view('brd-documents.index_async', compact('brds'))->render(),
            'pagination' => (string) $brds->appends($request->query())->links()
        ]);
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        $tasks    = Task::orderBy('title')->get();
        $users    = User::orderBy('name')->get();
        return view('brd-documents.create', compact('projects','tasks','users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brd_code'   => 'required|string|max:50',
            'title'      => 'required|string|max:255',
            'project_id' => 'nullable|exists:projects,id',
            'task_id'    => 'nullable|exists:tasks,id',
            'pic_id'     => 'nullable|exists:users,id',
            'status'     => 'required|string',
            'content'    => 'nullable|string',
        ]);
        BrdDocument::create($data);
        return redirect()->route('brd-documents.index')->with('success', 'BRD Document created.');
    }

    public function show(BrdDocument $brdDocument)
    {
        $brdDocument->load('project','task','pic');
        return view('brd-documents.show', compact('brdDocument'));
    }

    public function edit(BrdDocument $brdDocument)
    {
        $projects = Project::orderBy('name')->get();
        $tasks    = Task::orderBy('title')->get();
        $users    = User::orderBy('name')->get();
        return view('brd-documents.edit', compact('brdDocument','projects','tasks','users'));
    }

    public function update(Request $request, BrdDocument $brdDocument)
    {
        $data = $request->validate([
            'brd_code'   => 'required|string|max:50',
            'title'      => 'required|string|max:255',
            'project_id' => 'nullable|exists:projects,id',
            'task_id'    => 'nullable|exists:tasks,id',
            'pic_id'     => 'nullable|exists:users,id',
            'status'     => 'required|string',
            'content'    => 'nullable|string',
        ]);
        $brdDocument->update($data);
        return redirect()->route('brd-documents.show', $brdDocument)->with('success', 'BRD Document updated.');
    }

    public function destroy(BrdDocument $brdDocument)
    {
        $brdDocument->delete();
        return redirect()->route('brd-documents.index')->with('success', 'BRD Document deleted.');
    }
}
