@extends('layouts.app')
@section('title','Epics')
@section('page_title','Epics')

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
    @can('create epics')
    <a href="{{ route('epics.create') }}" class="btn-primary">＋ New Epic</a>
    @endcan
</div>
<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Project ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($epics as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><strong>{{ $item->name ?? 'Untitled' }}</strong></td>
            <td>{{ $item->project_id ?? '-' }}</td>
            <td>{{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('Y-m-d') : '-' }}</td>
            <td>{{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('Y-m-d') : '-' }}</td>
            <td>{{ $item->status ?? '-' }}</td>
            <td>
                <div style="display:flex; gap:8px;">
                    <a href="{{ route('epics.show', $item->id) }}" style="color:#64748b; text-decoration:none; font-weight:600; font-size:0.85rem;">Show</a>
                    @can('update epics')
                    <a href="{{ route('epics.edit', $item->id) }}" style="color:#0891b2; text-decoration:none; font-weight:600; font-size:0.85rem;">Edit</a>
                    @endcan
                    @can('delete epics')
                    <form action="{{ route('epics.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this epic?');" style="margin:0;">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:#ef4444; cursor:pointer; font-weight:600; font-size:0.85rem; padding:0;">Delete</button>
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="8"><div class="empty-state">No epics found.</div></td></tr>
        @endforelse
        </tbody>
    </table>
        <div style="padding:16px 20px;border-top:1px solid #f1f5f9; display:flex; justify-content: space-between; align-items: center;">
        <div>
            @if(method_exists($epics, 'links') && $epics->hasPages())
                {{ $epics->appends(request()->query())->links() }}
            @endif
        </div>
        <div>
            <form action="{{ route('epics.index') }}" method="GET" style="margin: 0;">
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
@endsection
