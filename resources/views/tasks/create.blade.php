@extends('layouts.app')
@section('title', 'Create Task')
@section('page_title', 'Create Task')

@section('content')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    
    .grid-container { display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start; }
    .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); margin-bottom: 24px; }
    .card-title { font-size: 1.1rem; font-weight: 700; color: #1e293b; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; }
    
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 8px; letter-spacing: 0.3px; }
    .form-control { width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; color: #1e293b; transition: all 0.2s; font-family: inherit; background: #fff; }
    .form-control:focus { outline: none; border-color: #0891b2; box-shadow: 0 0 0 3px rgba(8,145,178,.15); }
    
    .btn-submit { width: 100%; padding: 14px 24px; background: linear-gradient(135deg, #0891b2, #2563eb); color: #fff; border: none; border-radius: 10px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 12px rgba(37,99,235,0.2); }
    .btn-submit:hover { opacity: 0.95; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(37,99,235,0.3); }
    
    .text-danger { color: #ef4444; font-size: 0.85rem; margin-top: 6px; display: block; font-weight: 500; }
    
    .row { display: flex; gap: 20px; flex-wrap: wrap; }
    .col { flex: 1; min-width: 200px; }
</style>

<div class="breadcrumb">
    <a href="{{ route('tasks.index') }}">Task List</a> <span>/</span> 
    <span>Create</span>
</div>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    
    <div class="grid-container">
        <!-- Main Form (Left) -->
        <div>
            <div class="card">
                <div class="card-title">📝 Core Information</div>
                
                <div class="form-group">
                    <label class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Enter Task title...">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="8" placeholder="Enter detailed description...">{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label class="form-label">Project</label>
                        <select name="project_id" class="form-control" required>
                            <option value="">-- Select Project --</option>
                            @foreach($projects as $proj)
                                <option value="{{ $proj->id }}" {{ old('project_id') == $proj->id ? 'selected' : '' }}>{{ $proj->name }}</option>
                            @endforeach
                        </select>
                        @error('project_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col form-group">
                        <label class="form-label">BRD Document</label>
                        <select name="brd_document_id" class="form-control">
                            <option value="">-- None --</option>
                            @foreach($brdDocuments as $brd)
                                <option value="{{ $brd->id }}" {{ old('brd_document_id') == $brd->id ? 'selected' : '' }}>{{ $brd->brd_code }} - {{ $brd->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label class="form-label">Epic</label>
                        <select name="epic_id" class="form-control">
                            <option value="">-- No Epic --</option>
                            @foreach($epics as $epic)
                                <option value="{{ $epic->id }}" {{ old('epic_id') == $epic->id ? 'selected' : '' }}>{{ $epic->name }} ({{ $epic->project->name ?? '-' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col form-group">
                        <label class="form-label">Sprint</label>
                        <select name="sprint_id" class="form-control">
                            <option value="">-- No Sprint --</option>
                            @foreach($sprints as $sprint)
                                <option value="{{ $sprint->id }}" {{ old('sprint_id') == $sprint->id ? 'selected' : '' }}>{{ $sprint->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Options (Right) -->
        <div>
            <div class="card">
                <div class="card-title">⚙️ Properties</div>
                
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required style="font-weight:600; color:#0f172a; background:#f8fafc;">
                        @foreach(['To Do', 'In Progress', 'Review', 'Done'] as $status)
                            <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Assignee</label>
                    <select name="assignee_id" class="form-control">
                        <option value="">-- Unassigned --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('assignee_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Priority</label>
                    <select name="priority" class="form-control" required>
                        @foreach(['Medium', 'Highest', 'High', 'Low', 'Lowest'] as $priority)
                            <option value="{{ $priority }}" {{ old('priority') == $priority ? 'selected' : '' }}>{{ $priority }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control" required>
                        @foreach(['Task', 'Story', 'Bug', 'Subtask'] as $type)
                            <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="row">
                    <div class="col form-group">
                        <label class="form-label">Story Points</label>
                        <input type="number" name="story_points" class="form-control" value="{{ old('story_points') }}" placeholder="e.g. 3">
                    </div>
                    <div class="col form-group">
                        <label class="form-label">Est. Hours</label>
                        <input type="number" step="0.1" name="estimated_hours" class="form-control" value="{{ old('estimated_hours') }}" placeholder="e.g. 4.5">
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                    <div class="col form-group">
                        <label class="form-label">Due Date</label>
                        <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <button type="submit" class="btn-submit">Save Task</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection