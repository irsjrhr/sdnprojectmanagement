<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Epic;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoadmapController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua project dengan relasi epic dan task yang memiliki tanggal
        $projects = Project::with([
            'sprints' => function($q) {
                $q->whereNotNull('start_date')
                  ->whereNotNull('end_date')
                  ->orderBy('name', 'asc');
            },
            'epics' => function($q) {
                $q->orderBy('id', 'asc');
            },
            'tasks' => function($q) {
                $q->whereNotNull('start_date')
                  ->whereNotNull('due_date')
                  ->orderBy('title', 'asc');
            }
        ])->orderBy('name', 'asc')->get();

        $ganttTasks = [];

        foreach ($projects as $project) {
            // Project Bar
            if ($project->start_date && $project->end_date) {
                $ganttTasks[] = [
                    'id'           => 'Project_' . $project->id,
                    'name'         => '📁 ' . $project->name,
                    'start'        => Carbon::parse($project->start_date)->format('Y-m-d'),
                    'end'          => Carbon::parse($project->end_date)->format('Y-m-d'),
                    'progress'     => $project->status === 'Completed' ? 100 : 0,
                    'dependencies' => '',
                    'custom_class' => 'bar-project'
                ];
            }

            // 2. Sprint Bars
            foreach ($project->sprints as $sprint) {
                $ganttTasks[] = [
                    'id'           => 'Sprint_' . $sprint->id,
                    'name'         => '🏃 ' . $sprint->name,
                    'start'        => Carbon::parse($sprint->start_date)->format('Y-m-d'),
                    'end'          => Carbon::parse($sprint->end_date)->format('Y-m-d'),
                    'progress'     => $sprint->status === 'Completed' ? 100 : 0,
                    'dependencies' => '',
                    'custom_class' => 'bar-sprint'
                ];
            }

            // 3. Epic Bars
            foreach ($project->epics as $epic) {
                if ($epic->start_date && $epic->end_date) {
                    $ganttTasks[] = [
                        'id'           => 'Epic_' . $epic->id,
                        'name'         => '🎯 ' . $epic->name,
                        'start'        => Carbon::parse($epic->start_date)->format('Y-m-d'),
                        'end'          => Carbon::parse($epic->end_date)->format('Y-m-d'),
                        'progress'     => $epic->status === 'Completed' ? 100 : 0,
                        'dependencies' => '',
                        'custom_class' => 'bar-epic'
                    ];
                }
            }

            // 4. Task Bars
            foreach ($project->tasks as $task) {
                $ganttTasks[] = [
                    'id'           => 'Task_' . $task->id,
                    'name'         => '✅ ' . $task->title,
                    'start'        => Carbon::parse($task->start_date)->format('Y-m-d'),
                    'end'          => Carbon::parse($task->due_date)->format('Y-m-d'),
                    'progress'     => $task->status === 'Done' ? 100 : ($task->status === 'In Progress' ? 50 : 0),
                    'dependencies' => '',
                    'custom_class' => 'bar-task'
                ];
            }
        }

        // Jika array kosong, kita buat 1 dummy agar library tidak error
        if (empty($ganttTasks)) {
            $ganttTasks[] = [
                'id' => 'Dummy_1',
                'name' => 'Data tidak ditemukan (Isi tanggal di Project/Epic/Task)',
                'start' => now()->format('Y-m-d'),
                'end' => now()->addDays(7)->format('Y-m-d'),
                'progress' => 0,
                'dependencies' => '',
                'custom_class' => 'bar-dummy'
            ];
        }

        return view('roadmap.index', [
            'ganttTasksJson' => json_encode($ganttTasks)
        ]);
    }

    public function updateDate(Request $request)
    {
        $idParts = explode('_', $request->id);
        if (count($idParts) !== 2) {
            return response()->json(['success' => false, 'message' => 'Invalid ID format']);
        }

        $type = $idParts[0];
        $id = $idParts[1];
        
        // Parse dates safely to handle formatting issues
        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end   = Carbon::parse($request->end)->format('Y-m-d');

        if ($type === 'Project') {
            $model = \App\Models\Project::find($id);
            if ($model) {
                $model->update(['start_date' => $start, 'end_date' => $end]);
            }
        } elseif ($type === 'Sprint') {
            $model = \App\Models\Sprint::find($id);
            if ($model) {
                $model->update(['start_date' => $start, 'end_date' => $end]);
            }
        } elseif ($type === 'Epic') {
            $model = \App\Models\Epic::find($id);
            if ($model) {
                $model->update(['start_date' => $start, 'end_date' => $end]);
            }
        } elseif ($type === 'Task') {
            $model = \App\Models\Task::find($id);
            if ($model) {
                $model->update(['start_date' => $start, 'due_date' => $end]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Unknown entity type']);
        }

        return response()->json(['success' => true, 'message' => 'Timeline updated successfully']);
    }
}
