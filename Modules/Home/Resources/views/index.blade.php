@extends('home::layouts.master')
@section('title')
    {{ $setting->title }}
@endsection
@section('content')

    <!-- hero banner -->
    <section>
        <div class="hero-header hero-bg rounded-top" style="background:url({{ asset('modules/home/img/locations/5.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 no-margin">
                        <h1>{{ $setting->title }}</h1>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="box-start rounded">
                            {{--                            <div class="row align-items-center">--}}
                            {{--                                <div class="col-lg-4">--}}
                            {{--                                    <div class="info-match">--}}
                            {{--                                        <div class="row">--}}
                            {{--                                            <div class="col">--}}
                            {{--                                                <h4>--}}
                            {{--                                                    <span>تاریخ شروع</span>30 jan 2018 </h4>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="col">--}}
                            {{--                                                <h4>--}}
                            {{--                                                    <span>luzhniki ورزشگاه</span>مسکو </h4>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-lg-4">--}}
                            {{--                                    <div class="horizontal-next-teams">--}}
                            {{--                                        <div class="row align-items-center">--}}
                            {{--                                            <div class="col">--}}
                            {{--                                                <a href="single-team.html">--}}
                            {{--                                                    <img src="{{ asset('modules/home/img/clubs-logos/colombia.png') }}" alt="">--}}
                            {{--                                                    <span>کلمبیا</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="col">--}}
                            {{--                                                <strong>در مقابل</strong>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="col">--}}
                            {{--                                                <a href="single-team.html">--}}
                            {{--                                                    <img src="{{ asset('modules/home/img/clubs-logos/rusia.png') }}" alt="">--}}
                            {{--                                                    <span>rusia</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-lg-4">--}}
                            {{--                                    <div class="horizontal-next-counter">--}}
                            {{--                                        <div id="event-one" class="counter"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            @if($setting->logo)
                                <img src="{{ asset($setting->logo) }}" alt="Logo" class="log_img rounded-circle border" width="150">
                            @else
                                <img src="{{ asset('modules/home/img/clubs-logos/club_logo.jpg') }}" alt="Logo" class="log_img rounded-circle border" width="150">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- breaking news -->
    <section>
        <div class="col-12">
            <div class="row">
                <div class="bg-navy w-25 text-center">
                    <h4>خبر فوری</h4>
                </div>
                <div class="bg-light w-75">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <div class="row justify-content-around">
                            <div class="col-10">
                                <div class="carousel-inner my-2">

                                    @forelse($latestPosts as $key => $latest)
                                        <div class="carousel-item {{ $key != 0 ?: 'active'}}">
                                            <a href="{{ route('post.show', $latest) }}" class="text-dark">
                                                <span>{{ $latest->title }}</span>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="carousel-item active">
                                            <span href="#" class="text-muted">
                                                <span><small>درحال حاضر خبری برای نمایش وجود ندارد! @admin <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin</small></span>
                                            </span>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="carousel-control-prev text-dark" href="#prev" role="button" data-slide="prev">
                                    <span class="aria-hidden=" true><i class="fe fe-chevron-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-dark" href="#next" role="button" data-slide="next">
                                    <span class="aria-hidden=" true><i class="fe fe-chevron-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end breaking news -->

    <!-- main news -->
    <section class="container main-news h-100">
        <div class="row shadow my-4">
            <div class="col-md-8 col-sm-12">

                <div class="panel-box">
                    <div class="hero-header">
                        <div id="hero-slider-2" class="hero-slider rounded">

                            @forelse($recommendedPosts as $recommendedPost)
                                <a href="{{ route('post.show', $recommendedPost) }}">
                                    <div class="item-slider" style="background:url({{  asset(str_replace("\\", '/', $recommendedPost->image['indexArray']['large'])) }});">
                                        <div class="container">
                                            <div class="row align-items-center justify-content-center text-center">
                                                <div class="col-lg-7">
                                                    <div class="info-slider">
                                                        <h1>{{ $recommendedPost->title }}</h1>
                                                        <p class="small">{{ $recommendedPost->summary }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            @empty
                                <a href="#">
                                    <div class="item-slider relative" style="background:url({{ asset('modules/home/img/404-football.gif') }})"></div>
                                </a>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="">
                    <div class="my-3 titles"><h4 class="border-0"><i class="fe fe-list"></i> مطالب پیشنهادی</h4>
                    </div>
                    {{--                    <div class="filters px-3 my-3">--}}
                    {{--                        <ul class="list-filter d-flex flex-wrap justify-content-start">--}}
                    {{--                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=0'))) active @endif">--}}
                    {{--                                <small><a href="{{ route('home', 'label=0') }}">پیشنهاد سردبیر</a></small></li>--}}
                    {{--                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=1'))) active @endif">--}}
                    {{--                                <small><a href="{{ route('home', 'label=1') }}">آخرین اخبار</a></small></li>--}}
                    {{--                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=2'))) active @endif">--}}
                    {{--                                <small><a href="{{ route('home', 'label=2') }}">نقل و انتقالات</a></small></li>--}}
                    {{--                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=3'))) active @endif">--}}
                    {{--                                <small><a href="{{ route('home', 'label=3') }}">ویدیو</a></small></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    <div class="info-panel py-1">
                        <div class="panel panel-primary tabs-style-3 border-0">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs small">
                                        <li class="">
                                            <a href="#tab11" data-bs-toggle="tab" class="active px-2 py-1 "> آخرین اخبار</a>
                                        </li>
                                        <li class="">
                                            <a href="#tab12" data-bs-toggle="tab" class="px-2 py-1"> پیشنهاد سردبیر</a>
                                        </li>
                                        <li class="">
                                            <a href="#tab13" data-bs-toggle="tab" class="px-2 py-1"> نقل و انتقالات</a>
                                        </li>
                                        <li class="">
                                            <a href="#tab14" data-bs-toggle="tab" class="px-2 py-1"> ویدیو</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab11">
                                        <ul class="list-news">
                                            @forelse($latestPosts as $latestNews)
                                                <li>
                                                    <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $latestNews) }}"> {{ $latestNews->title }} </a></small>
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    <small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                                    </small>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="tab12">
                                        <ul class="list-news">
                                            @forelse($recommendedPosts as $recommendedNews)
                                                <li>
                                                    <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $recommendedNews) }}"> {{ $recommendedNews->title }} </a></small>
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    <small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                                    </small></li>
                                            @endforelse
                                        </ul>

                                    </div>
                                    <div class="tab-pane" id="tab13">
                                        <ul class="list-news">
                                            @forelse($transferPosts as $transfer)
                                                <li>

                                                    <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $transfer) }}"> {{ $transfer->title }} </a></small>
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    <small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                                    </small></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab14">
                                        <ul class="list-news">

                                            @forelse($videoPosts as $video)
                                                <li>
                                                    <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $video) }}"> {{ $video->title }} </a></small>
                                                </li>
                                            @empty
                                                <li class="text-muted">
                                                    <small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                                    </small></li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main news -->

    <!-- ads banner -->
{{--    <div class="ads-banner">--}}
{{--        <div class="row my-2 shadow panel-box">--}}
{{--            <div>--}}
{{--                <div class="titles no-margin bg-light">--}}
{{--                    <h4><i class="fe fe-link"></i>تبلیغات</h4>--}}
{{--                </div>--}}
{{--                <div class="col-12 pt-2 text-cener">--}}
{{--                    <a rel="nofollow noopener" href="https://ck.yektanet.com/b/click?VERSION=2&amp;impression=6dgrYKYxe%2FA%2BbLRzf0bfLemo7ux%2BHCe0lH2wvTYocV%2BsGDe42UMfRuVNbOIlgHVMXoWeZuw%2FOP1aZGDEKetA1mU5RYsXmxGgaxZdEwaYMRGTvxLTS4HdNtIcsnv44ph3IojM2N95Ov0rIjYf5Kk283psac44xb5DuCnyi1AC6WWWcQLHIhWkIpMEE89mbx7QtKwXbQfIwC8ErixEN4cddFqS34a%2BNVmXFEnxHKRa1pxMe%2BzFR6J8QqwwuztxWnDC1bzKNnX5BiPKWLyClcV3P681d7d5FcWc2Q%2FQoAUw9WAc4SfF1VR9JgwSe11cwm7Xicji76NfWCyhDkus3McguJUARqi567sRZzafyrUpQqcqoAukzKq9yFH%2FuBu1SjdZGQBc3UYqju6v0e8YcW%2B2%2FPoQyUehAophkbSvuHeJAixN4AqW5kulwW77blaYzCxfWmXNN7apXx2ic5TWWFPTq3F1Mazjhq5PhZsvoStxIyI%3D%3APEdK5vgry0HZF%2F5PefALnnHfb1p3pbEgS4RMXr1P4a%2FCeFSs3CyLNVrKQyWt%2F2pOomPQtwTmGgaPbEVoZQ1lmf9XZ6wYb7J%2FOG50UIaxIiwkYs0TQEE40UnlDVj%2Bld%2FLZBniPv63W8ynabzt2KRC0yoGJEJW0knjgYf9Q8H2wvPt44ikyI%2Fwe0S64t9GPmd2%2FJhKzoqkepdKz5roIDNm2ocsXQYvTiBvboL%2F09GExc1L5t8SIiRa8jHy3XASOeBSHCSgmKa9b5ImAXW7HaOUqE3UszKL4Qn6%2Bvb%2BhH7mH%2FtNgW1Qgj5HvtOXyYn3ElzmM%2Bb6RcIXxzoV0vmpB4KHPQ%3D%3D&amp;redirect=https%3A%2F%2Ffaradars.org%2Flanding%2Fdsh55&amp;ab&amp;vts=1671025101.629" target="_blank" style="position: relative;display: inline-block;">--}}
{{--                        <div style="background-color:transparent;">--}}
{{--                            <img class="bnr-img yn-bnr__img" width="1200" height="10" onload="ynBnrImgOnLoad(13722);" data-src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars72890_7b05aa06-15a9-4dd6-a53a-a0a0adfe66e9__1ex2gqwOr6.gif" alt="" src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars72890_7b05aa06-15a9-4dd6-a53a-a0a0adfe66e9__1ex2gqwOr6.gif">--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <div class="d-flex">--}}
{{--                    <div class="col-6 pl-0">--}}
{{--                        <div class="py-2">--}}
{{--                            <div class="adds">--}}
{{--                                <a href="https://yungcenter.com/product-category/acc-play-station/?utm_source=gamefa&amp;utm_campaign=banner" target="_blank" rel="nofollow" class="d-block">--}}
{{--                                    <img width="600" height="60" src="https://gamefa.com/wp-content/uploads/2022/11/Expor.gif" class="img-fluid ads" alt="" decoding="async" loading="lazy">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <div class=" py-2">--}}
{{--                            <div class="adds">--}}
{{--                                <a href="https://www.rtl-theme.com/author/mohamad_javad_Taherian/?aff=mohamad_javad_Taherian" target="_blank">--}}
{{--                                    <img src="{{ asset('modules/home/img/adds/banner.gif') }}" alt="" class="img-responsive ads">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- content -->
    <section class="content-info">
        <!-- content container -->
        <div class="container my-2">
            <div class="row">
                <!-- right aside -->
                <aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">
                    @include('home::layouts.right-sidebar')
                </aside>
                <!-- end right aside -->
                <!-- center -->
                <div class="col-lg-5 col-xl-6 col-sm-12 h-100">
                    <!-- last news -->
                    <div class="panel-box rounded">
                        <div class="titles bg-light">
                            <h4><i class="fe fe-bookmark"></i>آخرین اخبار</h4>
                        </div>

                        @forelse($posts as $post)
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="font-weight-bold">
                                            <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                                        </h4>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="img-hover rounded">
                                            <img src="{{ asset($post->image['indexArray']['large']) }}" alt="{{ $post->title }}" class="img-responsive">
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pt-sm-2 col-8">
                                        <small>{{ $post->summary }}</small>
                                        <span class="data-info d-flex justify-content-between mt-4">
                                            <small class="font-weight-bold">
                                                <i class="fe fe-edit text-navy"></i>{{ $post->author->fullname ?? $post->author->name }}
                                            </small> <small class="font-weight-bold">
                                                <i class="fe fe-clock text-navy"></i>{{ jalaliDate($post->published_at, 'H:i - Y/m/d') }}
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fe fe-message-circle text-navy"></i> {{ $post->comments()->count() }}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="font-weight-bold">
                                            <a href="#">عنوان خبر</a>
                                        </h4>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="img-hover rounded">
                                            <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="عنوان" class="img-responsive">
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pt-sm-2 col-8">
                                        <small>
                                            درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                            <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                        </small>
                                        <span class="data-info d-flex justify-content-between mt-4">
                                            <small class="font-weight-bold">
                                                <i class="fe fe-edit text-navy"></i>نویسنده
                                            </small> <small class="font-weight-bold">
                                                <i class="fe fe-clock text-navy"></i>تاریخ انتشار
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fe fe-message-circle text-navy"></i> نظرات
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>

                    {{ $posts->links('vendor.pagination.bootstrap-5', ['elements' => $posts]) }}

                    <!-- slider -->
                    <div class="panel-box">
                        <div class="row">
                            <div id="hero-slider" class="hero-slider">

                                @forelse($slides as $slide)
                                    <div class="item-slider" style="background:url({{ asset(str_replace("\\", '/', $slide->image['indexArray']['large'])) }}">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-lg-7">
                                                    <div class="info-slider p-2">
                                                        <h1>{{ $slide->title }}</h1>
                                                        <p>{!! Str::limit($slide->body, 40) !!}</p>
                                                        <a href="#" class="btn-iw outline">بیشتر بخوانید<i class="fe fe-chevron-left"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="item-slider" style="background:url({{ asset('modules/home/img/404-football.gif') }}">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-lg-7">
                                                    <div class="info-slider p-2">
                                                        <h1>عنوان اسلاید</h1>
                                                        <p>درحال حاضر اسلایدی برای نمایش وجود ندارد! @admin
                                                            <a href="{{ route('admin.slide') }}" class="btn-link links links-footer text-primary">وارد کردن اسلاید</a> @endadmin
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                            </div>

                        </div>
                    </div>

                    {{--                    <!-- more news -->--}}
                    {{--                    <div class="more-news">--}}
                    {{--                        <div class="text-center mb-3">--}}
                    {{--                            <button class="btn btn-primary px-5">بیشتر</button>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="panel-box rounded pt-2">--}}

                    {{--                            <div class="post-item">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <h4 class="font-weight-bold"><a href="single-news.html">شکست در مرحله--}}
                    {{--                                                گروهی</a>--}}
                    {{--                                        </h4>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-4 col-4">--}}
                    {{--                                        <div class="img-hover rounded">--}}
                    {{--                                            <img src="{{ asset('modules/home/img/blog/1.jpg') }}" alt="" class="img-responsive">--}}
                    {{--                                            <div class="overlay"><a href="single-news.html"></a></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-8 pt-sm-2 col-8">--}}
                    {{--                                        <small>در حالی که آشنا با همکار, کشور اروپایی فرانسه, hareide اذعان می کند--}}
                    {{--                                            که در--}}
                    {{--                                            آمریکای جنوبی به سمت پرو.--}}
                    {{--                                        </small>--}}
                    {{--                                        <span class="data-info d-flex justify-content-between mt-4">--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-pencil text-navy"></i>--}}
                    {{--                                                                        اردوان شام روشن--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-clock-o text-navy"></i>--}}
                    {{--                                                                        ۱۹:۴۸ - ۱۴۰۱/۰۹/۰۱--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-commenting-o text-navy"></i> 2--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                </span>--}}

                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="post-item">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <h4 class="font-weight-bold"><a href="single-news.html">روسیه 2018 پتانسیل--}}
                    {{--                                                های--}}
                    {{--                                                کلاسیک بازی-یو پی است</a></h4>--}}

                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-4 col-4">--}}
                    {{--                                        <div class="img-hover rounded">--}}
                    {{--                                            <img src="{{ asset('modules/home/img/blog/2.jpg') }}" alt="" class="img-responsive">--}}
                    {{--                                            <div class="overlay"><a href="single-news.html"></a></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-8 pt-sm-2 col-8">--}}
                    {{--                                        <small>هدف ما این است که بسیار روشن آن تغییر نکرد و پس از قرعه کشی. ما باید--}}
                    {{--                                            از--}}
                    {{--                                            واجد شرایط برای مرحله حذفی.--}}
                    {{--                                        </small>--}}
                    {{--                                        <span class="data-info d-flex justify-content-between mt-4">--}}
                    {{--                                            <small class="font-weight-bold"><i class="fa fa-pencil text-navy"></i>--}}
                    {{--                                                                        اردوان شام روشن--}}
                    {{--                                            </small>--}}
                    {{--                                            <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-clock-o text-navy"></i>--}}
                    {{--                                                                        ۱۹:۴۸ - ۱۴۰۱/۰۹/۰۱--}}
                    {{--                                            </small>--}}
                    {{--                                            <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-commenting-o text-navy"></i> 2--}}
                    {{--                                            </small>--}}
                    {{--                                        </span>--}}

                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="post-item">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <h4 class="font-weight-bold"><a href="single-news.html">جام جهانی رقابت--}}
                    {{--                                                reprised</a></h4>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-4 col-4">--}}
                    {{--                                        <div class="img-hover rounded">--}}
                    {{--                                            <img src="{{ asset('modules/home/img/blog/3.jpg') }}" alt="" class="img-responsive">--}}
                    {{--                                            <div class="overlay"><a href="single-news.html"></a></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-8 pt-sm-2 col-8">--}}

                    {{--                                        <small>فضای نمایشگاه در manezhnaya مربع شامل 11 ارقام است که نماد اصلی سایت--}}
                    {{--                                            های--}}
                    {{--                                            مورد علاقه.--}}
                    {{--                                        </small>--}}
                    {{--                                        <span class="data-info d-flex justify-content-between mt-4">--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-pencil text-navy"></i>--}}
                    {{--                                                                        محسن اعتباری--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-clock-o text-navy"></i>--}}
                    {{--                                                                        ۱۹:۴۸ - ۱۴۰۱/۰۹/۰۱--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-commenting-o text-navy"></i> 2--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                </span>--}}

                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="post-item">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <h4 class="font-weight-bold"><a href="single-news.html">همه مجموعه ای برای--}}
                    {{--                                                سفر--}}
                    {{--                                                خود را به روسیه ؟</a>--}}
                    {{--                                        </h4>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-4 col-4">--}}
                    {{--                                        <div class="img-hover rounded">--}}
                    {{--                                            <img src="{{ asset('modules/home/img/blog/4.jpg') }}" alt="" class="img-responsive">--}}
                    {{--                                            <div class="overlay"><a href="single-news.html"></a></div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-8 pt-sm-2 col-8">--}}

                    {{--                                        <small>کلمبیا بازی ژاپن در 19 ژوئن در موردوویا عرصه که در آن ستون بندی و--}}
                    {{--                                            ریخته--}}
                    {{--                                            گری عملیات.</small>--}}
                    {{--                                        <span class="data-info d-flex justify-content-between mt-4">--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-pencil text-navy"></i>--}}
                    {{--                                                                        اردوان شام روشن--}}
                    {{--                                                                    </small> <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-clock-o text-navy"></i>--}}
                    {{--                                                                        ۱۹:۴۸ - ۱۴۰۱/۰۹/۰۱--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                    <small class="font-weight-bold">--}}
                    {{--                                                                        <i class="fa fa-commenting-o text-navy"></i> 2--}}
                    {{--                                                                    </small>--}}
                    {{--                                                                </span>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}

                </div>
                <!-- end center -->
                <!-- left aside -->
                <aside class="col-sm-12 col-lg-3 col-xl-3 dark-home py-2 rounded h-100">
                    @include('home::layouts.left-sidebar')
                </aside>
                <!-- end left side -->
            </div>
        </div>
        <!-- end content -->

        <!-- gallery -->
        <div class="col-12">
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4><i class="fe fe-video"></i>گالری ویدیو</h4>
                </div>
                <div class="pt-2">
                    <div class="row">
                        @forelse($videos as $video)
                            <div class="video-item mx-auto border mb-3 rounded">
                                <video controls class="rounded-top" width="350" src="{{ asset($video->video) }}">
                                    <div class="info-panel">
                                        <h4>{{ $video->title }}</h4>
                                        <p>{{ $video->description }}</p>
                                    </div>
                                </video>
                                <div class="video-caption p-2">{{ $video->title }}</div>
                            </div>
                        @empty
                            <div class="video-item mx-auto border my-3 rounded">
                                <video controls class="rounded-top">
                                    <div class="info-panel">
                                        <h4>عنوان ویدیو</h4>
                                        <p>توضیحات ویدیو</p>
                                    </div>
                                </video>
                                <div class="video-caption text-mute text-center"><small>
                                        درحال حاضر ویدیویی برای نمایش وجود ندارد! @admin
                                        <a href="{{ route('admin.videogallery') }}" class="btn-link links links-footer text-primary">وارد کردن ویدیو</a> @endadmin
                                    </small></div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

        <!-- end gallery -->

        <!-- news letter -->
        {{--        <div class="section-newsletter no-margin rounded">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="text-center">--}}
        {{--                            <h2>ایمیل خود را وارد کنید و<span class="text-resalt"> مشترک </span> خبرنامه ما شوید. </h2>--}}
        {{--                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
        {{--                                گرافیک است. چاپ</p>--}}
        {{--                        </div>--}}
        {{--                        <form id="newsletterForm" action="php/mailchip/newsletter-subscribe.php">--}}
        {{--                            <div class="row">--}}
        {{--                                <div class="col-md-6">--}}
        {{--                                    <div class="input-group">--}}
        {{--                                            <span class="input-group-addon">--}}
        {{--                                                <i class="fa fa-envelope"></i>--}}
        {{--                                            </span>--}}
        {{--                                        <input class="form-control" placeholder="اسم شما" name="name" type="text" required="required">--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="col-md-6">--}}
        {{--                                    <div class="input-group">--}}
        {{--                                            <span class="input-group-addon">--}}
        {{--                                                <i class="fa fa-envelope"></i>--}}
        {{--                                            </span>--}}
        {{--                                        <input class="form-control" placeholder="ایمیل شما" name="email" type="email" required="required">--}}
        {{--                                        <span class="input-group-btn">--}}
        {{--                                                <button class="btn btn-primary" type="submit" name="subscribe">ثبت--}}
        {{--                                                    نام</button>--}}
        {{--                                            </span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </form>--}}
        {{--                        <div id="result-newsletter"></div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

    </section>

@endsection
@section('script')
    <!--- Tabs JS-->
    <script src="{{ asset('modules/admin/assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ asset('modules/admin/assets/js/tabs.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".box").on("click", function () {
                $(this).siblings().toggleClass("hidden");
                $(this).toggleClass("full");
                $(".captionBox").toggleClass("hiddenText");
                $(this).children().animate({
                    opacity: "1"
                }, 500, function () {
                });
            });

            if ($(window).width() < 768) {
                $(".box").on("click", function () {
                    $("#gridGallery").toggleClass("mobileFunction");
                });
            }

            if ($(window).width() >= 768) {

                $(".box").hover(function () {
                    $(this).siblings().toggleClass("opacity");
                });

            }

            $(".horizontal").click(function () {
                $(this).toggleClass("full");
                $(".captionBox").toggleClass("hiddenText");
                $(this).children().animate({
                    opacity: "1"
                }, 500, function () {
                });
            });

            $(".horizontal").hover(function () {
                $(this).siblings().toggleClass("opacity");
            });

        });</script>
@endsection
