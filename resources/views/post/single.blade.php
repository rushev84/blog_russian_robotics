@extends('layouts.base')

@section('content')

    @component('components.inner-section')

        @component('components.blog-entries')

            @component('components.main-content')

                <h1 class="mb-4">{{ $post->title }}</h1>
                <div class="post-meta">
                    <span class="category">{{ $post->category->name }}</span>
                    <span class="mr-2">{{ $post->created_at->format('F d, Y') }} </span>
{{--                    &bullet;--}}
{{--                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>--}}
                </div>
                <div class="post-content-body">
                    <div class="row mb-5">
                        @foreach ($post->images as $image)
                            <div class="col-md-12 mb-4 element-animate">
                                <img src="{{ $image->url }}" alt="{{ $image->description }}" class="img-fluid">
                            </div>

                        @endforeach
                    </div>
                    {{ $post->description }}
                </div>

                <div class="pt-5">
                    <p>Category:  <a href="#">{{ $post->category->name }}</a></p>
                </div>

            @endcomponent

            @component('components.sidebar', [
                'categories' => $categories,
                ])
            @endcomponent

        @endcomponent

    @endcomponent

@endsection

