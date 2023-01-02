@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/pictures-single.css') }}">
    <style>
        .picture-single-picture-card {
            height: 120px;
            width: 20%;
        }
    </style>
@endsection
@section('title')
    ویدیو
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="picture-single-main-col col-12">
            <div class="picture-single-section">

                <div class="picture-single-title mt-3"><h1>جدیدترین ها</h1></div>
                <div class="picture-single-pictures row g-4 mt-3">

                        @forelse($videos as $video)
                            <div class="picture-single-picture-card col-3 col-lg-2 mb-5">
                                <a href="{{ route('videogallery.show', $video) }}">
                                    <img src="{{ asset('modules/home/img/video.jpg') }}" alt="{{ $video->title }}">
                                </a>
                                <div class="main-news-top-title d-none d-sm-block">
                                    <p>{{ jalaliDate($video->created_at, '', true) }}</p>
                                </div>
                                <div class="main-news-card-title">
                                    <a href="{{ route('videogallery.show', $video) }}">
                                        <p>{{ $video->title }}</p>
                                    </a>
                                </div>
                            </div>
                        @empty
                        <div class="picture-single-picture-card col-3 col-lg-2 mb-5">
                            <a href="#"><img src="{{ asset('modules/home/img/404-football.gif') }}" alt="video"></a>
                            <div class="main-news-top-title d-none d-sm-block"><p>2 ساعت پیش</p></div>
                            <div class="main-news-card-title"><a href="#"><p>عنوان ویدیو</p></a></div>
                        </div>
                        @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
