@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/pictures-single.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/image-viewer.css') }}">
@endsection
@section('title')
    گالری تصاویر
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="picture-single-main-col col-12">
            <div class="picture-single-section">
                <div class="picture-single-info">
                    <div class="picture-single-photographer">
                        <span>عکاس :</span>
                        <span>روابط عمومی باشگاه پارس برازجان</span>
                    </div>
                </div>
                <div class="picture-single-title mt-3">
                    <h1>عکس ها</h1>
                </div>
                <div class="picture-single-pictures row g-4 mt-3">

                    @forelse($slides as $slide)
                        <div class="picture-single-picture-card col-6 col-lg-4 mb-5">
                            <a href="{{ route('slide.show', $slide) }}">
                                <img src="{{ asset($slide->image['indexArray']['large']) }}"  class="img-thumbnail" alt="{{ $slide->title }}" width="200">

                                <div class="main-news-top-title d-none d-sm-block">
                                    <p>{{ jalaliDate($slide->created_at, '', true) }}</p>
                                </div>
                                <div class="main-news-card-title">
                                    <a href="{{ route('slide.show', $slide) }}">
                                        <p>{{ $slide->title }}</p>
                                    </a>
                                </div>
                            </a>

                        </div>

                    @empty
                        <div class="picture-single-picture-card col-6 col-lg-4">
                            <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="img">

                            <div class="main-news-top-title d-none d-sm-block">
                                <p>2 روز پیش</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="#">
                                    <p>عنوان عگس</p>
                                </a>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection

@section('head-tag')
    <script src="{{ asset('modules/home/assets/js/imageViewer.js') }}"></script>
@endsection
