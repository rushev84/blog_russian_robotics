<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

//        dd($posts);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }
}
