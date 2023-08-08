<section class="site-section py-lg">

    @component('components.container')

        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">

                <h1 class="mb-4">{{ $post->title }}</h1>
                <div class="post-meta">
                    <span class="category">{{ $post->category->name }}</span>
                    <span class="mr-2">{{ $post->created_at->format('F d, Y') }} </span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <div class="post-content-body">
                    <img src="{{ asset('storage/images/' . ($post->images->first()->url ?? 'default.jpg')) }}" alt="{{ $post->images->first()->description ?? 'default description' }}">
                    <br><br>
                    {{ $post->content }}
                </div>


                <div class="pt-5">
                    <p>Category:  <a href="#">{{ $post->category->name }}</a></p>
                </div>

            </div>

            @component('components.sidebar', [
                'categories' => $categories,
                ])
            @endcomponent

        </div>

    @endcomponent

</section>
