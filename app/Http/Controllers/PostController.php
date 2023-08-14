<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function index()
    {
        return view('post.index', [
            'posts' => Post::paginate(8),
            'randomPosts' => Post::inRandomOrder()->limit(3)->get(),
            'categories' => $this->categories,
        ]);
    }

    public function single($category_slug, $post_slug)
    {
        return view('post.single', [
            'post' => Post::where('slug', $post_slug)->first(),
            'categories' => $this->categories,
        ]);
    }

    public function category($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        return view('post.category', [
            'category' => $category,
            'posts' => $category->posts()->paginate(8),
            'categories' => $this->categories,
        ]);
    }
}
