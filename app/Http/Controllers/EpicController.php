<?php
namespace App\Http\Controllers;

use App\Models\Epic;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EpicController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read epics', only: ['index', 'show']),
            new Middleware('can:create epics', only: ['create', 'store']),
            new Middleware('can:update epics', only: ['edit', 'update']),
            new Middleware('can:delete epics', only: ['destroy']),
        ];
    }

    public function index()
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        if ($perPage === 'all') {
            $epics = Epic::with('project')->latest()->paginate(100000);
        } else {
            $epics = Epic::with('project')->latest()->paginate((int) $perPage);
        }
        return view('epics.index', compact('epics'));
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        return view('epics.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
        ]);
        Epic::create($data);
        return redirect()->route('epics.index')->with('success', 'Epic created.');
    }

    public function show(Epic $epic)
    {
        $epic->load('project','tasks');
        return view('epics.show', compact('epic'));
    }

    public function edit(Epic $epic)
    {
        $projects = Project::orderBy('name')->get();
        return view('epics.edit', compact('epic','projects'));
    }

    public function update(Request $request, Epic $epic)
    {
        $data = $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
        ]);
        $epic->update($data);
        return redirect()->route('epics.show', $epic)->with('success', 'Epic updated.');
    }

    public function destroy(Epic $epic)
    {
        $epic->delete();
        return redirect()->route('epics.index')->with('success', 'Epic deleted.');
    }
}
