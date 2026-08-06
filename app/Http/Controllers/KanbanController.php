<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\Task;

class KanbanController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::orderBy('name')->get();
        $projectId = $request->query('project_id');
        $sprintId = $request->query('sprint_id');

        $sprints = collect();
        if ($projectId) {
            $sprints = Sprint::where('project_id', $projectId)->orderBy('name')->get();
        }

        $query = Task::with(['assignee', 'project', 'sprint'])
            ->leftJoin('sprints', 'tasks.sprint_id', '=', 'sprints.id')
            ->select('tasks.*')
            ->orderBy('sprints.name', 'asc')
            ->orderBy('tasks.epic_id', 'asc')
            ->orderBy('tasks.story_points', 'asc');

        if ($projectId) {
            $query->where('tasks.project_id', $projectId);
        }
        if ($sprintId) {
            $query->where('tasks.sprint_id', $sprintId);
        }

        $tasks = $query->get();

        // Default statuses for columns
        $statuses = ['To Do', 'In Progress', 'Review', 'Done'];
        $groupedTasks = [];

        foreach ($statuses as $status) {
            $groupedTasks[$status] = [];
        }

        foreach ($tasks as $task) {
            $status = $task->status ?: 'To Do';
            if (!in_array($status, $statuses)) {
                $statuses[] = $status;
                $groupedTasks[$status] = [];
            }
            $groupedTasks[$status][] = $task;
        }

        return view('kanban.index', compact('projects', 'sprints', 'projectId', 'sprintId', 'groupedTasks', 'statuses'));
    }

    public function updateTaskStatus(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|string',
        ]);

        $task = Task::findOrFail($request->task_id);
        $task->status = $request->status;
        
        if ($request->status === 'To Do') {
            $task->assignee_id = null; // Unassign PIC
        } else {
            $task->assignee_id = auth()->id(); // Auto assign PIC
        }
        
        $task->save();

        $user = auth()->user();

        return response()->json([
            'success' => true, 
            'message' => 'Task status and PIC updated',
            'assignee_name' => $user->name,
            'assignee_initial' => strtoupper(substr($user->name, 0, 1))
        ]);
    }
}
