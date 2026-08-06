@extends('layouts.app')
@section('title', 'Edit Role')
@section('page_title', 'Edit Role')

@section('content')
@include('_partials.flash')
<style>
    .form-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:32px;max-width:600px;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    .form-group{margin-bottom:20px}
    label{display:block;font-size:.85rem;font-weight:600;color:#374151;margin-bottom:6px}
    .form-control{width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;color:#1e293b;outline:none;transition:border .2s;font-family:inherit}
    .form-control:focus{border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.08)}
    .btn-primary{display:inline-flex;align-items:center;gap:8px;padding:11px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-size:.9rem;font-weight:600;cursor:pointer;transition:all .2s}
    .btn-primary:hover{opacity:.9;box-shadow:0 4px 12px rgba(8,145,178,.3)}
    .btn-back{display:inline-flex;align-items:center;gap:6px;padding:10px 18px;background:#f1f5f9;color:#64748b;border:none;border-radius:10px;font-size:.9rem;font-weight:600;cursor:pointer;text-decoration:none;transition:all .2s;margin-right:8px}
    .btn-back:hover{background:#e2e8f0;color:#374151}
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}
</style>

<div class="breadcrumb">
    <a href="{{ route('roles.index') }}">Master Roles</a> <span>/</span> 
    <span>Edit</span>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('roles.update', $role) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Role Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" required {{ $role->name === 'Super Admin' ? 'readonly' : '' }}>
            @if($role->name === 'Super Admin')
            <small style="color:#ef4444; margin-top: 6px; display:block;">Super Admin role name cannot be changed.</small>
            @endif
        </div>
        
        <div style="display:flex;gap:8px;margin-top:8px">
            <a href="{{ route('roles.index') }}" class="btn-back">← Back</a>
            <button type="submit" class="btn-primary" {{ $role->name === 'Super Admin' ? 'disabled' : '' }}>💾 Update Role</button>
        </div>
    </form>
</div>
@endsection
