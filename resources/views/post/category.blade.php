@extends('layouts.base')

@section('content')

    @component('components.inner-section')

        @component('components.title', [
            'title' => 'Category: '. $category->name,
            ])
        @endcomponent

        @component('components.blog-entries')

            @component('components.main-content')

                <div class="row mb-5 mt-5">
                    <div class="col-md-12">
                        @foreach ($posts as $post)
                            <div class="post-entry-horzontal">
                                <a href="{{ route('post.single', [$post->category->name, $post->slug]) }}">
                                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{ asset('storage/images/' . ($post->images->first()->url ?? 'default.jpg')) }});"></div>
                                    <span class="text">
                                        <div class="post-meta">
                                            <span class="category">{{ $post->category->name }}</span>
                                            <span class="mr-2">{{ $post->created_at->format('F d, Y') }} </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                        <h2>{{ $post->title }}</h2>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
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

