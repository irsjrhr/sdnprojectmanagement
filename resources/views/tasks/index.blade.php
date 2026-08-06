@extends('layouts.app')
@section('title','Tasks')
@section('page_title','Tasks')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
    .btn-primary{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;text-decoration:none;font-weight:600;}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:separate;border-spacing:0;}
    thead{position:sticky;top:0;z-index:10;}
    th{background:linear-gradient(135deg,#f8fafc,#f1f5f9);padding:13px 16px;text-align:left;font-size:.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid #e2e8f0; white-space:nowrap;}
    td{padding:14px 16px;border-bottom:1px solid #f1f5f9;font-size:.9rem;color:#334155;vertical-align:middle; white-space:nowrap;}
    th:last-child, td:last-child {position: sticky; right: 0; z-index: 5;}
    th:last-child {background: linear-gradient(135deg,#f8fafc,#f1f5f9);}
    td:last-child {background: #fff; border-left: 1px solid #f1f5f9;}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
    .badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:.75rem;font-weight:600}
    .badge-brd{background:#fef3c7;color:#92400e;}
    .badge-todo{background:#f1f5f9;color:#64748b}
    .badge-inprogress{background:#eff6ff;color:#2563eb}
    .badge-done{background:#dcfce7;color:#166534}
</style>
<div class="toolbar">
    <div style="display:flex; gap: 10px; flex-wrap: wrap; align-items: center;">
        <input type="text" id="filterSearch" placeholder="Search tasks..." style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; min-width: 200px;">
        
        <select id="filterProject" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All Projects</option>
            @foreach($projects as $proj)
                <option value="{{ $proj->id }}">{{ $proj->name }}</option>
            @endforeach
        </select>
        
        <select id="filterStatus" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All Statuses</option>
            <option value="To Do">To Do</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select>

        <button type="button" id="btnSubmitFilter" style="padding: 8px 16px; background: #0891b2; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            🔍 Cari
        </button>

        <button type="button" id="btnResetFilter" style="padding: 8px 16px; background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            ✖ Reset
        </button>
    </div>
    @can('create tasks')
    <a href="{{ route('tasks.create') }}" class="btn-primary">＋ New Task</a>
    @endcan
</div>
<div class="table-card">
    <div style="max-height: calc(100vh - 240px); overflow: auto;">
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Project</th>
                <th>Sprint</th>
                <th>Epic</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>BRD</th>
                <th>Type</th>
                <th>Story Points</th>
                <th>Priority</th>
                <th>PIC</th>
                <th>Status</th>
                <th style="text-align:right">Action</th>
            </tr>
        </thead>
        <tbody id="tasks-table-body">
            <tr>
                <td colspan="14">
                    <div style="text-align:center; padding: 40px; color: #64748b;">
                        Loading tasks...
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    <div style="padding:16px 20px;border-top:1px solid #f1f5f9; display:flex; justify-content: space-between; align-items: center;">
        <div id="pagination-container">
            <!-- Pagination will be loaded here via AJAX -->
        </div>
        <div>
            <form id="perPageForm" style="margin: 0;">
                <select name="per_page" id="perPageSelect" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; color: #475569; font-size: 0.85rem; outline: none; cursor: pointer; background: #fff;">
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

@push('scripts')
<script>
$(document).ready(function() {
    
    function getFilterUrl(baseUrl = `{{ route('tasks.index_async') }}`) {
        let url = new URL(baseUrl, window.location.origin);
        url.searchParams.set('per_page', $('#perPageSelect').val());
        
        let search = $('#filterSearch').val();
        if(search) url.searchParams.set('search', search);
        
        let projectId = $('#filterProject').val();
        if(projectId) url.searchParams.set('project_id', projectId);
        
        let status = $('#filterStatus').val();
        if(status) url.searchParams.set('status', status);
        
        return url.toString();
    }

    function loadTasks(url) {
        $('#tasks-table-body').html('<tr><td colspan="14"><div style="text-align:center; padding: 40px; color: #64748b;">Loading tasks...</div></td></tr>');
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#tasks-table-body').html(response.html);
                $('#pagination-container').html(response.pagination);
            },
            error: function() {
                $('#tasks-table-body').html('<tr><td colspan="14"><div style="text-align:center; padding: 40px; color: #ef4444;">Failed to load tasks. Please try again.</div></td></tr>');
            }
        });
    }

    // Initial load
    loadTasks(getFilterUrl());
    
    // Handle Pagination clicks
    $(document).on('click', '#pagination-container a', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        loadTasks(url);
    });
    
    // Trigger search manually via Submit Button
    $('#btnSubmitFilter').on('click', function() {
        loadTasks(getFilterUrl());
    });

    // Reset filters
    $('#btnResetFilter').on('click', function() {
        $('#filterSearch').val('');
        $('#filterProject').val('');
        $('#filterStatus').val('');
        loadTasks(getFilterUrl());
    });
    
    // Allow enter key in search box to submit
    $('#filterSearch').on('keypress', function(e) {
        if(e.which === 13) {
            loadTasks(getFilterUrl());
        }
    });

    // Handle per page change
    $('#perPageSelect').on('change', function() {
        loadTasks(getFilterUrl());
    });

});
</script>
@endpush
@endsection
