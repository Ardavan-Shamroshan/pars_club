@extends('home::layouts.master')
@section('content')

    <!-- hero banner -->
    <section>
        <div class="hero-header hero-bg rounded-top" style="background:url({{ asset('modules/home/img/locations/5.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 no-margin">
                        <h1>باشگاه ورزشی پارس برازجان</h1>
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

                            <img src="{{ asset('modules/home/img/clubs-logos/club_logo.jpg') }}" alt="Logo" class="log_img rounded-circle border" width="150">

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
                                        <div class="carousel-item {{ $key != 0 ?: 'active'}}"">
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
                                    <span class="aria-hidden=" true><i class="fa fa-angle-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-dark" href="#next" role="button" data-slide="next">
                                    <span class="aria-hidden=" true><i class="fa fa-angle-right"></i></span>
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
                    <div class="my-3 titles"><h4 class="border-0"><i class="fa fa-list-alt"></i> مطالب پیشنهادی</h4>
                    </div>
                    <div class="filters px-3 my-3">
                        <ul class="list-filter d-flex flex-wrap justify-content-start">
                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=0'))) active @endif">
                                <small><a href="{{ route('home', 'label=0') }}">پیشنهاد سردبیر</a></small></li>
                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=1'))) active @endif">
                                <small><a href="{{ route('home', 'label=1') }}">آخرین اخبار</a></small></li>
                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=2'))) active @endif">
                                <small><a href="{{ route('home', 'label=2') }}">نقل و انتقالات</a></small></li>
                            <li class="bg-navy rounded-pill px-2 mx-1 my-sm-1  @if((str_contains(request()->getUri(), '?label=3'))) active @endif">
                                <small><a href="{{ route('home', 'label=3') }}">ویدیو</a></small></li>
                        </ul>
                    </div>
                    <div class="info-panel py-1">
                        <ul class="list-news">
                            @forelse($recommendedPosts as $recommended)
                                <li>
                                    <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $recommended) }}"> {{ $recommended->title }} </a></small>
                                </li>
                            @empty
                                <li class="text-muted"><small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                    </small></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main news -->



    <!-- ads banner -->
    <div class="ads-banner">
        <div class="row my-2 shadow panel-box">
            <div>
                <div class="titles no-margin bg-light">
                    <h4><i class="fa fa-link"></i>تبلیغات</h4>
                </div>
                <div class="col-12 pt-2 text-cener">
                    <a rel="nofollow noopener" href="https://ck.yektanet.com/b/click?VERSION=2&amp;impression=6dgrYKYxe%2FA%2BbLRzf0bfLemo7ux%2BHCe0lH2wvTYocV%2BsGDe42UMfRuVNbOIlgHVMXoWeZuw%2FOP1aZGDEKetA1mU5RYsXmxGgaxZdEwaYMRGTvxLTS4HdNtIcsnv44ph3IojM2N95Ov0rIjYf5Kk283psac44xb5DuCnyi1AC6WWWcQLHIhWkIpMEE89mbx7QtKwXbQfIwC8ErixEN4cddFqS34a%2BNVmXFEnxHKRa1pxMe%2BzFR6J8QqwwuztxWnDC1bzKNnX5BiPKWLyClcV3P681d7d5FcWc2Q%2FQoAUw9WAc4SfF1VR9JgwSe11cwm7Xicji76NfWCyhDkus3McguJUARqi567sRZzafyrUpQqcqoAukzKq9yFH%2FuBu1SjdZGQBc3UYqju6v0e8YcW%2B2%2FPoQyUehAophkbSvuHeJAixN4AqW5kulwW77blaYzCxfWmXNN7apXx2ic5TWWFPTq3F1Mazjhq5PhZsvoStxIyI%3D%3APEdK5vgry0HZF%2F5PefALnnHfb1p3pbEgS4RMXr1P4a%2FCeFSs3CyLNVrKQyWt%2F2pOomPQtwTmGgaPbEVoZQ1lmf9XZ6wYb7J%2FOG50UIaxIiwkYs0TQEE40UnlDVj%2Bld%2FLZBniPv63W8ynabzt2KRC0yoGJEJW0knjgYf9Q8H2wvPt44ikyI%2Fwe0S64t9GPmd2%2FJhKzoqkepdKz5roIDNm2ocsXQYvTiBvboL%2F09GExc1L5t8SIiRa8jHy3XASOeBSHCSgmKa9b5ImAXW7HaOUqE3UszKL4Qn6%2Bvb%2BhH7mH%2FtNgW1Qgj5HvtOXyYn3ElzmM%2Bb6RcIXxzoV0vmpB4KHPQ%3D%3D&amp;redirect=https%3A%2F%2Ffaradars.org%2Flanding%2Fdsh55&amp;ab&amp;vts=1671025101.629" target="_blank" style="position: relative;display: inline-block;">
                        <div style="background-color:transparent;">
                            <img class="bnr-img yn-bnr__img" width="1200" height="10" onload="ynBnrImgOnLoad(13722);" data-src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars72890_7b05aa06-15a9-4dd6-a53a-a0a0adfe66e9__1ex2gqwOr6.gif" alt="" src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars72890_7b05aa06-15a9-4dd6-a53a-a0a0adfe66e9__1ex2gqwOr6.gif">
                        </div>
                    </a>
                </div>

                <div class="d-flex">
                    <div class="col-6 pl-0">
                        <div class="py-2">
                            <div class="adds">
                                <a href="https://yungcenter.com/product-category/acc-play-station/?utm_source=gamefa&amp;utm_campaign=banner" target="_blank" rel="nofollow" class="d-block">
                                    <img width="600" height="60" src="https://gamefa.com/wp-content/uploads/2022/11/Expor.gif" class="img-fluid ads" alt="" decoding="async" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" py-2">
                            <div class="adds">
                                <a href="https://www.rtl-theme.com/author/mohamad_javad_Taherian/?aff=mohamad_javad_Taherian" target="_blank">
                                    <img src="{{ asset('modules/home/img/adds/banner.gif') }}" alt="" class="img-responsive ads">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <section class="content-info">
        <!-- content container -->
        <div class="container my-2">
            <div class="row">
                <!-- right aside -->
                <aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">

                    <div class="panel-box rounded">
                        <div class="titles no-margin bg-light">
                            <h4><i class="fa fa-list-alt"></i>مطالب داغ</h4>
                        </div>
                        <div class="filters px-3 my-3">
                            <ul class="list-filter d-flex justify-content-start">
                                <li class="bg-navy rounded-pill px-2 mx-1 active">
                                    <small><a href="#">دیدگاه</a></small></li>
                                <li class="bg-navy rounded-pill px-2 mx-1"><small><a href="#">بازدید</a></small>
                                </li>
                                <li class="bg-navy rounded-pill px-2 mx-1"><small><a href="#">لایک</a></small>
                                </li>
                            </ul>
                        </div>
                        <div class="info-panel py-1">
                            <ul class="list-news">
                                @forelse($hotPosts as $hot)
                                    <li>
                                        <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $hot) }}">{{ $hot->title }}</a></small>
                                    </li>
                                @empty
                                    <li class="text-muted"><small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                            <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                        </small></li>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    {{--                    <div class="panel-box rounded ">--}}
                    {{--                        <div class="titles bg-light">--}}
                    {{--                            <h4><i class="fa fa-calendar"></i>خاطرات</h4>--}}
                    {{--                        </div>--}}
                    {{--                        <ul class="list-diary">--}}
                    {{--                            <li>--}}
                    {{--                                <h6>گروه a<span>14 ژوئن 2018 - 18:00</span></h6>--}}
                    {{--                                <ul class="club-logo">--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/rusia.png') }}" alt="">--}}
                    {{--                                        <span>روسیه</span>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/arabia.png') }}" alt="">--}}
                    {{--                                        <span>عربستان </span>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <h6>گروه e<span>22 ژوئن 2018 - 15:00</span></h6>--}}
                    {{--                                <ul class="club-logo">--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/bra.png') }}" alt="">--}}
                    {{--                                        <span>برزیل</span>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/costa-rica.png') }}" alt="">--}}
                    {{--                                        <span>کاستاریکا</span>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <h6>گروه h<span>19 ژوئن 2018 - 15:00</span></h6>--}}
                    {{--                                <ul class="club-logo">--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/colombia.png') }}" alt="">--}}
                    {{--                                        <span>کلمبیا</span>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/japan.png') }}" alt="">--}}
                    {{--                                        <span>ژاپن</span>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <h6>گروه c<span>از 16 jun 2018 - 15:00</span></h6>--}}
                    {{--                                <ul class="club-logo">--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/fra.png') }}" alt="">--}}
                    {{--                                        <span>فرانسه</span>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/aus.png') }}" alt="">--}}
                    {{--                                        <span>استرالیا</span>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}

                    <div class="panel-box rounded">
                        <div class="titles no-margin bg-light">
                            <h4><i class="fa fa-link"></i>تبلیغات</h4>
                        </div>
                        <div class="mt-1 text-center">
                            <a rel="nofollow noopener" href="https://ck.yektanet.com/b/click?VERSION=2&amp;impression=Wwd%2FFjVXOF1M8KHKz%2F9RRr9iKOdJiUEakvVshn26Y3%2FVKmzb2ByttJLiebbBkGqHXN59G3xl2h%2BcwXS9glo3%2ByZaSu5YKayurR709%2FU3CfEixIwC%2Fg1piYyBnrRrvVdniWbue6Oo4aeEJaLMx%2FYtewa0AuUxXf%2F48%2B%2F0POzAC0aqvHTf1jebKMIsNr2BJAV2%2F95bNsaUJx8lnJ6eubIv2FYBywR20V%2FpW1gQMJdXYn2%2BICvfsmKhYN9UxcDreyT%2F%2FIGtWB%2Bk66FaelUkrfkXJmhoRRN4VtZ4OKUmhfozHpQ5ugFuIWCYqYShFTM8KKQa%2BRzqBjHO44lfxEoflw7179%2FF5OC9hZ1ZfqbxFAzVcDrNkEoNPFPQy%2FgfY5%2BlOaNInLV%2BKvb28DJ2rjPnrEghqap2advuH4CjtOVGFLP8bVzixV5wEPiujL2emLX6L4qUeHbWGO1LLq0HoUUpks22lBJumgkrN9AT8TLIf3x5Srw%3D%3AiPjgKyjEqwPPdIXiN8VlrR5dd%2BH%2BZ1XN20rkHMK20%2BLrdQyV2L2elvBp8pTYY2UDiE12eU8zmg49j5F4lsAeAb2QKQMl41YoWkZkGEcb46m5hgX1BKBhctZO1HgQvotHufp7WKxvFBGFzyXN%2FMV3TR3PfF0XhZHIrX9wi4jf27fnghHGbjycoh9o4aMegsZI4oQkUefvqiKGST1B79IWOLCeQfX91XbkQzgNfWtOm8Z6oe7JE4W5PeLvNW8cpPiIlsioZFpFBdwJe4qLJnHEmm%2FJm0QhJQyrjk9G4b46qr8VM9iDhSdj%2FH2Oni4jW0F26Jh0hwBHvE0t%2BLNIEWXpkA%3D%3D&amp;redirect=https%3A%2F%2Ffaradars.org%2Flanding%2Fdsh55&amp;ab&amp;vts=1671025976.688" target="_blank" style="position: relative;display: inline-block;">
                                <div style="background-color:transparent;">
                                    <img class="bnr-img yn-bnr__img" onload="ynBnrImgOnLoad(13727);" data-src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars300250_fc6fa3c5-49d8-4904-ac06-ce42d20210d0__1ex2gpGp3A.gif" alt="" src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars300250_fc6fa3c5-49d8-4904-ac06-ce42d20210d0__1ex2gpGp3A.gif">
                                </div>
                            </a>
                        </div>

                        {{--                        <div class="adbox w-100 p-1" data-id="454">--}}
                        {{--                            <a style="display: block;" class="adlink vrz-lazy" target="_blank" href="https://biz.varzesh3.com/events/click/454" rel="nofollow">--}}
                        {{--                                <img class="adimage" id="img-454" src="https://biz-cdn.varzesh3.com/banners/2022/11/19/bec6c0d3-6ee5-4593-818a-b97206dc292d.gif" data-origin="https://biz-cdn.varzesh3.com/banners/2022/11/19/bec6c0d3-6ee5-4593-818a-b97206dc292d.gif" width="300">--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </div>
                </aside>
                <!-- end right aside -->
                <!-- center -->
                <div class="col-lg-5 col-xl-6 col-sm-12 h-100">
                    <!-- last news -->
                    <div class="panel-box rounded">
                        <div class="titles bg-light">
                            <h4><i class="fa fa-newspaper-o"></i>آخرین اخبار</h4>
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
                                                <i class="fa fa-pen text-navy"></i>{{ $post->author->fullname ?? $post->author->name }}
                                            </small> <small class="font-weight-bold">
                                                <i class="fa fa-clock text-navy"></i>{{ jalaliDate($post->published_at, 'H:i - Y/m/d') }}
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fa fa-comment text-navy"></i> {{ $post->comments()->count() }}
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
                                                <i class="fa fa-pen text-navy"></i>نویسنده
                                            </small> <small class="font-weight-bold">
                                                <i class="fa fa-clock text-navy"></i>تاریخ انتشار
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fa fa-comment text-navy"></i> نظرات
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
                                                        <a href="#" class="btn-iw outline">بیشتر بخوانید<i class="fa fa-long-arrow-left"></i></a>
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
                    <div class="recent-results">
                        <h5><a href="group-list.html"><i class="fa fa-soccer-ball-o"></i> نتایج اخیر</a></h5>

                        <div class="info-results">
                            <ul>
                                <li><span class="head">
                                        پرتغال مقابل اسپانیا<span class="date">27 ژوئن 2017</span>
                                                        </span>
                                    <div class="goals-result">
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/por.png') }}" alt="">پرتغال
                                        </a>
                                        <span class="goals">
                                                                <b>2</b>-<b>3</b>
                                                            </span>
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/esp.png') }}" alt="">اسپانیا
                                        </a>
                                    </div>
                                </li>
                                <li>
                                                        <span class="head">
                                                            rusia مقابل کلمبیا<span class="date">30 ژوئن 2017</span>
                                                        </span>
                                    <div class="goals-result">
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/rusia.png') }}" alt="">rusia
                                        </a>
                                        <span class="goals">
                                                                <b>2</b>-<b>3</b>
                                                            </span>
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/colombia.png') }}" alt="">کلمبیا
                                        </a>
                                    </div>
                                </li>
                                <li>
                                                        <span class="head">
                                                            اروگوئه در مقابل پرتغال<span class="date">31 ژوئن 2017</span>
                                                        </span>
                                    <div class="goals-result">
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/uru.png') }}" alt="">اروگوئه
                                        </a>
                                        <span class="goals">
                                                                <b>2</b>-<b>3</b>
                                                            </span>
                                        <a href="single-team.html">
                                            <img src="{{ asset('modules/home/img/clubs-logos/por.png') }}" alt="">پرتغال
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="player-ranking">
                        <h5><a href="group-list.html"><i class="fa fa-soccer-ball-o"></i> بازیکنان برتر</a></h5>
                        <div class="info-player">
                            <ul>
                                <li>
                                    <span class="position">1</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/players/1.jpg') }}" alt="">کریستیانو r.
                                    </a>
                                    <span class="points">90</span>
                                </li>
                                <li>
                                    <span class="position">2</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/players/2.jpg') }}" alt="">لیونل مسی
                                    </a>
                                    <span class="points">88</span>
                                </li>
                                <li>
                                    <span class="position">3</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/players/3.jpg') }}" alt="">نیمار
                                    </a>
                                    <span class="points">86</span>
                                </li>
                                <li>
                                    <span class="position">4</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/players/4.jpg') }}" alt="">لوئیس سوارز
                                    </a>
                                    <span class="points">80</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="club-ranking">
                        <h5><a href="group-list.html"><i class="fa fa-shield"></i> رتبه بندی باشگاه</a></h5>
                        <div class="info-ranking">
                            <ul>
                                <li>
                                    <span class="position">1</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/rusia.png') }}" alt="">روسیه
                                    </a>
                                    <span class="points">90</span>
                                </li>
                                <li>
                                    <span class="position">2</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/arabia.png') }}" alt="">عربستان سعودی
                                    </a>
                                    <span class="points">86</span>
                                </li>
                                <li>
                                    <span class="position">3</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/egy.png') }}" alt="">مصر
                                    </a>
                                    <span class="points">84</span>
                                </li>
                                <li>
                                    <span class="position">4</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/uru.png') }}" alt="">اروگوئه
                                    </a>
                                    <span class="points">70</span>
                                </li>
                                <li>
                                    <span class="position">5</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/por.png') }}" alt="">پرتغال
                                    </a>
                                    <span class="points">67</span>
                                </li>
                                <li>
                                    <span class="position">6</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/esp.png') }}" alt="">اسپانیا
                                    </a>
                                    <span class="points">60</span>
                                </li>
                                <li>
                                    <span class="position">5</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/mar.png') }}" alt="">مراکش
                                    </a>
                                    <span class="points">90</span>
                                </li>
                                <li>
                                    <span class="position">8</span>
                                    <a href="single-team.html">
                                        <img src="{{ asset('modules/home/img/clubs-logos/irn.png') }}" alt="">ایران
                                    </a>
                                    <span class="points">53</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </aside>
                <!-- end left side -->
            </div>
        </div>
        <!-- end content -->

        <!-- gallery -->
        <div class="col-12">
            <div class="panel-box">
                <div class="titles no-margin">
                    <h4>گالری ویدیو</h4>
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
                                        درحال حاضر ویدیویی برای نمایش وجود ندارد! @admin <a href="{{ route('admin.videogallery') }}" class="btn-link links links-footer text-primary">وارد کردن ویدیو</a> @endadmin
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
