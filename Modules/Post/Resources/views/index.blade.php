@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/archive.css') }}">
@endsection
@section('title')
    مجله و خبرنامه
@endsection
@section('content')

    <div class="first-row row g-3 mt-3">
        <div class="archive-main-col col-12 col-lg-9">
            <div class="archive-breadcrumb">
                <div class="archive-bread-crumb">
                    <a href="{{ route('home') }}"> <span class="breadcrumb-selected">خانه</span></a>
                    <a><span>مجله و خبرنامه</span></a>
                </div>
            </div>

            <div class="archive-section mt-3">
                <div class="archive-top-news">
                    <div class="archive-top-news-thumbnail">
                        <a href="{{ route('post.show', $latestPost) }}">
                            <img src="{{ asset($latestPost->image['indexArray']['medium']) }}" alt="{{ $latestPost->title }}">
                        </a>
                    </div>
                    <div class="archive-top-news-title">
                        <a href="{{ route('post.show', $latestPost) }}">
                            <h2>{{ $latestPost->title }}</h2>
                        </a>
                    </div>
                </div>

                <hr>

                <div class="archive-news">
                    @forelse($posts as $post)
                        <div class="archive-news-card">
                            <div class="archive-news-card-thumbnail">
                                <a href="{{ route('post.show', $post) }}">
                                    <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="archive-news-top-title d-none d-md-block">
                                    <p>{{ $post->category->name }}</p>
                                </div>
                                <div class="archive-news-card-title mt-1 mt-sm-0">
                                    <a href="{{ route('post.show', $post) }}">

                                        <p>{{ $post->title }}</p>
                                    </a>
                                </div>
                                <div class="archive-news-card-except">
                                    <p>{!! $post->summary !!}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                    @endforelse
                </div>
            </div>


            {{ $posts->links('vendor.pagination.morn-news') }}

        </div>


        <div class="archive-second-col col-12 col-lg-3">
            <div class="news-list">
                <div class="social-section">
                    <div class="social-section-header">
                        <i class="fa-duotone fa-hashtag"></i>
                        <span>راه های ارتباطی</span>
                    </div>
                    <div class="social-section-cols row gx-3">
                        <div class="col-6">
                            <a href="https://instagram.com/fc_pars_borazjan">
                                <div class="social-btns social-instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                    <span>اینستاگرام</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="https://t.me/fc_parseh_academy">
                                <div class="social-btns social-telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                    <span>تلگرام</span>
                                </div>
                            </a>
                        </div>
                        {{--                        <div class="col-6">--}}
                        {{--                            <a href="#">--}}
                        {{--                                <div class="social-btns social-twitter">--}}
                        {{--                                    <i class="fa-brands fa-twitter"></i>--}}
                        {{--                                    <span>توییتر</span>--}}
                        {{--                                </div>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-6">--}}
                        {{--                            <a href="#">--}}
                        {{--                                <div class="social-btns social-rss">--}}
                        {{--                                    <i class="fa-solid fa-rss"></i>--}}
                        {{--                                    <span>آر اس اس</span>--}}
                        {{--                                </div>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="news-box col-12 mt-3">
                    <div class="news-box-card-mini">
                        <div class="news-box-header">
                            <i class="fa-duotone fa-newspaper"></i>
                            <span>آخرین اخبار</span>
                        </div>
                        <div class="new-box-news">
                            <ul>

                                <!-- latest posts -->
                                @forelse($latestPosts as $latest)
                                    <li>
                                        <a href="{{ route('post.show', $latest) }}">
                                            {{ $latest->title }}
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        @admin
                                        <span>درحال حاظر خبری وجود ندارد.</span>
                                        <a href="{{ route('admin.post') }}" class="btn-link">وارد کردن خبر </a>
                                        @endadmin
                                        @guest
                                            <span class="text-muted">درحال حاظر خبری وجود ندارد.</span>
                                        @endguest
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="news-box col-12 mt-3">
                    <div class="news-box-card-mini">
                        <div class="news-box-header">
                            <i class="fa-duotone fa-newspaper"></i>
                            <span>مطالب داغ</span>
                        </div>
                        <div class="new-box-news">
                            <ul>

                                @forelse($hotPosts as $hot)
                                    <li>
                                        <a href="{{ route('post.show', $hot) }}">
                                            <span>{{ $hot->title }}</span>
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        @admin
                                        <span>درحال حاظر خبری وجود ندارد.</span>
                                        <a href="{{ route('admin.post') }}" class="btn-link">وارد کردن خبر </a>
                                        @endadmin
                                        @guest
                                            <span class="text-muted">درحال حاظر خبری وجود ندارد.</span>
                                        @endguest
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection