<?php
namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Models\Project;
use Illuminate\Http\Request;


class SprintController extends Controller
{

    public function index()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        if ($perPage === 'all') {
            $sprints = Sprint::with('project')->orderBy('name', 'asc')->paginate(100000);
        } else {
            $sprints = Sprint::with('project')->orderBy('name', 'asc')->paginate((int) $perPage);
        }
        return view('sprints.index', compact('sprints'));
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        return view('sprints.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name'       => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
            'goal'       => 'nullable|string',
            'status'     => 'required|string',
        ]);
        Sprint::create($data);
        return redirect()->route('sprints.index')->with('success', 'Sprint created.');
    }

    public function show(Sprint $sprint)
    {
        $sprint->load('project','tasks');
        return view('sprints.show', compact('sprint'));
    }

    public function edit(Sprint $sprint)
    {
        $projects = Project::orderBy('name')->get();
        return view('sprints.edit', compact('sprint','projects'));
    }

    public function update(Request $request, Sprint $sprint)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name'       => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
            'goal'       => 'nullable|string',
            'status'     => 'required|string',
        ]);
        $sprint->update($data);
        return redirect()->route('sprints.show', $sprint)->with('success', 'Sprint updated.');
    }

    public function destroy(Sprint $sprint)
    {
        $sprint->delete();
        return redirect()->route('sprints.index')->with('success', 'Sprint deleted.');
    }
}
