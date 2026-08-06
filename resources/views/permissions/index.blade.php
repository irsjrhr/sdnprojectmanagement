@extends('layouts.app')
@section('title','Master Permissions')
@section('page_title','Master Permissions')

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
    .badge {display: inline-block; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 600; background: #e2e8f0; color: #475569;}
    .badge-primary {background: rgba(8, 145, 178, 0.1); color: #0891b2;}
</style>
<div class="toolbar">
    <div>View all available system permissions</div>
    @can('create permissions')
    <a href="{{ route('permissions.create') }}" class="btn-primary">＋ New Permission</a>
    @endcan
</div>
<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>Assigned to Roles Count</th>
                <th style="width: 150px; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($permissions as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><strong>{{ $item->name }}</strong></td>
            <td>{{ $item->guard_name }}</td>
            <td>
                <span class="badge badge-primary">{{ $item->roles_count ?? 0 }} Roles</span>
            </td>
            <td style="text-align: center;">
                <div style="display:flex; justify-content:center; gap:8px;">
                    @can('update permissions')
                    <a href="{{ route('permissions.edit', $item) }}" class="btn-primary" style="padding: 6px 12px; font-size: 0.8rem; background: #f1f5f9; color: #475569;">Edit</a>
                    @endcan
                    @can('delete permissions')
                    <form action="{{ route('permissions.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this permission?');" style="margin:0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-primary" style="padding: 6px 12px; font-size: 0.8rem; background: #fee2e2; color: #ef4444;" {{ ($item->roles_count ?? 0) > 0 ? 'disabled' : '' }}>Delete</button>
                    </form>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="5"><div class="empty-state">No permissions found.</div></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
