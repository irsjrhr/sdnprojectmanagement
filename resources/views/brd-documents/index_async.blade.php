@forelse($brds as $item)
<tr>
    <td>{{ $loop->iteration + ($brds->currentPage() - 1) * $brds->perPage() }}</td>
    <td><strong>{{ $item->brd_code ?? '-' }}</strong></td>
    <td>{{ $item->title ?? 'Untitled' }}</td>
    <td>
        <span style="display:inline-block;padding:4px 10px;border-radius:20px;font-size:0.75rem;font-weight:700;
            @if($item->status === 'Approved') background:#dcfce7;color:#166534;
            @elseif($item->status === 'Under Review') background:#fef3c7;color:#92400e;
            @else background:#f1f5f9;color:#475569; @endif">
            {{ $item->status ?? '-' }}
        </span>
    </td>
    <td style="text-align:right">
        <div class="action-links" style="justify-content:flex-end">
            <a href="{{ route('brd-documents.show', $item) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
            @can('update brd')
            <a href="{{ route('brd-documents.edit', $item) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
            @endcan
            @can('delete brd')
            <form action="{{ route('brd-documents.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this BRD?');" style="margin:0">
                @csrf
                @method('DELETE')
                <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
            </form>
            @endcan
        </div>
    </td>
</tr>
@empty
<tr><td colspan="5"><div class="empty-state">No BRD documents found.</div></td></tr>
@endforelse
