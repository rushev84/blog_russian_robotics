<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        $randomPosts = Post::inRandomOrder()->limit(3)->get();

        $categories = Category::all();

        return view('post.index', compact(
            'posts',
            'randomPosts',
            'categories',
        ));
    }

    public function single($category_slug, $post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();

        $categories = Category::all();

        return view('post.single', compact(
            'post',
            'categories',
        ));
    }

    public function category($category_slug)
    {
        $posts = Post::paginate(8);

        $categories = Category::all();

        return view('post.category', compact(
            'posts',
            'categories',
        ));
    }
}
