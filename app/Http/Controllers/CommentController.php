<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(CommentRequest $request) {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;


        Comment::create($validated);

        return redirect()->route('task.show', $validated['task_id']);
    }

    public function delete(Comment $comment) {
        $comment->delete();

        return back();
    }
}
