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
                    @if(isset($worldNews))
                        <a href="{{ route('post') }}"> <span class="breadcrumb-selected">مجله و خبرنامه</span></a>
                        <a><span>{{ $worldNews }}</span></a>
                    @elseif(isset($clubNews))
                        <a href="{{ route('post') }}"> <span class="breadcrumb-selected">مجله و خبرنامه</span></a>
                        <a><span>{{ $clubNews }}</span></a>
                    @else
                        <a><span>مجله و خبرنامه</span></a>
                    @endif
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
                                    <p>{{ $post->category->name }} - {{ jalaliDate($post->published_at, '', true) }}</p>
                                </div>
                                <div class="archive-news-card-title mt-1 mt-sm-0">
                                    <a href="{{ route('post.show', $post) }}">

                                        <p>{{ $post->title }}</p>
                                    </a>
                                </div>
                                <div class="archive-news-card-except">
                                    <p><?= html_entity_decode($post->summary) ?></p>
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

        @include('post::layouts.sidebar', ['latestPosts' => $latestPosts, 'hotPosts' => $hotPosts, 'latestPost' => $latestPost])

    </div>
@endsection