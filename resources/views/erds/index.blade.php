@extends('layouts.app')
@section('title','ERDs')
@section('page_title','Entity Relationship Diagrams')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
    .btn-primary{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;text-decoration:none;font-weight:600;}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:collapse}
    thead{background:linear-gradient(135deg,#f8fafc,#f1f5f9)}
    th{padding:13px 16px;text-align:left;font-size:.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;}
    td{padding:14px 16px;border-top:1px solid #f1f5f9;font-size:.9rem;color:#334155;vertical-align:middle}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
</style>
<div class="toolbar">
    <div></div>
    <a href="{{ route('erds.create') }}" class="btn-primary">+ New ERD</a>
</div>
<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Status</th>
                <th style="text-align:right">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($erds as $item)
        <tr onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
            <td onclick="window.location='{{ route('erds.show', $item) }}'" style="cursor: pointer;">{{ $loop->iteration }}</td>
            <td onclick="window.location='{{ route('erds.show', $item) }}'" style="cursor: pointer;"><strong>{{ $item->code ?? '-' }}</strong></td>
            <td onclick="window.location='{{ route('erds.show', $item) }}'" style="cursor: pointer;">{{ $item->title ?? 'Untitled' }}</td>
            <td onclick="window.location='{{ route('erds.show', $item) }}'" style="cursor: pointer;">{{ $item->status ?? '-' }}</td>
            <td style="text-align: center;">
                <textarea id="dbml_raw_{{ $item->id }}" style="display:none;">{{ $item->dbml }}</textarea>
                <div style="display: flex; gap: 8px; justify-content: center; align-items: center;">
                    <button type="button" id="btn_copy_{{ $item->id }}" onclick="copyDBML({{ $item->id }}); event.stopPropagation();" style="padding: 6px 12px; background: #10b981; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 0.8rem; transition: background 0.2s;">📋 Copy DBML</button>
                    
                    <a href="{{ route('erds.show', $item) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
                    
                    <a href="{{ route('erds.edit', $item) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
                    
                    <form action="{{ route('erds.destroy', $item) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this ERD?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="4"><div class="empty-state">No ERDs found.</div></td></tr>
        @endforelse
        </tbody>
    </table>
        <div style="padding:16px 20px;border-top:1px solid #f1f5f9; display:flex; justify-content: space-between; align-items: center;">
        <div>
            @if(method_exists($erds, 'links') && $erds->hasPages())
                {{ $erds->appends(request()->query())->links() }}
            @endif
        </div>
        <div>
            <form action="{{ route('erds.index') }}" method="GET" style="margin: 0;">
                <select name="per_page" onchange="this.form.submit()" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; color: #475569; font-size: 0.85rem; outline: none; cursor: pointer; background: #fff;">
                    @php $cpp = session('global_per_page', 20); @endphp
                    <option value="20" {{ $cpp == 20 ? 'selected' : '' }}>20 per page</option>
                    <option value="50" {{ $cpp == 50 ? 'selected' : '' }}>50 per page</option>
                    <option value="100" {{ $cpp == 100 ? 'selected' : '' }}>100 per page</option>
                    <option value="all" {{ $cpp === 'all' ? 'selected' : '' }}>Show All</option>
                </select>
            </form>
        </div>
    </div>
</div>

<script>
function copyDBML(id) {
    var rawText = document.getElementById('dbml_raw_' + id).value;
    if (!rawText) {
        alert('DBML source is empty for this ERD.');
        return;
    }
    function doCopy(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        } else {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                var successful = document.execCommand('copy');
                document.body.removeChild(textArea);
                if (successful) {
                    return Promise.resolve();
                } else {
                    return Promise.reject(new Error('Fallback copy failed'));
                }
            } catch (err) {
                document.body.removeChild(textArea);
                return Promise.reject(err);
            }
        }
    }

    doCopy(rawText).then(function() {
        var btn = document.getElementById('btn_copy_' + id);
        var origText = btn.innerHTML;
        btn.innerHTML = '✅ Copied!';
        btn.style.background = '#059669';
        setTimeout(function() {
            btn.innerHTML = origText;
            btn.style.background = '#10b981';
        }, 2000);
    }).catch(function(err) {
        alert('Failed to copy text. Your browser may block clipboard access on non-HTTPS sites.');
        console.error(err);
    });
}
</script>
@endsection
