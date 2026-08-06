@extends('layouts.app')
@section('title', 'ERD Details')
@section('page_title', 'ERD Details')

@section('content')
@include('_partials.flash')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .toolbar{display:flex;align-items:center;justify-content:flex-end;margin-bottom:24px;gap:10px;}
    .btn-edit{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s}
    .btn-edit:hover{background:#f1f5f9;color:#0f172a;}
    .btn-copy{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:linear-gradient(135deg, #10b981, #059669);color:#fff;border:none;border-radius:10px;font-size:.9rem;font-weight:600;cursor:pointer;transition:all .2s}
    .btn-copy:hover{opacity:0.9;}
    
    .grid-container { display: grid; grid-template-columns: 1fr 300px; gap: 24px; align-items: start; }
    .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); margin-bottom: 24px; }
    .card-title { font-size: 1.1rem; font-weight: 700; color: #1e293b; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; }
    .info-group { margin-bottom: 16px; }
    .info-label { font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #94a3b8; margin-bottom: 4px; letter-spacing: 0.5px; }
    .info-value { font-size: 0.95rem; color: #334155; font-weight: 500; }
    .badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:.75rem;font-weight:700;background:#f1f5f9;color:#64748b}
    
    .dbml-code { font-family: 'Courier New', Courier, monospace; font-size: 0.85rem; background: #1e293b; color: #f8fafc; padding: 20px; border-radius: 10px; overflow-x: auto; white-space: pre-wrap; line-height: 1.5; }
    .prose h1, .prose h2, .prose h3 { font-weight: 700; color: #1e293b; margin-bottom: 10px; }
    .prose p { margin-bottom: 10px; color: #475569; }
    
    .doc-content { line-height: 1.7; font-size: 0.95rem; color: #475569; }
    .doc-content h1, .doc-content h2, .doc-content h3 { color: #1e293b; font-weight: 800; }
    .doc-content h1 { font-size: 1.8rem; margin: 30px 0 16px 0; }
    .doc-content h2 { font-size: 1.25rem; margin: 32px 0 16px 0; }
    .doc-content h3 { font-size: 1.1rem; margin: 24px 0 12px 0; }
    
    .doc-content table { width: 100%; border-collapse: collapse; margin-bottom: 24px; font-size: 0.85rem; }
    .doc-content th, .doc-content td { border: 1px solid #e2e8f0; padding: 8px 12px; text-align: left; vertical-align: middle; }
    .doc-content th { background: transparent; font-weight: 700; color: #334155; }
    .doc-content th:first-child { width: 20%; }
    
    /* Make the first table (Document Information) look like a vertical property table */
    .doc-content table:first-of-type thead { display: none; }
    .doc-content table:first-of-type td:first-child { background: #f9fafb; font-weight: 600; color: #334155; width: 25%; }
    
    .doc-content p { margin-bottom: 16px; }
    .doc-content ul { padding-left: 20px; margin-bottom: 16px; list-style-type: disc; }
    .doc-content li { margin-bottom: 8px; }
</style>

@php
    $record = $erd ?? null;
@endphp

<div class="breadcrumb">
    <a href="{{ route('erds.index') }}">ERD List</a> <span>/</span> <span>{{ $record->title ?? 'Details' }}</span>
</div>

@if($record)
<div class="toolbar" style="justify-content: space-between;">
    <a href="{{ route('erds.index') }}" style="display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#64748b;border:1px solid #cbd5e1;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s" onmouseover="this.style.background='#f1f5f9'; this.style.color='#334155'" onmouseout="this.style.background='#f8fafc'; this.style.color='#64748b'">⬅️ Back to List</a>
    <a href="{{ route('erds.edit', $record) }}" class="btn-edit">✏️ Edit ERD</a>
</div>

<div class="grid-container">
    <div>
        <!-- Description Card -->
        <div class="card">
            <div class="card-title">📝 ERD Description</div>
            <div class="prose max-w-none">
                {!! \Illuminate\Support\Str::markdown($record->description ?? '*No description provided.*') !!}
            </div>
        </div>

        <!-- Document Content Card -->
        <div class="card">
            <div class="card-title">📄 ERD Document</div>
            <div class="doc-content" style="font-size: 0.95rem; color: #334155; line-height: 1.6;">
                {!! $record->content ?? '<div style="color: #94a3b8; font-style: italic;">No document content available.</div>' !!}
            </div>
        </div>

        <!-- DBML Source Card -->
        <div class="card">
            <div class="card-title">
                <span>💻 DBML Source Code</span>
                <button type="button" class="btn-copy" id="copyDbmlBtn" onclick="copyDBML()">📋 Copy to DBML</button>
            </div>
            
            <textarea id="dbmlRaw" style="display:none;">{{ $record->dbml }}</textarea>
            
            @if($record->dbml)
                <div class="dbml-code">{{ $record->dbml }}</div>
            @else
                <div style="color: #94a3b8; font-style: italic;">No DBML source code available.</div>
            @endif
        </div>
    </div>
    
    <div>
        <div class="card">
            <div class="card-title">ℹ️ Meta Info</div>
            
            <div class="info-group">
                <div class="info-label">Code</div>
                <div class="info-value"><strong>{{ $record->code ?? '-' }}</strong></div>
            </div>

            <div class="info-group">
                <div class="info-label">Title/Name</div>
                <div class="info-value">{{ $record->title ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Status</div>
                <div class="info-value"><span class="badge">{{ $record->status ?? '-' }}</span></div>
            </div>

            <div class="info-group">
                <div class="info-label">Created At</div>
                <div class="info-value">{{ $record->created_at ? $record->created_at->format('d M Y, H:i') : '-' }}</div>
            </div>
            
            <div class="info-group">
                <div class="info-label">Last Updated</div>
                <div class="info-value">{{ $record->updated_at ? $record->updated_at->format('d M Y, H:i') : '-' }}</div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyDBML() {
        var copyText = document.getElementById("dbmlRaw").value;
        if (!copyText) {
            alert("DBML source is empty!");
            return;
        }
        
        navigator.clipboard.writeText(copyText).then(function() {
            var btn = document.getElementById("copyDbmlBtn");
            var originalText = btn.innerHTML;
            btn.innerHTML = "✅ Copied!";
            btn.style.background = "linear-gradient(135deg, #059669, #047857)";
            
            setTimeout(function() {
                btn.innerHTML = originalText;
                btn.style.background = "";
            }, 2000);
        }).catch(function(err) {
            console.error('Failed to copy text: ', err);
            alert("Failed to copy. Please try manually.");
        });
    }
</script>
@else
<div class="alert alert-danger">Record not found.</div>
@endif
@endsection