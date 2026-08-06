@extends('layouts.app')
@section('title', 'New ERD')
@section('page_title', 'Create ERD')

@section('content')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .form-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 30px; box-shadow: 0 2px 8px rgba(0,0,0,.04); max-width: 900px; margin: 0 auto; }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 8px; }
    .form-control { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem; color: #1e293b; transition: all 0.2s; }
    .form-control:focus { border-color: #0891b2; outline: none; box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1); }
    .btn-submit { padding: 12px 24px; background: linear-gradient(135deg, #0891b2, #2563eb); color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: opacity 0.2s; }
    .btn-submit:hover { opacity: 0.9; }
    .code-editor { font-family: 'Courier New', Courier, monospace; background: #1e293b; color: #f8fafc; border: none; }
</style>

<div class="breadcrumb">
    <a href="{{ route('erds.index') }}">ERD List</a> <span>/</span> <span>New ERD</span>
</div>

<div style="margin-bottom: 24px; max-width: 900px; margin-left: auto; margin-right: auto;">
    <a href="{{ route('erds.index') }}" style="display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#64748b;border:1px solid #cbd5e1;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s" onmouseover="this.style.background='#f1f5f9'; this.style.color='#334155'" onmouseout="this.style.background='#f8fafc'; this.style.color='#64748b'">⬅️ Back to List</a>
</div>

<div class="form-card">
    <form action="{{ route('erds.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">ERD Code</label>
            <input type="text" name="code" class="form-control" placeholder="e.g. ERD-001" required value="{{ old('code') }}">
        </div>
        
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="e.g. Master Data Schema" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Review" {{ old('status') == 'Review' ? 'selected' : '' }}>Review</option>
                <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Description (Markdown Supported)</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Brief explanation of this diagram...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Document Content (HTML / Markdown)</label>
            <textarea name="content" class="form-control" rows="10" placeholder="<h3>[NEW] Table: users</h3>...">{{ old('content') }}</textarea>
            <small style="color: #64748b; margin-top: 5px; display: block;">Masukkan struktur penjelasan tabel (seperti format blueprint).</small>
        </div>

        <div class="form-group">
            <label class="form-label">DBML Source Code</label>
            <textarea name="dbml" class="form-control code-editor" rows="15" placeholder="Table users {&#10;  id integer [primary key]&#10;  username varchar&#10;}">{{ old('dbml') }}</textarea>
            <small style="color: #64748b; margin-top: 5px; display: block;">Masukkan syntax DBML murni di sini.</small>
        </div>

        <div style="text-align: right; margin-top: 30px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <button type="submit" class="btn-submit">💾 Save ERD</button>
        </div>
    </form>
</div>
@endsection