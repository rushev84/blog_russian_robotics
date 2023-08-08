@extends('layouts.base')

@section('content')
<!-- content -->
    @component('components.random-posts-carousel', [
        'randomPosts' => $randomPosts,
        ])
    @endcomponent

    <section class="site-section py-sm">

        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Posts</h2>
                </div>
            </div>

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

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="images/person_1.jpg" alt="Image Placeholder" class="img-fluid">
                            <div class="bio-body">
                                <h2>Meagan Smith</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                                <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
                                <p class="social">
                                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="images/img_2.jpg" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span> &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="images/img_4.jpg" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span> &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="images/img_12.jpg" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span> &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Courses <span>(12)</span></a></li>
                            <li><a href="#">News <span>(22)</span></a></li>
                            <li><a href="#">Design <span>(37)</span></a></li>
                            <li><a href="#">HTML <span>(42)</span></a></li>
                            <li><a href="#">Web Development <span>(14)</span></a></li>
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                </div>

            </div>

        </div>

    </section>
<!-- //content -->
@endsection
