@extends('layouts.app')
@section('title', 'Create BRD Document')
@section('page_title', 'Create BRD Document')

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

<div class="breadcrumb" style="justify-content: space-between;">
    <div>
        <a href="{{ route('brd-documents.index') }}">BRD Document List</a> <span>/</span> <span>Create</span>
    </div>
    <a href="{{ route('brd-documents.index') }}" class="btn-submit" style="background: #fff; color: #475569; border: 1px solid #e2e8f0; font-size: 0.85rem; padding: 6px 12px; text-decoration: none;">⬅️ Back</a>
</div>

<div class="card">
    <form action="{{ route('brd-documents.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">BRD Code</label>
            <input type="text" name="brd_code" class="form-control" required placeholder="Enter BRD code...">
        </div>
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required placeholder="Enter BRD title...">
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
                <option value="Under Review">Under Review</option>
                <option value="Approved">Approved</option>
                <option value="Archived">Archived</option>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Content (BRD Matrix)</label>
            <textarea name="content" id="content_hidden" style="display:none;"></textarea>
            <div id="editor"></div>
        </div>

        <button type="submit" class="btn-submit">Save BRD Document</button>
    </form>
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