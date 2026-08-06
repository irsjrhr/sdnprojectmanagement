@extends('layouts.app')
@section('title','Master Roles')
@section('page_title','Master Roles')

@section('content')
@include('_partials.flash')
<style>
    .toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
    .btn-primary{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#2563eb);color:#fff;border:none;border-radius:10px;text-decoration:none;font-weight:600;}
    .btn-sm{padding:6px 12px;background:linear-gradient(135deg,#f1f5f9,#e2e8f0);color:#334155;border:1px solid #cbd5e1;border-radius:6px;cursor:pointer;font-size:0.8rem;font-weight:600;transition:all 0.2s;}
    .btn-sm:hover{background:#fff;border-color:#0891b2;color:#0891b2;}
    .table-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.04)}
    table{width:100%;border-collapse:collapse}
    thead{background:linear-gradient(135deg,#f8fafc,#f1f5f9)}
    th{padding:13px 16px;text-align:left;font-size:.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;}
    td{padding:14px 16px;border-top:1px solid #f1f5f9;font-size:.9rem;color:#334155;vertical-align:middle}
    .empty-state{text-align:center;padding:60px 20px;color:#94a3b8}
    .badge {display: inline-block; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 600; background: #e2e8f0; color: #475569;}
    .badge-primary {background: rgba(8, 145, 178, 0.1); color: #0891b2;}
    
    /* Modal Styles */
    .modal-overlay {position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px); z-index: 1000; display: flex; align-items: center; justify-content: center;}
    .modal-content {background: #fff; width: 640px; max-width: 95%; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: flex; flex-direction: column; height: 80vh; max-height: 80vh; overflow: hidden;}
    .modal-header {padding: 16px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0;}
    .modal-title {font-size: 1.1rem; font-weight: 700; color: #0f172a;}
    .modal-close {background: none; border: none; font-size: 1.5rem; color: #94a3b8; cursor: pointer;}
    .modal-close:hover {color: #ef4444;}
    .modal-body {padding: 16px 24px; overflow-y: scroll; flex: 1; min-height: 0;}
    .modal-footer {padding: 14px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end; gap: 12px; background: #f8fafc; border-radius: 0 0 16px 16px; flex-shrink: 0;}
    .btn-secondary {padding: 10px 20px; background: #fff; color: #475569; border: 1px solid #cbd5e1; border-radius: 10px; cursor: pointer; font-weight: 600;}
    .btn-secondary:hover {background: #f1f5f9;}
    
    .perm-list {display: flex; flex-direction: column; gap: 8px; padding-right: 2px;}
    .perm-group {border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;}
    .perm-group-title {background: linear-gradient(135deg,#f8fafc,#f1f5f9); padding: 10px 16px; font-weight: 700; font-size: 0.85rem; color: #0f172a; border-bottom: 1px solid #e2e8f0; text-transform: capitalize; letter-spacing: 0.3px;}
    .perm-group-items {display: flex; flex-direction: row; flex-wrap: nowrap; gap: 8px; padding: 10px 14px; background: #fff; overflow-x: auto;}
    .perm-item {display: flex; align-items: center; gap: 6px; padding: 6px 12px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; white-space: nowrap; cursor: pointer; flex-shrink: 0;}
    .perm-item:hover {background: #eff6ff; border-color: #bfdbfe;}
    .perm-item.is-checked {background: #eff6ff; border-color: #0891b2;}
    .perm-item input[type="checkbox"] {width: 15px; height: 15px; accent-color: #0891b2; cursor: pointer; flex-shrink: 0;}
    .perm-label {font-size: 0.82rem; font-weight: 600; color: #334155; cursor: pointer; text-transform: capitalize; user-select: none;}
</style>

<div>
    <div class="toolbar">
        <div>Manage access roles and their permissions</div>
        @can('create roles')
        <a href="{{ route('roles.create') }}" class="btn-primary">＋ New Role</a>
        @endcan
    </div>
    
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Total Users</th>
                    <th>Permissions Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $item->name }}</strong></td>
                <td>
                    <span class="badge badge-primary">{{ $item->users_count ?? 0 }} Users</span>
                </td>
                <td>
                    <span class="badge">{{ $item->permissions_count ?? 0 }} Permissions</span>
                </td>
                <td>
                    <div style="display:flex; justify-content:flex-start; gap:8px;">
                        @can('update roles')
                        <button class="btn-sm btn-manage-perms" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                            Manage Permissions
                        </button>
                        <a href="{{ route('roles.edit', $item) }}" class="btn-sm" style="text-decoration:none;">Edit</a>
                        @endcan
                        
                        @can('delete roles')
                        <form action="{{ route('roles.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm" style="color: #ef4444; border-color: #fca5a5;" {{ $item->name === 'Super Admin' || ($item->users_count ?? 0) > 0 ? 'disabled' : '' }}>Delete</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5"><div class="empty-state">No roles found.</div></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Permissions -->
    <div class="modal-overlay" id="permModal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Manage Permissions: <span id="modalRoleName" style="color: #0891b2;"></span></div>
                <button class="modal-close" id="closeModalBtn">&times;</button>
            </div>
            
            <div class="modal-body">
                <form id="formPermissions">
                    <input type="hidden" id="modalRoleId" name="role_id">
                    
                    <div id="modalLoading" style="text-align: center; padding: 40px; color: #64748b;">
                        Loading permissions...
                    </div>
                    
                    <div id="modalSearchContainer" style="display: none; margin-bottom: 15px;">
                        <input type="text" id="modalSearchInput" placeholder="Search permissions..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.9rem; outline: none; transition: border-color 0.2s;">
                    </div>
                    
                    <div class="perm-list" id="modalPermList" style="display: none;">
                        {{-- Checkboxes will be appended here --}}
                    </div>
                    
                    <div id="modalEmpty" style="display: none; text-align: center; color: #94a3b8; padding: 20px;">
                        No permissions available in system.
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" id="cancelModalBtn">Cancel</button>
                <button type="button" class="btn-primary" id="saveModalBtn">
                    <span class="btn-text">Save Permissions</span>
                    <span class="btn-loading" style="display:none;">Saving...</span>
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Open Modal
    $('.btn-manage-perms').on('click', function() {
        const roleId = $(this).data('id');
        const roleName = $(this).data('name');
        
        $('#modalRoleId').val(roleId);
        $('#modalRoleName').text(roleName);
        $('#modalSearchInput').val(''); // Reset search input
        
        $('#permModal').fadeIn(200);
        $('#modalLoading').show();
        $('#modalSearchContainer').hide();
        $('#modalPermList').hide().empty();
        $('#modalEmpty').hide();
        $('#saveModalBtn').prop('disabled', true);
        
        // Fetch permissions
        $.ajax({
            url: `{{ url('/roles') }}/${roleId}/permissions`,
            type: 'GET',
            success: function(response) {
                const perms = response.permissions;
                $('#modalLoading').hide();
                
                if(perms.length === 0) {
                    $('#modalEmpty').show();
                } else {
                    const actionOrder = ['create', 'read', 'update', 'delete', 'access'];
                    const grouped = {};
                    
                    perms.forEach(function(perm) {
                        let parts = perm.name.split(' ');
                        let action = parts[0].toLowerCase();
                        let entity = parts.slice(1).join(' ');
                        
                        // Handle single-word permissions like 'read roadmap', 'update roadmap'
                        if (!entity) entity = '(System)';
                        
                        if (!grouped[entity]) grouped[entity] = [];
                        grouped[entity].push({ action: action, name: perm.name, assigned: perm.assigned });
                    });
                    
                    // Sort groups alphabetically but put system last
                    const sortedEntities = Object.keys(grouped).sort((a, b) => {
                        if (a === '(System)') return 1;
                        if (b === '(System)') return -1;
                        return a.localeCompare(b);
                    });
                    
                    let html = '';
                    sortedEntities.forEach(function(entity) {
                        // Sort each group's actions in CRUD order
                        grouped[entity].sort((a, b) => {
                            const ai = actionOrder.indexOf(a.action);
                            const bi = actionOrder.indexOf(b.action);
                            return (ai === -1 ? 99 : ai) - (bi === -1 ? 99 : bi);
                        });
                        
                        const title = entity === '(System)' ? 'System Access' : `Manage ${entity}`;
                        html += `<div class="perm-group" data-entity="${entity}">`;
                        html += `<div class="perm-group-title">${title}</div>`;
                        html += `<div class="perm-group-items">`;
                        grouped[entity].forEach(function(p) {
                            const checked = p.assigned ? 'checked' : '';
                            const isCheckedClass = p.assigned ? 'is-checked' : '';
                            const id = 'perm_' + p.name.replace(/\s+/g, '_');
                            html += `<label class="perm-item ${isCheckedClass}" for="${id}">
                                <input type="checkbox" id="${id}" name="permissions[]" value="${p.name}" ${checked}>
                                <span class="perm-label">${p.action}</span>
                            </label>`;
                        });
                        html += `</div></div>`;
                    });
                    $('#modalPermList').append(html);
                    
                    // Toggle is-checked class on click
                    $('#modalPermList').on('change', 'input[type="checkbox"]', function() {
                        $(this).closest('label').toggleClass('is-checked', this.checked);
                    });
                    
                    $('#modalSearchContainer').show();
                    $('#modalPermList').show();
                    $('#saveModalBtn').prop('disabled', false);
                }
            },
            error: function() {
                $('#modalLoading').hide();
                alert("Failed to load permissions. Please try again or check console.");
            }
        });
    });

    // Search Permissions
    $('#modalSearchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('#modalPermList .perm-group').each(function() {
            const groupText = $(this).text().toLowerCase();
            $(this).toggle(groupText.indexOf(value) > -1);
        });
    });

    // Close Modal Functions
    function closeModal() {
        $('#permModal').fadeOut(200);
    }
    
    $('#closeModalBtn, #cancelModalBtn').on('click', closeModal);
    
    // Close on outside click
    $('#permModal').on('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Save Permissions
    $('#saveModalBtn').on('click', function(e) {
        e.preventDefault();
        
        const roleId = $('#modalRoleId').val();
        
        // Get all checked values
        const assignedPerms = [];
        $('input[name="permissions[]"]:checked').each(function() {
            assignedPerms.push($(this).val());
        });
        
        $('#saveModalBtn').prop('disabled', true);
        $('#saveModalBtn .btn-text').hide();
        $('#saveModalBtn .btn-loading').show();
        
        $.ajax({
            url: `{{ url('/roles') }}/${roleId}/permissions`,
            type: 'POST',
            data: JSON.stringify({ permissions: assignedPerms }),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success!',
                    text: 'Permissions updated successfully.',
                    showConfirmButton: false,
                    timer: 3000
                });
                closeModal();
                setTimeout(() => window.location.reload(), 1500);
            },
            error: function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update permissions.',
                    showConfirmButton: false,
                    timer: 5000
                });
                $('#saveModalBtn').prop('disabled', false);
                $('#saveModalBtn .btn-text').show();
                $('#saveModalBtn .btn-loading').hide();
            }
        });
    });
});
</script>
@endpush
@endsection
