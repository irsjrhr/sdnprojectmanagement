@extends('layouts.app')
@section('title', 'Edit FSD')
@section('page_title', 'Edit FSD')

@section('content')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,.04);max-width:100%}
    .form-group{margin-bottom:20px}
    .form-label{display:block;font-size:.85rem;font-weight:700;color:#334155;margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px}
    .form-control{width:100%;padding:12px 16px;border:1px solid #cbd5e1;border-radius:10px;font-size:.95rem;color:#1e293b;transition:all .2s;font-family:inherit}
    .form-control:focus{outline:none;border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.15)}
    .btn-submit{padding:12px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-weight:600;font-size:1rem;cursor:pointer;transition:all .2s}
    .btn-submit:hover{opacity:.9;transform:translateY(-1px)}
</style>

@php
    $record = $task ?? $epic ?? $sprint ?? $feature ?? $blueprint ?? $brd ?? $erd ?? $fsd ?? ${str_replace('-','_','fsds')} ?? null;
    if(!$record) {
        // fallback heuristic for controller vars
        $varname = \Illuminate\Support\Str::camel(\Illuminate\Support\Str::singular('fsds'));
        $record = $$varname ?? null;
    }
@endphp

<div class="breadcrumb" style="justify-content: space-between;">
    <div>
        <a href="{{ route('fsds.index') }}">FSD List</a> <span>/</span> 
        @if($record)
        <a href="{{ route('fsds.show', $record) }}">{{ $record->name ?? $record->title ?? 'Details' }}</a> <span>/</span> 
        @endif
        <span>Edit</span>
    </div>
    @if($record)
    <a href="{{ route('fsds.show', $record) }}" class="btn-submit" style="background: #fff; color: #475569; border: 1px solid #e2e8f0; font-size: 0.85rem; padding: 6px 12px; text-decoration: none;">⬅️ Back</a>
    @else
    <a href="{{ route('fsds.index') }}" class="btn-submit" style="background: #fff; color: #475569; border: 1px solid #e2e8f0; font-size: 0.85rem; padding: 6px 12px; text-decoration: none;">⬅️ Back</a>
    @endif
</div>

<div class="card">
    @if($record)
    <form action="{{ route('fsds.update', $record) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label class="form-label">Code</label>
            <input type="text" name="code" class="form-control" value="{{ $record->code ?? '' }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $record->title ?? '' }}" required>
        </div>
        

        
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft" {{ ($record->status ?? '') == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Under Review" {{ ($record->status ?? '') == 'Under Review' ? 'selected' : '' }}>Under Review</option>
                <option value="Approved" {{ ($record->status ?? '') == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Archived" {{ ($record->status ?? '') == 'Archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Description / Summary</label>
            <textarea name="description" class="form-control" rows="3">{{ $record->description ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Content (FSD Specifics)</label>
            <textarea name="content" id="content_hidden" style="display:none;">{!! $record->content ?? '' !!}</textarea>
            <div id="editor"></div>
        </div>

        <button type="submit" class="btn-submit">Update FSD</button>
    </form>
    @else
        <div class="alert alert-danger">Record variable not found. Check your controller passing arguments.</div>
    @endif
</div>

<!-- Toast UI Editor CDN -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editor = new toastui.Editor({
            el: document.querySelector('#editor'),
            height: '500px',
            initialEditType: 'wysiwyg',
            previewStyle: 'vertical',
            initialValue: document.querySelector('#content_hidden').value
        });

        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#content_hidden').value = editor.getMarkdown();
        });
    });
</script>
@endsection