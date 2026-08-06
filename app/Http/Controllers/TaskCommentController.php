<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskComment;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskCommentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read tasks', only: ['store']),
        ];
    }

    public function store(Request $request, Task $task)
    {
        $data = $request->validate([
            'body'       => 'required|string|max:5000',
        ]);

        $user = auth()->user();
        $roleLabel = $user->getRoleNames()->first() ?? 'Other';

        $task->comments()->create([
            'user_id'    => $user->id,
            'role_label' => $roleLabel,
            'body'       => $data['body'],
        ]);

        return redirect()->route('tasks.show', $task)->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy(Task $task, TaskComment $comment)
    {
        // Hanya pemilik komentar yang boleh menghapus
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('tasks.show', $task)->with('success', 'Komentar dihapus.');
    }
}
