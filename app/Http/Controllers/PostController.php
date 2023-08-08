<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        return view('post.index', compact('posts', 'randomPosts'));
    }
}
