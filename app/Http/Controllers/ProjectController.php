<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;


class ProjectController extends Controller
{

    public function index()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        if ($perPage === 'all') {
            $projects = Project::with('owner')->latest()->paginate(100000);
        } else {
            $projects = Project::with('owner')->latest()->paginate((int) $perPage);
        }
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'key'         => 'required|string|max:50|unique:projects,key',
            'description' => 'nullable|string',
            'owner_id'    => 'required|exists:users,id',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
        ]);
        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'Project created.');
    }

    public function show(Project $project)
    {
        $project->load('owner','epics','sprints','tasks','features');
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::orderBy('name')->get();
        return view('projects.edit', compact('project','users'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'key'         => 'required|string|max:50|unique:projects,key,'.$project->id,
            'description' => 'nullable|string',
            'owner_id'    => 'required|exists:users,id',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
        ]);
        $project->update($data);
        return redirect()->route('projects.show', $project)->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}
