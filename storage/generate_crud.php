<?php

$modules = [
    'epics' => 'Epic',
    'sprints' => 'Sprint',
    'tasks' => 'Task',
    'project-features' => 'Feature',
    'blueprints' => 'Blueprint',
    'brd-documents' => 'BRD Document',
    'erds' => 'ERD',
    'fsds' => 'FSD',
];

$basePath = __DIR__ . '/../resources/views/';

foreach ($modules as $folder => $singularName) {
    $dir = $basePath . $folder;
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    
    // CREATE BLADE
    $createContent = <<<BLADE
@extends('layouts.app')
@section('title', 'Create $singularName')
@section('page_title', 'Create $singularName')

@section('content')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,.04);max-width:800px}
    .form-group{margin-bottom:20px}
    .form-label{display:block;font-size:.85rem;font-weight:700;color:#334155;margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px}
    .form-control{width:100%;padding:12px 16px;border:1px solid #cbd5e1;border-radius:10px;font-size:.95rem;color:#1e293b;transition:all .2s;font-family:inherit}
    .form-control:focus{outline:none;border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.15)}
    .btn-submit{padding:12px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-weight:600;font-size:1rem;cursor:pointer;transition:all .2s}
    .btn-submit:hover{opacity:.9;transform:translateY(-1px)}
</style>

<div class="breadcrumb">
    <a href="{{ route('{$folder}.index') }}">$singularName List</a> <span>/</span> <span>Create</span>
</div>

<div class="card">
    <form action="{{ route('{$folder}.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Name / Title</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter $singularName name...">
        </div>
        
        <div class="form-group">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-control" required>
                <option value="">-- Select Project --</option>
                @foreach(\\App\Models\Project::all() as \$proj)
                    <option value="{{ \$proj->id }}">{{ \$proj->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft">Draft</option>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter description..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Save $singularName</button>
    </form>
</div>
@endsection
BLADE;
    
    // EDIT BLADE
    $editContent = <<<BLADE
@extends('layouts.app')
@section('title', 'Edit $singularName')
@section('page_title', 'Edit $singularName')

@section('content')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,.04);max-width:800px}
    .form-group{margin-bottom:20px}
    .form-label{display:block;font-size:.85rem;font-weight:700;color:#334155;margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px}
    .form-control{width:100%;padding:12px 16px;border:1px solid #cbd5e1;border-radius:10px;font-size:.95rem;color:#1e293b;transition:all .2s;font-family:inherit}
    .form-control:focus{outline:none;border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.15)}
    .btn-submit{padding:12px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-weight:600;font-size:1rem;cursor:pointer;transition:all .2s}
    .btn-submit:hover{opacity:.9;transform:translateY(-1px)}
</style>

@php
    \$record = \$task ?? \$epic ?? \$sprint ?? \$feature ?? \$blueprint ?? \$brd ?? \$erd ?? \$fsd ?? \${str_replace('-','_','{$folder}')} ?? null;
    if(!\$record) {
        // fallback heuristic for controller vars
        \$varname = \Illuminate\Support\Str::camel(\Illuminate\Support\Str::singular('{$folder}'));
        \$record = \$\$varname ?? null;
    }
@endphp

<div class="breadcrumb">
    <a href="{{ route('{$folder}.index') }}">$singularName List</a> <span>/</span> 
    @if(\$record)
    <a href="{{ route('{$folder}.show', \$record) }}">{{ \$record->name ?? \$record->title ?? 'Details' }}</a> <span>/</span> 
    @endif
    <span>Edit</span>
</div>

<div class="card">
    @if(\$record)
    <form action="{{ route('{$folder}.update', \$record) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label class="form-label">Name / Title</label>
            <input type="text" name="name" class="form-control" value="{{ \$record->name ?? \$record->title ?? '' }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-control" required>
                @foreach(\\App\Models\Project::all() as \$proj)
                    <option value="{{ \$proj->id }}" {{ \$record->project_id == \$proj->id ? 'selected' : '' }}>{{ \$proj->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft" {{ (\$record->status ?? '') == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Active" {{ (\$record->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Completed" {{ (\$record->status ?? '') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ \$record->description ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn-submit">Update $singularName</button>
    </form>
    @else
        <div class="alert alert-danger">Record variable not found. Check your controller passing arguments.</div>
    @endif
</div>
@endsection
BLADE;

    // SHOW BLADE
    $showContent = <<<BLADE
@extends('layouts.app')
@section('title', '$singularName Details')
@section('page_title', '$singularName Details')

@section('content')
@include('_partials.flash')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .toolbar{display:flex;align-items:center;justify-content:flex-end;margin-bottom:24px;gap:10px;}
    .btn-edit{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s}
    .btn-edit:hover{background:#f1f5f9;color:#0f172a;}
    
    .grid-container { display: grid; grid-template-columns: 1fr 300px; gap: 24px; align-items: start; }
    .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); margin-bottom: 24px; }
    .card-title { font-size: 1.1rem; font-weight: 700; color: #1e293b; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; }
    .info-group { margin-bottom: 16px; }
    .info-label { font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #94a3b8; margin-bottom: 4px; letter-spacing: 0.5px; }
    .info-value { font-size: 0.95rem; color: #334155; font-weight: 500; }
    .badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:.75rem;font-weight:700;background:#f1f5f9;color:#64748b}
</style>

@php
    \$record = \$task ?? \$epic ?? \$sprint ?? \$feature ?? \$blueprint ?? \$brd ?? \$erd ?? \$fsd ?? \${str_replace('-','_','{$folder}')} ?? null;
    if(!\$record) {
        \$varname = \Illuminate\Support\Str::camel(\Illuminate\Support\Str::singular('{$folder}'));
        \$record = \$\$varname ?? null;
    }
@endphp

<div class="breadcrumb">
    <a href="{{ route('{$folder}.index') }}">$singularName List</a> <span>/</span> <span>{{ \$record->name ?? \$record->title ?? 'Details' }}</span>
</div>

@if(\$record)
<div class="toolbar">
    <a href="{{ route('{$folder}.edit', \$record) }}" class="btn-edit">✏️ Edit $singularName</a>
</div>

<div class="grid-container">
    <div>
        <div class="card">
            <div class="card-title">📝 Description / Content</div>
            <div style="font-size: 0.95rem; color: #475569; line-height: 1.6; white-space: pre-wrap;">{{ \$record->description ?? \$record->content ?? 'No content provided.' }}</div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-title">ℹ️ Meta Info</div>
            
            <div class="info-group">
                <div class="info-label">Title/Name</div>
                <div class="info-value">{{ \$record->name ?? \$record->title ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Project</div>
                <div class="info-value">{{ \$record->project?->name ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Status</div>
                <div class="info-value"><span class="badge">{{ \$record->status ?? '-' }}</span></div>
            </div>

            <div class="info-group">
                <div class="info-label">Created At</div>
                <div class="info-value">{{ \$record->created_at ? \$record->created_at->format('d M Y, H:i') : '-' }}</div>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-danger">Record not passed to view correctly.</div>
@endif
@endsection
BLADE;

    file_put_contents($dir . '/create.blade.php', $createContent);
    file_put_contents($dir . '/edit.blade.php', $editContent);
    file_put_contents($dir . '/show.blade.php', $showContent);
    
    echo "Generated views for $folder\n";
}

echo "All views generated successfully.\n";
