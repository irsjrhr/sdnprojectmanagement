<?php
namespace App\Http\Controllers;

use App\Models\ProjectFeature;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectFeatureController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read.features', only: ['index', 'show']),
            new Middleware('can:create.features', only: ['create', 'store']),
            new Middleware('can:update.features', only: ['edit', 'update']),
            new Middleware('can:delete.features', only: ['destroy']),
        ];
    }

    public function index()
    {
        $projects = Project::orderBy('name')->get();
        return view('project-features.index', compact('projects'));
    }

    public function index_async(Request $request)
    {
        if (request()->has('per_page')) {
            session(['global_per_page' => request('per_page')]);
        }
        $perPage = session('global_per_page', 20);
        
        // Mengurutkan berdasarkan angka di dalam brd_code (misal: "BRD-99" -> 99)
        $query = ProjectFeature::with(['project', 'brdDocument', 'fsdDocument'])
            ->orderByRaw("CAST(SUBSTRING(brd_code, 5) AS UNSIGNED) ASC");

        // Hide mandatory features from clients / non-managers
        if (!auth()->user()->hasPermissionTo('update features')) {
            $query->where('is_mandatory', false);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }
        
        if ($request->filled('is_gap')) {
            $query->where('is_gap', $request->is_gap == 'yes' ? 1 : 0);
        }

        if ($perPage === 'all') {
            $features = $query->paginate(100000);
        } else {
            $features = $query->paginate((int) $perPage);
        }
        
        return response()->json([
            'html' => view('project-features.index_async', compact('features'))->render(),
            'pagination' => (string) $features->appends($request->query())->links()
        ]);
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        return view('project-features.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'     => 'required|exists:projects,id',
            'name'           => 'required|string|max:255',
            'blueprint_code' => 'nullable|string',
            'brd_code'       => 'nullable|string',
            'fsd_code'       => 'nullable|string',
            'is_selected'    => 'boolean',
            'is_gap'         => 'boolean',
            'description'    => 'nullable|string',
        ]);
        $data['is_selected'] = $request->boolean('is_selected');
        $data['is_gap']      = $request->boolean('is_gap');
        ProjectFeature::create($data);
        return redirect()->route('project-features.index')->with('success', 'Feature created.');
    }

    public function show(ProjectFeature $projectFeature)
    {
        $projectFeature->load('project');
        return view('project-features.show', compact('projectFeature'));
    }

    public function edit(ProjectFeature $projectFeature)
    {
        $projects = Project::orderBy('name')->get();
        return view('project-features.edit', compact('projectFeature','projects'));
    }

    public function update(Request $request, ProjectFeature $projectFeature)
    {
        $data = $request->validate([
            'project_id'     => 'required|exists:projects,id',
            'name'           => 'required|string|max:255',
            'blueprint_code' => 'nullable|string',
            'brd_code'       => 'nullable|string',
            'fsd_code'       => 'nullable|string',
            'description'    => 'nullable|string',
        ]);
        $data['is_selected'] = $request->boolean('is_selected');
        $data['is_gap']      = $request->boolean('is_gap');
        $projectFeature->update($data);
        return redirect()->route('project-features.show', $projectFeature)->with('success', 'Feature updated.');
    }

    public function destroy(ProjectFeature $projectFeature)
    {
        $projectFeature->delete();
        return redirect()->route('project-features.index')->with('success', 'Feature deleted.');
    }

    public function toggle(ProjectFeature $projectFeature)
    {
        if (!auth()->user()->hasPermissionTo('update features') && !auth()->user()->hasPermissionTo('edit feature gap')) {
            abort(403, 'Unauthorized action.');
        }

        $projectFeature->update(['is_selected' => !$projectFeature->is_selected]);
        return response()->json([
            'success' => true, 
            'is_selected' => $projectFeature->is_selected,
            'message' => 'Feature selection updated.'
        ]);
    }

    public function feedback(Request $request, ProjectFeature $projectFeature)
    {
        if (!auth()->user()->hasPermissionTo('update features') && !auth()->user()->hasPermissionTo('edit feature gap')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'description' => 'nullable|string'
        ]);

        $projectFeature->update([
            'is_gap' => true,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback saved and marked as gap.'
        ]);
    }
}
