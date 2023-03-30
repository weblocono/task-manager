<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function login() 
    {
        return view('login');
    }

    public function registarion() 
    {
        return view('registarion');
    }

    public function posts() 
    {
        $posts = Auth::user()->posts;
        
        return view('home', [
            'posts' => $posts->withCount('comments'),
        ]);
        // хз работает или нет
    }

    public function post(Post $post) 
    {
        $comments = Comment::query()->find($post->id);
        
        return view('post', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }



}
