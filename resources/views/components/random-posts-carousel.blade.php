@component('components.banner-section')
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme home-slider">
                @foreach ($randomPosts as $randomPost)
                    <div>
                        <a href="{{ route('post.single', [$randomPost->category->slug, $randomPost->slug]) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('storage/images/{{ $randomPost->images->first()->url ?? 'default.jpg' }}'); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category">{{ $randomPost->category->name }}</span>
                                    <span class="mr-2">{{ $randomPost->created_at->format('F d, Y') }}</span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                </div>
                                <h3>{{ $randomPost->title }}</h3>
{{--                                <p>{{ $randomPost->description }}</p>--}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endcomponent
