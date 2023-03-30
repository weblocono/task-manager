<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostManagerController extends Controller
{
    public function store(PostStoreRequest $request) 
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        Post::query()->create($data);
    
        return back();
    }

    public function delete(Post $post) 
    {
        $post->delete();

        return back();
    }
}
