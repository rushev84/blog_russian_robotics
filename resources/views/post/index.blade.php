@extends('layouts.base')

@section('content')

    @component('components.random-posts-carousel', [
        'randomPosts' => $randomPosts,
        ])
    @endcomponent

    @component('components.main-section')

        @component('components.title', [
            'title' => 'Posts',
            ])
        @endcomponent

        @component('components.blog-entries')

            @component('components.main-content')

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6">
                            <a href="{{ route('post.single', [$post->category->slug, $post->slug]) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                <img src="{{ asset('storage/images/' . ($post->images->first()->url ?? 'default.jpg')) }}" alt="{{ $post->images->first()->description ?? 'default description' }}">
                                <div class="blog-content-body">
                                    <div class="post-meta">
                                        <span class="category">{{ $post->category->name }}</span>
                                        <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                    <h2>{{ $post->title }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                @component('components.pagination-links', [
                    'posts' => $posts,
                    ])
                @endcomponent

            @endcomponent

            @component('components.sidebar', [
                'categories' => $categories,
                ])
            @endcomponent

        @endcomponent

    @endcomponent

@endsection
