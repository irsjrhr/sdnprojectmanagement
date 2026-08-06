@extends('layouts.app')
@section('title','New Project')
@section('page_title','New Project')

@section('content')
@include('_partials.flash')
<style>
    .form-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:32px;max-width:700px;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    .form-group{margin-bottom:20px}
    label{display:block;font-size:.85rem;font-weight:600;color:#374151;margin-bottom:6px}
    .form-control{width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;color:#1e293b;outline:none;transition:border .2s;font-family:inherit}
    .form-control:focus{border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.08)}
    textarea.form-control{resize:vertical;min-height:100px}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
    .btn-primary{display:inline-flex;align-items:center;gap:8px;padding:11px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-size:.9rem;font-weight:600;cursor:pointer;transition:all .2s}
    .btn-primary:hover{opacity:.9;box-shadow:0 4px 12px rgba(8,145,178,.3)}
    .btn-back{display:inline-flex;align-items:center;gap:6px;padding:10px 18px;background:#f1f5f9;color:#64748b;border:none;border-radius:10px;font-size:.9rem;font-weight:600;cursor:pointer;text-decoration:none;transition:all .2s;margin-right:8px}
    .btn-back:hover{background:#e2e8f0;color:#374151}
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
</style>

<div class="breadcrumb">
    <a href="{{ route('projects.index') }}">Projects</a> <span>/</span> <span>New Project</span>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label>Project Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g. ERP Implementation">
            </div>
            <div class="form-group">
                <label>Project Key *</label>
                <input type="text" name="key" class="form-control" value="{{ old('key') }}" required placeholder="e.g. ERP" style="text-transform:uppercase" oninput="this.value=this.value.toUpperCase()">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Brief description of the project">{{ old('description') }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Owner *</label>
                <select name="owner_id" class="form-control" required>
                    <option value="">— Select Owner —</option>
                    @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ old('owner_id')==$u->id?'selected':'' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    @foreach(['Active','Inactive','Archived'] as $s)
                    <option value="{{ $s }}" {{ old('status')==$s?'selected':'' }}>{{ $s }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div style="display:flex;gap:8px;margin-top:8px">
            <a href="{{ route('projects.index') }}" class="btn-back">← Back</a>
            <button type="submit" class="btn-primary">💾 Save Project</button>
        </div>
    </form>
</div>
@endsection
