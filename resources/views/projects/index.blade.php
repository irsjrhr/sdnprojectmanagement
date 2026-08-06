@extends('layouts.app')
@section('title','Projects')
@section('page_title','Projects')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;gap:12px;flex-wrap:wrap}
    .btn-primary{display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;font-size:0.9rem;font-weight:600;cursor:pointer;text-decoration:none;transition:all .2s}
    .btn-primary:hover{opacity:.9;transform:translateY(-1px);box-shadow:0 4px 12px rgba(8,145,178,.3)}
    .search-box input{padding:9px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:0.9rem;outline:none;transition:border .2s;min-width:240px;width:100%}
    .search-box input:focus{border-color:#0891b2}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:collapse}
    thead{background:linear-gradient(135deg,#f8fafc,#f1f5f9)}
    th{padding:13px 16px;text-align:left;font-size:.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;white-space:nowrap}
    td{padding:14px 16px;border-top:1px solid #f1f5f9;font-size:.9rem;color:#334155;vertical-align:middle}
    tr:hover td{background:#fafcff}
    .badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:.75rem;font-weight:600}
    .badge-active{background:#dcfce7;color:#166534}
    .badge-inactive,.badge-draft{background:#f1f5f9;color:#64748b}
    .badge-archived{background:#fef3c7;color:#92400e}
    .action-btns{display:flex;gap:6px}
    .btn-sm{padding:5px 12px;border-radius:8px;font-size:.8rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all .15s;display:inline-block}
    .btn-view{background:#eff6ff;color:#2563eb}.btn-view:hover{background:#dbeafe}
    .btn-edit{background:#f0fdf4;color:#16a34a}.btn-edit:hover{background:#dcfce7}
    .btn-del{background:#fff1f2;color:#e11d48}.btn-del:hover{background:#ffe4e6}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
    .empty-state .icon{font-size:3rem;margin-bottom:12px}
</style>

<div class="toolbar">
    <div class="search-box">
        <input type="text" placeholder="Search projects…" oninput="filterTable(this.value)">
    </div>
    @can('create projects')
    <a href="{{ route('projects.create') }}" class="btn-primary">＋ New Project</a>
    @endcan
</div>

<div class="table-card">
    <table id="tbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Key</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Status</th>
                <th>Created</th>
                <th style="text-align:right">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($projects as $p)
        <tr>
            <td>{{ ($projects->currentPage()-1)*$projects->perPage() + $loop->iteration }}</td>
            <td><code style="background:#f1f5f9;padding:2px 8px;border-radius:6px;font-size:.82rem">{{ $p->key }}</code></td>
            <td><a href="{{ route('projects.show',$p) }}" style="color:#0891b2;font-weight:600;text-decoration:none;hover:underline">{{ $p->name }}</a></td>
            <td>{{ $p->owner?->name ?? '—' }}</td>
            <td><span class="badge badge-{{ strtolower($p->status) }}">{{ $p->status }}</span></td>
            <td>{{ $p->created_at->format('d M Y') }}</td>
            <td>
                <div class="action-btns">
                    <a href="{{ route('projects.show',$p) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
                    @can('update projects')
                    <a href="{{ route('projects.edit',$p) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
                    @endcan
                    @can('delete projects')
                    <form method="POST" action="{{ route('projects.destroy',$p) }}" style="display:inline" onsubmit="return confirm('Delete project?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="7">
            <div class="empty-state">
                <div class="icon">📁</div>No projects yet. 
                @can('create projects')
                <a href="{{ route('projects.create') }}" style="color:#0891b2">Create one</a>.
                @endcan
            </div>
        </td></tr>
        @endforelse
        </tbody>
    </table>
    @if($projects->hasPages())
    <div style="padding:16px 20px;border-top:1px solid #f1f5f9">{{ $projects->links() }}</div>
    @endif
</div>
<script>
function filterTable(q){q=q.toLowerCase();document.querySelectorAll('#tbl tbody tr').forEach(r=>{r.style.display=r.textContent.toLowerCase().includes(q)?'':'none'});}
</script>
@endsection
