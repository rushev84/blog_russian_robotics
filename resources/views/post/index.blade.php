@extends('layouts.base')

@section('content')

    @component('components.random-posts-carousel', [
        'randomPosts' => $randomPosts,
        ])
    @endcomponent

    @component('components.main-section', [
        'posts' => $posts,
        'title' => 'Posts',
        'categories' => $categories,
        ])
    @endcomponent

@endsection
