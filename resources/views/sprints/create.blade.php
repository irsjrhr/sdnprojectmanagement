@extends('layouts.app')
@section('title', 'Create Sprint')
@section('page_title', 'Create Sprint')

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
    <a href="{{ route('sprints.index') }}">Sprint List</a> <span>/</span> <span>Create</span>
</div>

<div class="card">
    <form action="{{ route('sprints.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Name / Title</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter Sprint name...">
        </div>
        
        <div class="form-group">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-control" required>
                <option value="">-- Select Project --</option>
                @foreach(\App\Models\Project::all() as $proj)
                    <option value="{{ $proj->id }}">{{ $proj->name }}</option>
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

        <button type="submit" class="btn-submit">Save Sprint</button>
    </form>
</div>
@endsection