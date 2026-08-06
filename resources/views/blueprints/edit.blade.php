@extends('layouts.app')
@section('title', 'Edit Blueprint')
@section('page_title', 'Edit Blueprint')

@push('styles')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,.04);max-width:900px}
    .form-group{margin-bottom:20px}
    .form-label{display:block;font-size:.85rem;font-weight:700;color:#334155;margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px}
    .form-control{width:100%;padding:12px 16px;border:1px solid #cbd5e1;border-radius:10px;font-size:.95rem;color:#1e293b;transition:all .2s;font-family:inherit}
    .form-control:focus{outline:none;border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.15)}
    .btn-submit{padding:12px 24px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-weight:600;font-size:1rem;cursor:pointer;transition:all .2s}
    .btn-submit:hover{opacity:.9;transform:translateY(-1px)}
</style>
@endpush

@section('content')
@include('_partials.flash')

<div class="breadcrumb">
    <a href="{{ route('blueprints.index') }}">Blueprint List</a> <span>/</span> 
    <a href="{{ route('blueprints.show', $blueprint) }}">{{ $blueprint->title ?? 'Details' }}</a> <span>/</span> 
    <span>Edit</span>
</div>

<div class="card">
    <form action="{{ route('blueprints.update', $blueprint) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label class="form-label">Name / Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blueprint->title) }}" required placeholder="Enter Blueprint name...">
        </div>
        
        <div class="form-group">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-control" required>
                @foreach($projects as $proj)
                    <option value="{{ $proj->id }}" {{ old('project_id', $blueprint->project_id) == $proj->id ? 'selected' : '' }}>{{ $proj->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft" {{ old('status', $blueprint->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Active" {{ old('status', $blueprint->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Completed" {{ old('status', $blueprint->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">1. Background <small style="text-transform:none; color:#dc2626; font-weight:normal;">(Not used for SD/MM/FI blueprints)</small></label>
            <textarea name="background" id="background_hidden" style="display:none;">{!! old('background', $blueprint->background) !!}</textarea>
            <div id="editor_background"></div>
        </div>
        
        <div class="form-group">
            <label class="form-label">2. Scope <small style="text-transform:none; color:#059669; font-weight:normal;">(Use this field for entire SD/MM/FI content)</small></label>
            <textarea name="scope" id="scope_hidden" style="display:none;">{!! old('scope', $blueprint->scope) !!}</textarea>
            <div id="editor_scope"></div>
        </div>
        
        <div class="form-group">
            <label class="form-label">3. Out of Scope <small style="text-transform:none; color:#dc2626; font-weight:normal;">(Not used for SD/MM/FI blueprints)</small></label>
            <textarea name="out_of_scope" id="out_of_scope_hidden" style="display:none;">{!! old('out_of_scope', $blueprint->out_of_scope) !!}</textarea>
            <div id="editor_out_of_scope"></div>
        </div>

        <button type="submit" class="btn-submit">Update Blueprint</button>
    </form>
</div>
@endsection

@push('scripts')
<!-- Toast UI Editor CSS & JS -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editorBg = new toastui.Editor({
            el: document.querySelector('#editor_background'),
            height: '300px',
            initialEditType: 'wysiwyg',
            previewStyle: 'vertical',
            initialValue: document.querySelector('#background_hidden').value
        });
        
        const editorScope = new toastui.Editor({
            el: document.querySelector('#editor_scope'),
            height: '300px',
            initialEditType: 'wysiwyg',
            previewStyle: 'vertical',
            initialValue: document.querySelector('#scope_hidden').value
        });
        
        const editorOutScope = new toastui.Editor({
            el: document.querySelector('#editor_out_of_scope'),
            height: '300px',
            initialEditType: 'wysiwyg',
            previewStyle: 'vertical',
            initialValue: document.querySelector('#out_of_scope_hidden').value
        });

        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#background_hidden').value = editorBg.getMarkdown();
            document.querySelector('#scope_hidden').value = editorScope.getMarkdown();
            document.querySelector('#out_of_scope_hidden').value = editorOutScope.getMarkdown();
        });
    });
</script>
@endpush