<section class="site-section py-sm">

    @component('components.container')

        @component('components.title', [
            'title' => $title,
            ])
        @endcomponent

        <div class="row blog-entries">

            <div class="col-md-12 col-lg-8 main-content">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6">
                            <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                <img src="storage/images/{{ $post->images->first()->url ?? 'default.jpg' }}" alt="{{ $post->images->first()->description ?? 'default description' }}">
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

                <div class="row">
                    <div class="col-md-12 text-center">
                        <nav aria-label="Page navigation" class="text-center">
                            {{ $posts->links('pagination::balita') }}
                        </nav>
                    </div>
                </div>
            </div>

            @component('components.sidebar', [
                'categories' => $categories,
                ])
            @endcomponent

        </div>

    @endcomponent

</section>
