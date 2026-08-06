@extends('layouts.app')
@section('title', 'FSD Details')
@section('page_title', 'FSD Details')

@section('content')
@include('_partials.flash')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .toolbar{display:flex;align-items:center;justify-content:flex-end;margin-bottom:24px;gap:10px;}
    .btn-edit{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s}
    .btn-edit:hover{background:#f1f5f9;color:#0f172a;}
    
    .brd-page {
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='1122'%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' transform='rotate(-45, 400, 561)' font-family='Arial, sans-serif' font-size='110px' font-weight='900' fill='rgba(220, 38, 38, 0.07)'%3ECONFIDENTIAL%3C/text%3E%3C/svg%3E");
        background-repeat: repeat-y;
        background-position: center top;
        background-size: 100% 297mm;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        max-width: 1000px;
        min-height: 297mm;
        margin: 0 auto 40px auto;
        color: #334155;
        position: relative;
    }
    
    .cover-page {
        min-height: 850px;
        background-image: none; /* No watermark on cover */
    }

    
    .doc-body { padding: 60px; }

    .doc-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .doc-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }
    .doc-meta {
        font-size: 0.95rem;
        color: #64748b;
        margin-bottom: 24px;
    }
    .doc-divider {
        height: 2px;
        background: #1e293b;
        margin-bottom: 40px;
    }
    .doc-content {
        line-height: 1.7;
        font-size: 0.95rem;
        color: #475569;
    }
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

    /* Prevent Printing */
    @media print {
        .brd-page,
        .toolbar,
        .breadcrumb,
        header,
        footer,
        nav,
        aside {
            display: none !important;
        }

        body {
            background-color: white !important;
        }

        body::before {
            content: "Pencetakan dokumen ini dilarang keras demi alasan kerahasiaan dan keamanan (CONFIDENTIAL).";
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-height: 100vh !important;
            width: 100% !important;
            font-family: Arial, sans-serif !important;
            font-size: 20pt !important;
            font-weight: bold !important;
            text-align: center !important;
            color: #b91c1c !important;
            padding: 40px !important;
            box-sizing: border-box !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            z-index: 999999 !important;
            background: white !important;
        }
    }
</style>

@php
    $record = $fsd ?? null;
@endphp

<div class="breadcrumb">
    <a href="{{ route('fsds.index') }}">FSD List</a> <span>/</span> <span>{{ $record->code ?? '' }} - {{ $record->title ?? 'Details' }}</span>
</div>

@if($record)
<div class="toolbar" style="display: flex; justify-content: space-between;">
    <a href="{{ route('fsds.index') }}" class="btn-edit" style="background: #fff; color: #475569;">⬅️ Back to List</a>
    <a href="{{ route('fsds.edit', $record) }}" class="btn-edit">✏️ Edit FSD</a>
</div>

<div class="brd-page cover-page">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); color: white; text-align: center; position: relative; overflow: hidden; box-shadow: inset 0 0 100px rgba(0,0,0,0.5); min-height: 850px;">
        <!-- SAP-style Swoosh Graphics (using circles) -->
        <div style="position: absolute; bottom: -20%; right: -10%; width: 600px; height: 600px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.05); z-index: 1;"></div>
        <div style="position: absolute; bottom: -15%; right: -5%; width: 450px; height: 450px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.08); z-index: 1;"></div>
        <div style="position: absolute; bottom: -10%; right: 0%; width: 300px; height: 300px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.1); z-index: 1;"></div>
        
        <div style="z-index: 10; width: 100%; max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; align-items: center;">
            <h1 style="font-size: 3.5rem; font-weight: 800; line-height: 1.2; margin-bottom: 2rem; text-shadow: 2px 4px 10px rgba(0,0,0,0.3);">
                {{ $record->title ?? 'Untitled Document' }}<br>
                Functional Specification
            </h1>
            
            <h2 style="font-size: 2.2rem; font-weight: bold; margin-bottom: 4rem; text-transform: uppercase; letter-spacing: 2px; text-shadow: 1px 2px 5px rgba(0,0,0,0.3);">
                {{ $record->project->name ?? 'DMS DISTRIBUTOR MANAGEMENT SYSTEM' }}
            </h2>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid rgba(255,255,255,0.3); width: 70%;">
                <p style="font-size: 1.2rem; margin-bottom: 0.5rem; opacity: 0.9; font-weight: 300;">Disusun oleh:</p>
                <h3 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; letter-spacing: 1px;">{{ $record->pic?->name ?? 'Teguh Priyadi' }}</h3>
                <p style="font-size: 1.2rem; font-weight: 600; opacity: 0.9;">{{ $record->created_at ? $record->created_at->format('d M Y') : date('d M Y') }}</p>
                <p style="font-size: 1.2rem; font-weight: 600; opacity: 0.9; margin-top: 1rem;">FSD Code: {{ $record->code ?? '' }}</p>
            </div>
        </div>
        
        <div style="position: absolute; bottom: 30px; left: 0; width: 100%; text-align: center; font-size: 1rem; font-weight: bold; z-index: 10; letter-spacing: 2px; word-spacing: 5px;">
            <span style="color: white;">Integrity &nbsp;|&nbsp; Reliability</span>
        </div>
    </div>
</div>

<div class="brd-page">
    <div class="doc-body">
        <div class="doc-header">
            <div class="doc-title">{{ $record->code ?? '' }} - {{ strtoupper($record->title ?? 'UNTITLED') }}</div>
            <div class="doc-meta">
                Project: {{ $record->project?->name ?? '-' }} &nbsp;|&nbsp; 
                Status: {{ $record->status ?? '-' }} &nbsp;|&nbsp; 
                PICs: {{ $record->pic?->name ?? 'Unassigned' }}
            </div>
            <div class="doc-divider"></div>
        </div>
        <div class="doc-content">
            @if(preg_match('/^#{1,6}\s|\*\*.+\*\*/m', $record->content ?? ''))
                {!! \Illuminate\Support\Str::markdown($record->content ?? '', ['html_input' => 'allow']) !!}
            @else
                {!! $record->content ?? '' !!}
            @endif
        </div>
    </div>
</div>
@else
<div class="alert alert-danger">Record not found.</div>
@endif

<script>
    // Prevent Ctrl+P or Cmd+P
    window.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
            e.preventDefault();
            e.stopPropagation();
            alert('Pencetakan (Print) dinonaktifkan untuk dokumen ini karena bersifat rahasia (Confidential).');
            return false;
        }
    }, true);

    // Additional defense: clear body content just before print dialog opens (if initiated from browser menu)
    window.addEventListener('beforeprint', function (e) {
        document.body.style.display = 'none';
    });
    window.addEventListener('afterprint', function (e) {
        document.body.style.display = '';
    });
</script>
@endsection