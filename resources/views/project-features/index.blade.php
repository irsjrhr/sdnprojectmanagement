@extends('layouts.app')
@section('title','Fitur & Gap Scope')
@section('page_title','Fitur & Gap Scope')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
    .btn-primary{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;text-decoration:none;font-weight:600;}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:collapse}
    thead{background:linear-gradient(135deg,#f8fafc,#f1f5f9)}
    th{padding:13px 16px;text-align:left;font-size:.75rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;}
    td{padding:14px 16px;border-top:1px solid #f1f5f9;font-size:.85rem;color:#334155;vertical-align:middle}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
    .badge{display:inline-block;padding:4px 10px;border-radius:6px;font-size:.75rem;font-weight:700}
    .badge-brd{background:#fef3c7;color:#92400e}
    .badge-fsd{background:#dcfce7;color:#166534}
    
    /* Toggle switch CSS */
    .switch { position: relative; display: inline-block; width: 34px; height: 20px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #cbd5e1; transition: .4s; border-radius: 34px; }
    .slider:before { position: absolute; content: ""; height: 14px; width: 14px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
    input:checked + .slider { background-color: #2563eb; }
    input:checked + .slider:before { transform: translateX(14px); }
</style>
<div class="toolbar">
    <div style="display:flex; gap: 10px; flex-wrap: wrap; align-items: center;">
        <input type="text" id="filterSearch" placeholder="Search features..." style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; min-width: 200px;">
        
        <select id="filterProject" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All Projects</option>
            @foreach($projects as $proj)
                <option value="{{ $proj->id }}">{{ $proj->name }}</option>
            @endforeach
        </select>
        
        <select id="filterGap" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none; background: #fff;">
            <option value="">All (Gap/Non-Gap)</option>
            <option value="yes">Is Gap</option>
            <option value="no">Not Gap</option>
        </select>

        <button type="button" id="btnSubmitFilter" style="padding: 8px 16px; background: #0891b2; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            🔍 Cari
        </button>

        <button type="button" id="btnResetFilter" style="padding: 8px 16px; background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600;">
            ✖ Reset
        </button>
    </div>
    @canany(['manage features', 'create features'])
    <a href="{{ route('project-features.create') }}" class="btn-primary">＋ Tambah Gap / Fitur Kustom</a>
    @endcanany
</div>
<div class="table-card">
    <div style="overflow-x: auto; max-height: calc(100vh - 240px);">
        <table style="white-space: nowrap;">
            <thead>
                <tr>
                    <th>Nama Fitur</th>
                    <th>BRD</th>
                    <th>FSD</th>
                    <th style="text-align:center;">Dipilih (Yes/No)</th>
                    <th style="text-align:center;">Gap?</th>
                    <th>Deskripsi / Catatan</th>
                    <th style="text-align:right; position: sticky; right: 0; background: linear-gradient(135deg,#f8fafc,#f1f5f9); z-index: 10; box-shadow: -2px 0 5px rgba(0,0,0,0.05);">Action</th>
                </tr>
            </thead>
            <tbody id="features-table-body">
                <tr>
                    <td colspan="7">
                        <div style="text-align:center; padding: 40px; color: #64748b;">
                            Loading features...
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

<!-- Modal GAP Feedback -->
<div id="gapModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:#fff; padding:24px; border-radius:12px; width:500px; max-width:90%; box-shadow:0 10px 25px rgba(0,0,0,0.2);">
        <h3 style="margin-top:0; color:#334155; font-size:1.25rem;">Feedback GAP</h3>
        <p style="color:#64748b; font-size:0.9rem; margin-bottom:16px;">Masukkan detail GAP atau catatan untuk fitur ini:</p>
        <textarea id="gapFeedbackText" rows="6" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:8px; font-family:inherit; resize:vertical; font-size:0.95rem;"></textarea>
        <div style="margin-top:20px; display:flex; justify-content:flex-end; gap:10px;">
            <button id="cancelGapBtn" type="button" style="padding:10px 16px; background:#f1f5f9; color:#475569; border:none; border-radius:8px; cursor:pointer; font-weight:600;">Batal</button>
            <button id="saveGapBtn" type="button" style="padding:10px 16px; background:#2563eb; color:#fff; border:none; border-radius:8px; cursor:pointer; font-weight:600;">Simpan</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    
    // Ajax Loading Logic
    function getFilterUrl(baseUrl = `{{ route('project-features.index_async') }}`) {
        let url = new URL(baseUrl, window.location.origin);
        url.searchParams.set('per_page', $('#perPageSelect').val());
        
        let search = $('#filterSearch').val();
        if(search) url.searchParams.set('search', search);
        
        let projectId = $('#filterProject').val();
        if(projectId) url.searchParams.set('project_id', projectId);
        
        let gap = $('#filterGap').val();
        if(gap) url.searchParams.set('is_gap', gap);
        
        return url.toString();
    }

    function loadFeatures(url) {
        $('#features-table-body').html('<tr><td colspan="7"><div style="text-align:center; padding: 40px; color: #64748b;">Loading features...</div></td></tr>');
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#features-table-body').html(response.html);
                $('#pagination-container').html(response.pagination);
            },
            error: function() {
                $('#features-table-body').html('<tr><td colspan="7"><div style="text-align:center; padding: 40px; color: #ef4444;">Failed to load features. Please try again.</div></td></tr>');
            }
        });
    }

    // Initial Load
    loadFeatures(getFilterUrl());

    // Search and Filter Events
    $('#btnSubmitFilter').on('click', function() {
        loadFeatures(getFilterUrl());
    });

    $('#btnResetFilter').on('click', function() {
        $('#filterSearch').val('');
        $('#filterProject').val('');
        $('#filterGap').val('');
        loadFeatures(getFilterUrl());
    });
    
    $('#filterSearch').on('keypress', function(e) {
        if(e.which === 13) {
            loadFeatures(getFilterUrl());
        }
    });

    $('#perPageSelect').on('change', function() {
        loadFeatures(getFilterUrl());
    });

    $(document).on('click', '#pagination-container a', function(e) {
        e.preventDefault();
        loadFeatures($(this).attr('href'));
    });

    // Toggle Feature Logic
    $(document).on('change', '.feature-toggle', function() {
        const checkbox = $(this);
        const featureId = checkbox.data('id');
        const token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: `/project-features/${featureId}/toggle`,
            type: 'PATCH',
            contentType: 'application/json',
            headers: { 'X-CSRF-TOKEN': token },
            success: function(data) {
                if(!data.success) {
                    alert('Gagal mengubah status');
                    checkbox.prop('checked', !checkbox.prop('checked'));
                }
            },
            error: function() {
                alert('Terjadi kesalahan');
                checkbox.prop('checked', !checkbox.prop('checked'));
            }
        });
    });

    // Modal Gap Logic
    let currentFeatureId = null;

    $(document).on('click', '.btn-gap', function() {
        currentFeatureId = $(this).data('id');
        $('#gapFeedbackText').val($(this).data('desc') || '');
        $('#gapModal').css('display', 'flex');
        $('#gapFeedbackText').focus();
    });

    $('#cancelGapBtn').on('click', function() {
        $('#gapModal').hide();
        currentFeatureId = null;
    });

    $('#saveGapBtn').on('click', function() {
        if (!currentFeatureId) return;
        
        const feedback = $('#gapFeedbackText').val();
        const token = $('meta[name="csrf-token"]').attr('content');
        const saveBtn = $(this);
        
        saveBtn.text('Menyimpan...').prop('disabled', true);

        $.ajax({
            url: `/project-features/${currentFeatureId}/feedback`,
            type: 'PATCH',
            data: JSON.stringify({ description: feedback }),
            contentType: 'application/json',
            headers: { 'X-CSRF-TOKEN': token },
            success: function(data) {
                if(data.success) {
                    $('#gapModal').hide();
                    saveBtn.text('Simpan').prop('disabled', false);
                    currentFeatureId = null;
                    // Reload table asynchronously
                    loadFeatures(getFilterUrl());
                    
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Success!',
                        text: 'Feedback tersimpan.',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    alert('Gagal menyimpan feedback.');
                    saveBtn.text('Simpan').prop('disabled', false);
                }
            },
            error: function() {
                alert('Terjadi kesalahan');
                saveBtn.text('Simpan').prop('disabled', false);
            }
        });
    });

});
</script>
@endpush
@endsection
