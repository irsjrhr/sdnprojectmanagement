@extends('layouts.app')
@section('title', $project->name)
@section('page_title', 'Project Details')

@section('content')
@include('_partials.flash')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .toolbar{display:flex;align-items:center;justify-content:flex-end;margin-bottom:24px;gap:10px;}
    
    .btn-edit{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s}
    .btn-edit:hover{background:#f1f5f9;color:#0f172a;}
    
    .grid-container {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 24px;
        align-items: start;
    }
    
    .card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,.04);
        margin-bottom: 24px;
    }
    
    .card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .info-group { margin-bottom: 16px; }
    .info-label { font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #94a3b8; margin-bottom: 4px; letter-spacing: 0.5px; }
    .info-value { font-size: 0.95rem; color: #334155; font-weight: 500; }
    .badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:.75rem;font-weight:700}
    .badge-active{background:#dcfce7;color:#166534}
    .badge-inactive{background:#f1f5f9;color:#64748b}
    .badge-archived{background:#fef3c7;color:#92400e}

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    .stat-box {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
    }
    .stat-val { font-size: 1.5rem; font-weight: 800; color: #0891b2; margin-bottom: 4px; }
    .stat-lbl { font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; }
</style>

<div class="breadcrumb">
    <a href="{{ route('projects.index') }}">Projects</a> <span>/</span> <span>{{ $project->name }}</span>
</div>

<div class="toolbar">
    <a href="{{ route('projects.edit', $project) }}" class="btn-edit">✏️ Edit Project</a>
</div>

<div class="grid-container">
    {{-- Main Content --}}
    <div>
        <div class="card">
            <div class="card-title">📝 Description</div>
            <div style="font-size: 0.95rem; color: #475569; line-height: 1.6; white-space: pre-wrap;">{{ $project->description ?: 'No description provided.' }}</div>
        </div>

        <div class="card">
            <div class="card-title">📊 Related Modules Overview</div>
            <div class="stats-grid" style="grid-template-columns: repeat(4, 1fr);">
                <div class="stat-box">
                    <div class="stat-val">{{ $project->epics->count() }}</div>
                    <div class="stat-lbl">Epics</div>
                </div>
                <div class="stat-box">
                    <div class="stat-val">{{ $project->sprints->count() }}</div>
                    <div class="stat-lbl">Sprints</div>
                </div>
                <div class="stat-box">
                    <div class="stat-val">{{ $project->tasks->count() }}</div>
                    <div class="stat-lbl">Tasks</div>
                </div>
                <div class="stat-box">
                    <div class="stat-val">{{ $project->features->count() }}</div>
                    <div class="stat-lbl">Features</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar Details --}}
    <div>
        <div class="card">
            <div class="card-title">ℹ️ Project Info</div>
            
            <div class="info-group">
                <div class="info-label">Key</div>
                <div class="info-value"><code style="background:#f1f5f9;padding:4px 8px;border-radius:6px;font-size:.85rem;color:#0f172a">{{ $project->key }}</code></div>
            </div>

            <div class="info-group">
                <div class="info-label">Status</div>
                <div class="info-value">
                    <span class="badge badge-{{ strtolower($project->status) }}">{{ $project->status }}</span>
                </div>
            </div>

            <div class="info-group">
                <div class="info-label">Project Owner</div>
                <div class="info-value" style="display:flex;align-items:center;gap:8px;">
                    <div style="width:24px;height:24px;border-radius:50%;background:#0891b2;color:#fff;display:flex;align-items:center;justify-content:center;font-size:.7rem;font-weight:700">
                        {{ strtoupper(substr($project->owner?->name ?? 'U', 0, 1)) }}
                    </div>
                    {{ $project->owner?->name ?? 'Unassigned' }}
                </div>
            </div>

            <div class="info-group">
                <div class="info-label">Created At</div>
                <div class="info-value">{{ $project->created_at->format('d M Y, H:i') }}</div>
            </div>

            @if($project->start_date)
            <div class="info-group">
                <div class="info-label">Timeline</div>
                <div class="info-value">
                    {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }} - 
                    {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d M Y') : 'Ongoing' }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
