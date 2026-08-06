@extends('layouts.app')

@section('title', 'Kanban Board')
@section('page_title', 'Agile Kanban Board')

@section('content')
<style>
    .kanban-board {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding-bottom: 1rem;
        height: calc(100vh - 220px);
    }

    .kanban-column {
        flex: 1;
        min-width: 240px;
        background: #f1f5f9;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        max-height: 100%;
    }

    .kanban-column-header {
        padding: 1rem;
        font-weight: 700;
        font-size: 1rem;
        color: #1e293b;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .kanban-column-count {
        background: #cbd5e1;
        color: #1e293b;
        font-size: 0.75rem;
        padding: 0.15rem 0.6rem;
        border-radius: 9999px;
    }

    .kanban-task-list {
        flex: 1;
        padding: 1rem;
        overflow-y: auto;
        min-height: 150px;
    }

    .kanban-task-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        cursor: grab;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .kanban-task-card:active {
        cursor: grabbing;
    }

    .kanban-task-card.sortable-ghost {
        opacity: 0.4;
        background: #f8fafc;
    }

    .task-title {
        font-weight: 600;
        font-size: 0.95rem;
        color: #0f172a;
        margin-bottom: 0.5rem;
        display: block;
        text-decoration: none;
    }
    .task-title:hover {
        color: var(--primary);
    }

    .task-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0.75rem;
        font-size: 0.75rem;
        color: #64748b;
    }

    .task-priority {
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.65rem;
    }
    .priority-low { background: #dcfce7; color: #166534; }
    .priority-medium { background: #fef08a; color: #854d0e; }
    .priority-high { background: #fee2e2; color: #991b1b; }

    .assignee-name {
        background: var(--primary);
        color: #fff;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.7rem;
        margin-left: auto;
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 120px;
    }

    /* Filters */
    .kanban-filters {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        background: #fff;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
    }

    .filter-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-group select {
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
        outline: none;
        font-size: 0.9rem;
    }

    .btn-filter {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.2s;
    }
    .btn-filter:hover {
        background: var(--primary-dark);
    }
</style>

{{-- Filters --}}
<div class="kanban-filters">
    <form method="GET" action="{{ route('kanban.index') }}" class="d-flex" style="gap: 1rem; width: 100%;">
        <div class="filter-group">
            <label for="project_id" style="font-weight: 600; font-size: 0.9rem;">Project:</label>
            <select name="project_id" id="project_id" onchange="this.form.submit()">
                <option value="">-- All Projects --</option>
                @foreach($projects as $proj)
                    <option value="{{ $proj->id }}" {{ $projectId == $proj->id ? 'selected' : '' }}>
                        {{ $proj->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @if($projectId && $sprints->count() > 0)
        <div class="filter-group">
            <label for="sprint_id" style="font-weight: 600; font-size: 0.9rem;">Sprint:</label>
            <select name="sprint_id" id="sprint_id" onchange="this.form.submit()">
                <option value="">-- All Sprints --</option>
                @foreach($sprints as $sp)
                    <option value="{{ $sp->id }}" {{ $sprintId == $sp->id ? 'selected' : '' }}>
                        {{ $sp->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        <div style="margin-left: auto;">
            <a href="{{ route('kanban.index') }}" class="btn-filter" style="background: #94a3b8; text-decoration: none;">Clear Filter</a>
        </div>
    </form>
</div>

{{-- Board --}}
<div class="kanban-board">
    @foreach($statuses as $status)
        <div class="kanban-column" data-status="{{ $status }}">
            <div class="kanban-column-header">
                {{ $status }}
                <span class="kanban-column-count" id="count-{{ Str::slug($status) }}">{{ count($groupedTasks[$status]) }}</span>
            </div>
            
            <div class="kanban-task-list" id="col-{{ Str::slug($status) }}">
                @foreach($groupedTasks[$status] as $task)
                    <div class="kanban-task-card" data-task-id="{{ $task->id }}">
                        <a href="{{ route('tasks.show', $task->id) }}" class="task-title">{{ $task->title }}</a>
                        
                        <div style="font-size: 0.75rem; color: #94a3b8; margin-bottom: 0.5rem;">
                            {{ $task->project ? $task->project->name : 'No Project' }}
                        </div>

                        <div class="task-meta">
                            <span class="task-priority priority-{{ strtolower($task->priority ?? 'medium') }}">
                                {{ $task->priority ?? 'Medium' }}
                            </span>

                            @if($task->story_points)
                                <span style="background: #f1f5f9; padding: 0.15rem 0.4rem; border-radius: 4px; font-weight: 600;">
                                    {{ $task->story_points }} SP
                                </span>
                            @endif

                            @if($task->assignee)
                                <div class="assignee-name" title="{{ $task->assignee->name }}">
                                    {{ $task->assignee->name }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

{{-- SortableJS --}}
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @can('update kanban')
        const columns = document.querySelectorAll('.kanban-task-list');
        
        columns.forEach(col => {
            new Sortable(col, {
                group: 'kanban', // set both lists to same group
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function (evt) {
                    const itemEl = evt.item;  // dragged HTMLElement
                    const toList = evt.to;    // target list
                    const fromList = evt.from;// previous list
                    
                    if (toList !== fromList) {
                        const taskId = itemEl.getAttribute('data-task-id');
                        const newStatus = toList.closest('.kanban-column').getAttribute('data-status');
                        
                        // Update counts
                        updateCounts();

                        // Call backend via Fetch
                        fetch('{{ route('kanban.updateTaskStatus') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                task_id: taskId,
                                status: newStatus
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(!data.success) {
                                alert('Failed to update task status');
                                location.reload();
                            } else {
                                // Reload to enforce strict server-side sorting and PIC UI update
                                location.reload();
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Network error updating task status');
                            location.reload();
                        });
                    }
                },
            });
        });

        function updateCounts() {
            document.querySelectorAll('.kanban-column').forEach(column => {
                const countSpan = column.querySelector('.kanban-column-count');
                const taskCount = column.querySelectorAll('.kanban-task-card').length;
                countSpan.textContent = taskCount;
            });
        }
        @endcan
    });
</script>
@endsection
