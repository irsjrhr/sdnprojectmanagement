@extends('layouts.app')
@section('title', 'Sprint Details')
@section('page_title', 'Sprint Details')

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
    $record = $task ?? $epic ?? $sprint ?? $feature ?? $blueprint ?? $brd ?? $erd ?? $fsd ?? ${str_replace('-','_','sprints')} ?? null;
    if(!$record) {
        $varname = \Illuminate\Support\Str::camel(\Illuminate\Support\Str::singular('sprints'));
        $record = $$varname ?? null;
    }
@endphp

<div class="breadcrumb">
    <a href="{{ route('sprints.index') }}">Sprint List</a> <span>/</span> <span>{{ $record->name ?? $record->title ?? 'Details' }}</span>
</div>

@if($record)
<div class="toolbar">
    <a href="{{ route('sprints.edit', $record) }}" class="btn-edit">✏️ Edit Sprint</a>
</div>

<div class="grid-container">
    <div>
        <div class="card">
            <div class="card-title">📝 Description / Content</div>
            <div style="font-size: 0.95rem; color: #475569; line-height: 1.6; white-space: pre-wrap;">{{ $record->description ?? $record->content ?? 'No content provided.' }}</div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-title">ℹ️ Meta Info</div>
            
            <div class="info-group">
                <div class="info-label">Title/Name</div>
                <div class="info-value">{{ $record->name ?? $record->title ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Project</div>
                <div class="info-value">{{ $record->project?->name ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Status</div>
                <div class="info-value"><span class="badge">{{ $record->status ?? '-' }}</span></div>
            </div>

            <div class="info-group">
                <div class="info-label">Created At</div>
                <div class="info-value">{{ $record->created_at ? $record->created_at->format('d M Y, H:i') : '-' }}</div>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-danger">Record not passed to view correctly.</div>
@endif
@endsection