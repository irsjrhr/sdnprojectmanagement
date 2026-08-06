@extends('layouts.app')
@section('title','Blueprints')
@section('page_title','Blueprints')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
    .btn-primary{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;text-decoration:none;font-weight:600;}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:separate;border-spacing:0;}
    thead{position:sticky;top:0;z-index:10;}
    th{background:linear-gradient(135deg,#f8fafc,#f1f5f9);padding:13px 16px;text-align:left;font-size:.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid #e2e8f0;}
    td{padding:14px 16px;border-bottom:1px solid #f1f5f9;font-size:.9rem;color:#334155;vertical-align:middle;}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
</style>
<div class="toolbar">
    <div style="display:flex; gap: 10px; flex-wrap: wrap; align-items: center;">
        <input type="text" id="filterSearch" placeholder="Search blueprints..." style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; min-width: 200px;">
        
        <select id="filterProject" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All Projects</option>
            @foreach($projects as $proj)
                <option value="{{ $proj->id }}">{{ $proj->name }}</option>
            @endforeach
        </select>
        
        <select id="filterStatus" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All Statuses</option>
            <option value="Draft">Draft</option>
            <option value="Review">Review</option>
            <option value="Approved">Approved</option>
        </select>

        <button type="button" id="btnSubmitFilter" style="padding: 8px 16px; background: #0891b2; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            🔍 Cari
        </button>

        <button type="button" id="btnResetFilter" style="padding: 8px 16px; background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            ✖ Reset
        </button>
    </div>
    @can('manage blueprints')
    <a href="{{ route('blueprints.create') }}" class="btn-primary">＋ New Blueprint</a>
    @endcan
</div>
<div class="table-card">
    <div style="max-height: calc(100vh - 240px); overflow-y: auto;">
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Project</th>
                <th>Status</th>
                <th style="text-align:right">Action</th>
            </tr>
        </thead>
        <tbody id="blueprints-table-body">
            <tr>
                <td colspan="5">
                    <div style="text-align:center; padding: 40px; color: #64748b;">
                        Loading blueprints...
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
    
    // Ajax Loading Logic
    function getFilterUrl(baseUrl = `{{ route('blueprints.index_async') }}`) {
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

    function loadBlueprints(url) {
        $('#blueprints-table-body').html('<tr><td colspan="5"><div style="text-align:center; padding: 40px; color: #64748b;">Loading blueprints...</div></td></tr>');
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#blueprints-table-body').html(response.html);
                $('#pagination-container').html(response.pagination);
            },
            error: function() {
                $('#blueprints-table-body').html('<tr><td colspan="5"><div style="text-align:center; padding: 40px; color: #ef4444;">Failed to load blueprints. Please try again.</div></td></tr>');
            }
        });
    }

    // Initial Load
    loadBlueprints(getFilterUrl());

    // Search and Filter Events
    $('#btnSubmitFilter').on('click', function() {
        loadBlueprints(getFilterUrl());
    });

    $('#btnResetFilter').on('click', function() {
        $('#filterSearch').val('');
        $('#filterProject').val('');
        $('#filterStatus').val('');
        loadBlueprints(getFilterUrl());
    });
    
    $('#filterSearch').on('keypress', function(e) {
        if(e.which === 13) {
            loadBlueprints(getFilterUrl());
        }
    });

    $('#perPageSelect').on('change', function() {
        loadBlueprints(getFilterUrl());
    });

    $(document).on('click', '#pagination-container a', function(e) {
        e.preventDefault();
        loadBlueprints($(this).attr('href'));
    });

});
</script>
@endpush
@endsection
