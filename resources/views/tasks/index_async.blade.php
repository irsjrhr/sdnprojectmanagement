        @forelse($tasks as $item)
        <tr>
            <td>{{ ($tasks->currentPage()-1)*$tasks->perPage() + $loop->iteration }}</td>
            <td><strong>{{ $item->title ?? 'Untitled' }}</strong></td>
            <td>{{ $item->project?->name ?? 'No Project' }}</td>
            <td>
                @if($item->sprint)
                <span class="badge" style="background:#e0e7ff;color:#4338ca">{{ $item->sprint->name }}</span>
                @else
                -
                @endif
            </td>
            <td>
                @if($item->epic)
                <span class="badge" style="background:#f3e8ff;color:#7e22ce">{{ $item->epic->name }}</span>
                @else
                -
                @endif
            </td>
            <td>{{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('d M Y') : '-' }}</td>
            <td>{{ $item->due_date ? \Carbon\Carbon::parse($item->due_date)->format('d M Y') : '-' }}</td>
            <td>
                @if($item->brdDocument)
                <span class="badge badge-brd">{{ $item->brdDocument->brd_code ?? '' }} - {{ $item->brdDocument->title ?? '' }}</span>
                @else
                -
                @endif
            </td>
            <td>{{ $item->type ?? '-' }}</td>
            <td style="text-align: center; font-weight: 600;">{{ $item->story_points ?? '-' }}</td>
            <td>{{ $item->priority ?? '-' }}</td>
            <td>
                @if($item->assignee)
                    <div style="display:flex; align-items:center; gap: 8px;">
                        <div style="width:24px; height:24px; border-radius:50%; background:var(--primary); color:#fff; display:flex; align-items:center; justify-content:center; font-size:0.7rem; font-weight:bold;">
                            {{ strtoupper(substr($item->assignee->name, 0, 1)) }}
                        </div>
                        {{ $item->assignee->name }}
                    </div>
                @else
                    -
                @endif
            </td>
            <td><span class="badge badge-{{ strtolower(str_replace(' ','',$item->status)) }}">{{ $item->status ?? '-' }}</span></td>
            <td style="text-align:right">
                <a href="{{ route('tasks.show', $item) }}" style="color:#64748b;text-decoration:none;margin-right:10px;font-size:0.85rem">👁️ Show</a>
                @can('update tasks')
                <a href="{{ route('tasks.edit', $item) }}" style="color:#0891b2;text-decoration:none;margin-right:10px;font-size:0.85rem">✏️ Edit</a>
                @endcan
                @can('delete tasks')
                <form action="{{ route('tasks.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus task ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:#ef4444;text-decoration:none;font-size:0.85rem;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">🗑️ Delete</button>
                </form>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="14"><div class="empty-state">No tasks found.</div></td></tr>
        @endforelse
        
        <tr class="pagination-row" style="display: none;">
            <td colspan="14">
                <div class="pagination-wrapper">
                    @if(method_exists($tasks, 'links') && $tasks->hasPages())
                        {{ $tasks->appends(request()->query())->links() }}
                    @endif
                </div>
            </td>
        </tr>
