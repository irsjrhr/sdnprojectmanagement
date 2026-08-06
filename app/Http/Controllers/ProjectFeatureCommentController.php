<?php
namespace App\Http\Controllers;

use App\Models\ProjectFeature;
use App\Models\ProjectFeatureComment;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectFeatureCommentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read features', only: ['store']),
        ];
    }

    public function store(Request $request, ProjectFeature $projectFeature)
    {
        $data = $request->validate([
            'body' => 'required|string|max:5000',
        ]);

        $projectFeature->comments()->create([
            'user_id' => auth()->id(),
            'body'    => $data['body'],
        ]);

        return redirect()->route('project-features.show', $projectFeature)->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy(ProjectFeature $projectFeature, ProjectFeatureComment $comment)
    {
        // Hanya pemilik komentar yang boleh menghapus
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('project-features.show', $projectFeature)->with('success', 'Komentar dihapus.');
    }
}
