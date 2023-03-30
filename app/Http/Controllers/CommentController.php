<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, Post $post) 
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $data['post_id'] = $post->id;

        Comment::query()->create($data);

        return back();
    }

    public function delete(Comment $comment) 
    {
        $comment->delete();

        return back();
    }
}
