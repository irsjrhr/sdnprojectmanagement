@forelse($blueprints as $item)
<tr>
    <td>{{ $loop->iteration + ($blueprints->currentPage() - 1) * $blueprints->perPage() }}</td>
    <td><strong>{{ $item->title ?? 'Untitled' }}</strong></td>
    <td>{{ $item->project?->name ?? '-' }}</td>
    <td>{{ $item->status ?? '-' }}</td>
    <td style="text-align:right">
        <a href="{{ route('blueprints.show', $item) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
        @can('manage blueprints')
        <a href="{{ route('blueprints.edit', $item) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
        <form action="{{ route('blueprints.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus blueprint ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
        </form>
        @endcan
    </td>
</tr>
@empty
<tr><td colspan="5"><div class="empty-state">No blueprints found.</div></td></tr>
@endforelse
