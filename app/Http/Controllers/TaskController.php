<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Epic;
use App\Models\Sprint;
use App\Models\User;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function index(\Illuminate\Http\Request $request)
    {
        $projects = Project::orderBy('name')->get();
        return view('tasks.index', compact('projects'));
    }

    public function index_async(\Illuminate\Http\Request $request)
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        if ($perPage === 'all') {
            $perPage = Task::count() ?: 1000;
        }

        $query = Task::with('project','assignee','epic','sprint')
            ->leftJoin('sprints', 'tasks.sprint_id', '=', 'sprints.id')
            ->select('tasks.*');

        if ($request->filled('search')) {
            $query->where('tasks.title', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('project_id')) {
            $query->where('tasks.project_id', $request->project_id);
        }
        
        if ($request->filled('status')) {
            $query->where('tasks.status', $request->status);
        }

        $tasks = $query->orderBy('sprints.name', 'asc')
            ->orderBy('tasks.epic_id', 'asc')
            ->orderBy('tasks.story_points', 'asc')
            ->paginate((int)$perPage);
            
        return response()->json([
            'html' => view('tasks.index_async', compact('tasks'))->render(),
            'pagination' => (string) $tasks->appends($request->query())->links()
        ]);
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        $epics    = Epic::with('project')->orderBy('name')->get();
        $sprints  = Sprint::with('project')->orderBy('name')->get();
        $users    = User::orderBy('name')->get();
        $brdDocuments = \App\Models\BrdDocument::orderBy('title')->get();
        return view('tasks.create', compact('projects','epics','sprints','users','brdDocuments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'     => 'required|exists:projects,id',
            'epic_id'        => 'nullable|exists:epics,id',
            'sprint_id'      => 'nullable|exists:sprints,id',
            'assignee_id'    => 'nullable|exists:users,id',
            'brd_document_id'=> 'nullable|exists:brd_documents,id',
            'type'           => 'required|string',
            'priority'       => 'required|string',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'status'         => 'required|string',
            'story_points'   => 'nullable|integer',
            'estimated_hours'=> 'nullable|numeric',
            'start_date'     => 'nullable|date',
            'due_date'       => 'nullable|date|after_or_equal:start_date',
        ]);
        $data['reporter_id'] = auth()->id();
        Task::create($data);
        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function show(Task $task)
    {
        $task->load('project','epic','sprint','reporter','assignee','children','comments.user');
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::orderBy('name')->get();
        $epics    = Epic::with('project')->orderBy('name')->get();
        $sprints  = Sprint::with('project')->orderBy('name')->get();
        $users    = User::orderBy('name')->get();
        $brdDocuments = \App\Models\BrdDocument::orderBy('title')->get();
        return view('tasks.edit', compact('task','projects','epics','sprints','users','brdDocuments'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'project_id'     => 'required|exists:projects,id',
            'epic_id'        => 'nullable|exists:epics,id',
            'sprint_id'      => 'nullable|exists:sprints,id',
            'assignee_id'    => 'nullable|exists:users,id',
            'brd_document_id'=> 'nullable|exists:brd_documents,id',
            'type'           => 'required|string',
            'priority'       => 'required|string',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'status'         => 'required|string',
            'story_points'   => 'nullable|integer',
            'estimated_hours'=> 'nullable|numeric',
            'start_date'     => 'nullable|date',
            'due_date'       => 'nullable|date|after_or_equal:start_date',
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
