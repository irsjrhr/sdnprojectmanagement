@extends('layouts.app')
@section('title', 'Task Details')
@section('page_title', 'Task Details')

@section('content')
@include('_partials.flash')
<style>
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:.85rem;color:#94a3b8;margin-bottom:24px}
    .breadcrumb a{color:#0891b2;text-decoration:none}.breadcrumb a:hover{text-decoration:underline}
    .toolbar{display:flex;align-items:center;justify-content:flex-end;margin-bottom:24px;gap:10px;}
    .btn-edit{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s}
    .btn-edit:hover{background:#f1f5f9;color:#0f172a;}

    .grid-container { display: grid; grid-template-columns: 1fr 300px; gap: 24px; align-items: start; }
    .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); margin-bottom: 24px; }
    .card-title { font-size: 1.1rem; font-weight: 700; color: #1e293b; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; display:flex; align-items:center; gap:8px; }
    .info-group { margin-bottom: 16px; }
    .info-label { font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #94a3b8; margin-bottom: 4px; letter-spacing: 0.5px; }
    .info-value { font-size: 0.95rem; color: #334155; font-weight: 500; }
    .badge{display:inline-block;padding:4px 12px;border-radius:20px;font-size:.75rem;font-weight:700;background:#f1f5f9;color:#64748b}

    /* ===== COMMENT SECTION ===== */
    .comment-thread { display: flex; flex-direction: column; gap: 16px; }
    .comment-item {
        display: flex; gap: 14px; align-items: flex-start;
        padding: 16px; border-radius: 12px; background: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: box-shadow .2s;
    }
    .comment-item:hover { box-shadow: 0 2px 8px rgba(0,0,0,.06); }
    .comment-avatar {
        width: 38px; height: 38px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: .9rem; color: #fff; flex-shrink: 0;
    }
    .avatar-pm { background: linear-gradient(135deg, #6366f1, #8b5cf6); }
    .avatar-qa { background: linear-gradient(135deg, #0ea5e9, #06b6d4); }
    .avatar-dev { background: linear-gradient(135deg, #10b981, #059669); }
    .avatar-other { background: linear-gradient(135deg, #f59e0b, #d97706); }

    .comment-body { flex: 1; }
    .comment-meta { display: flex; align-items: center; gap: 10px; margin-bottom: 6px; flex-wrap: wrap; }
    .comment-author { font-weight: 700; font-size: .9rem; color: #1e293b; }
    .role-badge {
        display: inline-block; padding: 2px 10px; border-radius: 20px;
        font-size: .7rem; font-weight: 700; letter-spacing: .5px;
    }
    .role-pm  { background: #ede9fe; color: #6d28d9; }
    .role-qa  { background: #e0f2fe; color: #0369a1; }
    .role-dev { background: #d1fae5; color: #065f46; }
    .role-other { background: #fef3c7; color: #92400e; }
    .comment-time { font-size: .75rem; color: #94a3b8; margin-left: auto; }
    .comment-text { font-size: .9rem; color: #475569; line-height: 1.6; white-space: pre-wrap; word-break: break-word; }
    .comment-delete {
        background: none; border: none; cursor: pointer; color: #cbd5e1;
        font-size: .8rem; padding: 2px 6px; border-radius: 4px;
        transition: color .2s, background .2s;
    }
    .comment-delete:hover { color: #ef4444; background: #fee2e2; }

    .comment-form-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); }
    .comment-form-title { font-size: 1rem; font-weight: 700; color: #1e293b; margin-bottom: 16px; }
    .form-row { display: flex; gap: 12px; margin-bottom: 14px; align-items: flex-start; }
    .form-select, .form-textarea {
        border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px 14px;
        font-size: .9rem; color: #334155; background: #f8fafc;
        transition: border-color .2s, box-shadow .2s; outline: none; width: 100%;
    }
    .form-select { max-width: 160px; }
    .form-select:focus, .form-textarea:focus {
        border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    }
    .form-textarea { resize: vertical; min-height: 90px; font-family: inherit; }
    .btn-submit {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 22px; background: #6366f1; color: #fff;
        border: none; border-radius: 10px; font-size: .9rem; font-weight: 600;
        cursor: pointer; transition: background .2s, transform .1s;
    }
    .btn-submit:hover { background: #4f46e5; transform: translateY(-1px); }
    .no-comment { color: #94a3b8; font-size: .9rem; text-align: center; padding: 24px 0; }
</style>

<div class="breadcrumb">
    <a href="{{ route('tasks.index') }}">Task List</a> <span>/</span> <span>{{ $task->title }}</span>
</div>

<div class="toolbar">
    <a href="{{ route('tasks.edit', $task) }}" class="btn-edit">✏️ Edit Task</a>
</div>

<div class="grid-container">
    {{-- Kolom Kiri --}}
    <div>
        {{-- Description --}}
        <div class="card">
            <div class="card-title">📝 Description / Content</div>
            <div style="font-size: 0.95rem; color: #475569; line-height: 1.6; white-space: pre-wrap;">{{ $task->description ?? 'No content provided.' }}</div>
        </div>

        {{-- Comment Thread --}}
        <div class="card">
            <div class="card-title">
                💬 Communication Log
                <span style="font-size:.8rem;font-weight:500;color:#94a3b8;margin-left:auto;">{{ $task->comments->count() }} komentar</span>
            </div>

            @if($task->comments->isEmpty())
                <div class="no-comment">Belum ada komentar. Mulai diskusi di bawah.</div>
            @else
                <div class="comment-thread">
                    @foreach($task->comments as $comment)
                        @php
                            $userRole = $comment->user->roles->first()?->name ?? 'Other';
                            $roleMap = [
                                'Super Admin' => ['class' => 'avatar-pm',  'badge' => 'role-pm',  'init' => 'SA'],
                                'Developer'   => ['class' => 'avatar-dev', 'badge' => 'role-dev', 'init' => 'DEV'],
                                'Client'      => ['class' => 'avatar-qa',  'badge' => 'role-qa',  'init' => 'CL'],
                                'PM'          => ['class' => 'avatar-pm',  'badge' => 'role-pm',  'init' => 'PM'],
                                'QA'          => ['class' => 'avatar-qa',  'badge' => 'role-qa',  'init' => 'QA'],
                                'Other'       => ['class' => 'avatar-other','badge'=> 'role-other','init' => '?'],
                            ];
                            $rm = $roleMap[$userRole] ?? $roleMap['Other'];
                        @endphp
                        <div class="comment-item" id="comment-{{ $comment->id }}">
                            <div class="comment-avatar {{ $rm['class'] }}">{{ $rm['init'] }}</div>
                            <div class="comment-body">
                                <div class="comment-meta">
                                    <span class="comment-author">{{ $comment->user->name ?? 'Unknown' }}</span>
                                    <span class="role-badge {{ $rm['badge'] }}">{{ $userRole }}</span>
                                    <span class="comment-time">{{ $comment->created_at->format('d M Y, H:i') }}</span>
                                    @if(auth()->id() === $comment->user_id)
                                        <form method="POST" action="{{ route('task-comments.destroy', [$task, $comment]) }}"
                                              onsubmit="return confirm('Hapus komentar ini?')" style="margin:0">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="comment-delete" title="Hapus">🗑</button>
                                        </form>
                                    @endif
                                </div>
                                <div class="comment-text">{{ $comment->body }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Form Tambah Komentar --}}
        <div class="comment-form-card">
            <div class="comment-form-title">➕ Tambah Komentar</div>
            <form method="POST" action="{{ route('task-comments.store', $task) }}">
                @csrf
                <div style="margin-bottom:14px">
                    <textarea id="body" name="body" class="form-textarea"
                              placeholder="Tulis komentar, catatan QA, atau update developer di sini..."
                              required>{{ old('body') }}</textarea>
                    @error('body')
                        <div style="color:#ef4444;font-size:.8rem;margin-top:4px">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn-submit">💬 Kirim Komentar</button>
            </form>
        </div>
    </div>

    {{-- Kolom Kanan: Meta Info --}}
    <div>
        <div class="card">
            <div class="card-title">ℹ️ Meta Info</div>

            <div class="info-group">
                <div class="info-label">Title/Name</div>
                <div class="info-value">{{ $task->title }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Project</div>
                <div class="info-value">{{ $task->project?->name ?? '-' }}</div>
            </div>

            @if($task->epic)
            <div class="info-group">
                <div class="info-label">Epic</div>
                <div class="info-value">{{ $task->epic->name }}</div>
            </div>
            @endif

            @if($task->sprint)
            <div class="info-group">
                <div class="info-label">Sprint</div>
                <div class="info-value">{{ $task->sprint->name }}</div>
            </div>
            @endif

            <div class="info-group">
                <div class="info-label">Status</div>
                <div class="info-value"><span class="badge">{{ $task->status ?? '-' }}</span></div>
            </div>

            <div class="info-group">
                <div class="info-label">Priority</div>
                <div class="info-value">{{ $task->priority ?? '-' }}</div>
            </div>

            @if($task->assignee)
            <div class="info-group">
                <div class="info-label">Assignee</div>
                <div class="info-value">{{ $task->assignee->name }}</div>
            </div>
            @endif

            @if($task->reporter)
            <div class="info-group">
                <div class="info-label">Reporter</div>
                <div class="info-value">{{ $task->reporter->name }}</div>
            </div>
            @endif

            <div class="info-group">
                <div class="info-label">Story Points</div>
                <div class="info-value">{{ $task->story_points ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Created At</div>
                <div class="info-value">{{ $task->created_at?->format('d M Y, H:i') ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Start Date</div>
                <div class="info-value">{{ $task->start_date?->format('d M Y') ?? '-' }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Due Date</div>
                <div class="info-value">{{ $task->due_date?->format('d M Y') ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection