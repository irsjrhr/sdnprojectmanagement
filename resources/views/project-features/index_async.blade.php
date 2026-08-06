@forelse($features as $item)
<tr>
    <td><strong>{{ $item->name ?? 'Untitled' }}</strong></td>
    <td>
        @if($item->brdDocument)
        <a href="{{ route('brd-documents.show', $item->brdDocument) }}" class="badge badge-brd" style="text-decoration:none;" title="Lihat Dokumen BRD">{{ $item->brd_code }}</a>
        @elseif($item->brd_code)
        <span class="badge badge-brd" title="Dokumen BRD belum dibuat">{{ $item->brd_code }}</span>
        @else
        -
        @endif
    </td>
    <td>
        @if($item->fsdDocument)
        <a href="{{ route('fsds.show', $item->fsdDocument) }}" class="badge badge-fsd" style="text-decoration:none;" title="Lihat Dokumen FSD">{{ $item->fsd_code }}</a>
        @elseif($item->fsd_code)
        <span class="badge badge-fsd" title="Dokumen FSD belum dibuat">{{ $item->fsd_code }}</span>
        @else
        -
        @endif
    </td>
    <td>
        @if($item->is_mandatory)
        <label class="switch" style="opacity: 0.5; cursor: not-allowed;" title="Fitur Konfigurasi Wajib">
            <input type="checkbox" checked disabled>
            <span class="slider" style="cursor: not-allowed;"></span>
        </label>
        @else
        <label class="switch">
            <input type="checkbox" class="feature-toggle" data-id="{{ $item->id }}" {{ $item->is_selected ? 'checked' : '' }}>
            <span class="slider"></span>
        </label>
        @endif
    </td>
    <td style="text-align:center">
        @if($item->is_mandatory)
        <span style="color:#94a3b8;font-size:1.1rem;opacity:0.5;cursor:not-allowed;display:inline-flex;align-items:center;gap:4px;" title="Fitur Konfigurasi Wajib tidak dapat dijadikan GAP">
            ✓ <span style="font-size:0.75rem;font-weight:600;text-decoration:none;">Tetap</span>
        </span>
        @elseif($item->is_gap)
        <button type="button" class="btn-gap" data-id="{{ $item->id }}" data-desc="{{ $item->description }}" style="background:none;border:none;cursor:pointer;color:#ef4444;font-size:1.1rem;display:inline-flex;align-items:center;gap:4px;" title="Edit Gap / Feedback">
            ⚠️ <span style="font-size:0.75rem;font-weight:600;text-decoration:underline;">Edit</span>
        </button>
        @else
        <button type="button" class="btn-gap" data-id="{{ $item->id }}" data-desc="{{ $item->description }}" style="background:none;border:none;cursor:pointer;color:#94a3b8;font-size:1.1rem;display:inline-flex;align-items:center;gap:4px;" title="Tandai sebagai GAP & Beri Feedback">
            ✓ <span style="font-size:0.75rem;font-weight:600;text-decoration:underline;">Tandai</span>
        </button>
        @endif
    </td>
    <td style="color:#64748b">{{ \Illuminate\Support\Str::limit($item->description, 50) }}</td>
    <td style="text-align:right; position: sticky; right: 0; background: #fff; z-index: 5; box-shadow: -2px 0 5px rgba(0,0,0,0.02);">
        <a href="{{ route('project-features.show', $item) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
        @can('manage features')
        <a href="{{ route('project-features.edit', $item) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
        <form action="{{ route('project-features.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus fitur ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
        </form>
        @endcan
    </td>
</tr>
@empty
<tr><td colspan="7"><div class="empty-state">No features found.</div></td></tr>
@endforelse
