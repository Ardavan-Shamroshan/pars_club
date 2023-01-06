@extends('home::layouts.master')
@section('title')
    {{ $setting->title }}
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="main-col col-12 col-lg-6">
            @if($banner)
                <div class="main-col-card">
                    <div class="main-col-image">
                        <a href="{{ route('post.show', $banner) }}">
                            <img src="{{ $banner->image['indexArray']['medium'] }}" alt="img">
                        </a>
                    </div>
                    <div class="main-col-title">
                        <a href="{{ route('post.show', $banner) }}">
                            <p><?= $banner->summary ?></p>
                        </a>
                    </div>
                </div>
            @endif

            <div class="col-12 mt-3">
                <div class="main-news">

                    @foreach($posts as $post)
                        <div class="main-news-card">
                            <div class="main-news-card-thumbnail">
                                <a href="{{ route('post.show', $post) }}">
                                    <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="main-news-top-title d-none d-sm-block">
                                    <p>
                                        <a href="{{ route('postcategory', $post->category) }}">{{ $post->category->name ?? 'دسته بندی' }}</a>
                                    </p>
                                </div>
                                <div class="main-news-card-title">
                                    <a href="{{ route('post.show', $post) }}">
                                        <p>{{ $post->title }}</p>
                                    </a>
                                </div>
                                <div class="main-news-card-except">
                                    <p><?= $post->summary ?></p>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    @endforeach

                    <div class="open-all-archive">
                        <a href="{{ route('post.club-news') }}">
                            <span>مشاهده آرشیو اخبار</span>
                        </a>
                    </div>
                </div>
                <div class="six-news mt-3">

                    <div class="sport-col-title mb-2">
                        <p><i class="fa-duotone fa-futbol"></i><span>پیشنهاد سردبیر</span></p>
                    </div>
                    <div class="six-news-all row gx-3">
                        @foreach($editorSuggests as $suggest)
                            <div class="col-12 col-lg-6 col-xl-4">
                                <div class="six-news-card">
                                    <div class="six-news-thumbnail">
                                        <a href="{{ route('post.show', $suggest) }}">
                                            <img src="{{ asset($suggest->image['indexArray']['medium']) }}" alt="{{ $suggest->title }}">
                                        </a>
                                    </div>
                                    <div class="six-news-top-title">
                                        <p>{{ $suggest->category->name }}</p>
                                    </div>
                                    <div class="six-news-title">
                                        <a href="{{ route('post.show', $suggest) }}">
                                            <p>{{ $suggest->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="second-col col-12 col-lg-3">
            <div class="news-list">
                <div class="news-box col-12">
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
        <div class="third-col col-12 col-lg-3">
            <div class="other-sections">
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
                <div class="ad-section mt-3">
                    <div class="ad-title">
                        <i class="fa-duotone fa-bullhorn"></i>
                        <span>تبلیغات</span>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-row mt-3">
        <div class="currency-section row gx-3">
            @foreach($leagues as $league)
                <div class="currency-first-col col-12 col-lg-6">
                    <div class="currency-gold-price">
                        <div class="currency-col-title">
                            <p>
                                <i class="fa-duotone fa-coin"></i>
                                <span>{{ $league->name }}</span>
                            </p>
                        </div>
                        <div class="currency-gold-table mt-3">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تیم</th>
                                    <th>بازی</th>
                                    <th>برد</th>
                                    <th class="least">مساوی</th>
                                    <th class="least">باخت</th>
                                    <th class="most">تفاضل</th>
                                    <th>امتیاز</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($league->teams as $team)
                                    <tr>
                                        @if($loop->iteration == 1 || $loop->iteration == 2)
                                            <td style="border-right: 3px solid #28cb28;">
                                                <span>{{ $loop->iteration }}</span>
                                            </td>
                                        @elseif($loop->iteration == count($league->teams) || $loop->iteration == (count($league->teams) - 1))
                                            <td style="border-right: 3px solid #cc0000;">
                                                <span>{{ $loop->iteration }}</span>
                                            </td>
                                        @else
                                            <td>{{ $loop->iteration }}</td>
                                        @endif
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->result->matches }}</td>
                                        <td>{{ $team->result->won }}</td>
                                        <td>{{ $team->result->deal }}</td>
                                        <td>{{ $team->result->loss }}</td>
                                        <td>{{ $team->result->GD }}</td>
                                        <td>{{ $team->result->points }}</td>
                                    </tr>

                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="third-row mt-3">
        <div class="sport-section row gx-3">
            <div class="sport-first-col col-12 col-md-8 col-lg-9">
                <div class="sport-news-section">
                    <div class="sport-col-title">
                        <p>
                            <i class="fa-duotone fa-futbol"></i>
                            <span>اخبار ورزش جهان</span>
                        </p>
                        <a href="{{ route('post.world-news') }}" class="main-see-all-link">
                            <span>مشاهده همه</span>
                        </a>
                    </div>
                    <div class="sport-news mt-3">

                        @forelse($worldNews as $world)
                            <div class="sport-news-card">
                                <div class="sport-news-card-thumbnail">
                                    <a href="{{ route('post.show', $world) }}">
                                        <img src="{{ asset($world->image['indexArray']['medium']) }}" alt="{{ $world->title }}">
                                    </a>
                                </div>
                                <div class="col ps-3">
                                    <div class="sport-news-top-title d-none d-sm-block">
                                        <p>{{ $world->category->name }}</p>
                                    </div>
                                    <div class="sport-news-card-title">
                                        <a href="{{ route('post.show', $world) }}">
                                            <p>{{ $world->title }}</p>
                                        </a>
                                    </div>
                                    <div class="sport-news-card-except">
                                        <p><?= html_entity_decode($world->summary) ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            <div class="sport-news-card">
                                <div class="sport-news-card-thumbnail">
                                    <a href="#"><img src="{{ asset('modules/home/img/404-football.gif') }}" alt="img"></a>
                                </div>
                                <div class="col ps-3">
                                    <div class="sport-news-top-title d-none d-sm-block"><p>دسته خبر</p></div>
                                    <div class="sport-news-card-title"><a href="#"><p>عنوان خبر</p></a></div>
                                    <div class="sport-news-card-except"><p>خلاصه خبر</p></div>
                                </div>
                            </div>
                            <hr>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="sport-second-col col-12 col-md-4 col-lg-3 mt-3 mt-lg-0">
                <div class="sport-dates">
                    <div class="sport-dates-header">
                        <i class="fa-duotone fa-whistle"></i>
                        <span>مهم ترین بازی ها</span>
                    </div>
                    <div class="sport-dates-body">
                        <div class="sport-dates-time">
                            <span>یکشنبه</span>
                            <span>19</span>
                            <span>تیر</span>
                        </div>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-spain-svgrepo-com.svg') }}" alt="">
                                    <span>اسپانیا</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>پرتغال</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-portugal-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/france-svgrepo-com.svg') }}" alt="">
                                    <span>فرانسه</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>ایتالیا</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/italy-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                        <div class="sport-dates-time">
                            <span>سه شنبه</span>
                            <span>21</span>
                            <span>تیر</span>
                        </div>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-spain-svgrepo-com.svg') }}" alt="">
                                    <span>اسپانیا</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>پرتغال</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-portugal-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-spain-svgrepo-com.svg') }}" alt="">
                                    <span>اسپانیا</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>پرتغال</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-portugal-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-spain-svgrepo-com.svg') }}" alt="">
                                    <span>اسپانیا</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>پرتغال</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-portugal-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-dates-card">
                            <div class="sport-dates-teams">
                                <div class="sport-date-team-1">
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-spain-svgrepo-com.svg') }}" alt="">
                                    <span>اسپانیا</span>
                                </div>
                                <span>-</span>
                                <div class="sport-date-team-2">
                                    <span>پرتغال</span>
                                    <img src="{{ asset('modules/home/assets/img/flags/flag-for-portugal-svgrepo-com.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="sport-dates-league">
                                <span>لیگ ملت های اروپا</span>
                            </div>
                            <div class="sport-dates-time-clock">
                                <span>30</span>
                                <span>:</span>
                                <span>22</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fourth-row mt-3">
        <div class="video-section d-flex flex-wrap">
            <div class="video-col-title">
                <p>
                    <i class="fa-duotone fa-circle-play"></i>
                    <span>ویدیو</span>
                </p>
                <a href="{{ route('videogallery') }}" class="main-see-all-link">
                    <span>مشاهده همه</span>
                </a>
            </div>
            <div class="video-col col-12 col-lg-8 mt-3">
                <div class="main-video-player">
                    <video class="video-js" poster="{{ asset('modules/home/img/clubs-logos/club_logo.jpg') }}" width="100%" height="100%" controls controlsList="nodownload noplaybackrate" data-setup="{}">
                        <source src="{{ asset($latestVideo->video) }}" type="video/mp4">
                    </video>
                </div>
                <div class="main-video-player-title mt-3">
                    <a href="{{ route('videogallery.show', $latestVideo) }}">
                        <span>{{ $latestVideo->title }}</span>
                    </a>
                </div>
                <div class="main-video-player-description">
                    <p><?= $latestVideo->description ?></p>
                </div>
            </div>
            <div class="archive-col col-12 col-lg-4 mt-3">

                @forelse($videos as $video)
                    <div class="main-video-arcive-card">
                        <div class="main-video-arcive-card-thumbnail border">
                            <a href="{{ route('videogallery.show', $video) }}">
                                <img src="{{ asset('modules/home/img/video.jpg') }}" alt="{{ $video->title }}" width="10">
                                <div class="video-arcive-card-thumbnail-hover">
                                    <i class="fa-solid fa-eye"></i>
                                    <span class="video-view-count"></span>
                                </div>
                            </a>
                        </div>
                        <div class="main-video-arcive-card-title">
                            <a href="{{ route('videogallery.show', $video) }}">
                                <span>{{ $video->title }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="main-video-arcive-card">
                        <div class="main-video-arcive-card-thumbnail">
                            <a href="#">
                                <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="'video'">
                                <div class="video-arcive-card-thumbnail-hover">
                                    <i class="fa-solid fa-eye"></i>
                                    <span class="video-view-count"></span>
                                </div>
                            </a>
                        </div>
                        <div class="main-video-arcive-card-title">
                            <a href="#">
                                <span>عنوان ویدیو</span>
                            </a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <div class="fifth-row mt-3">
        <div class="photo-section d-flex flex-wrap">
            <div class="photo-col-title">
                <p>
                    <i class="fa-duotone fa-images"></i>
                    <span>عکس های روز</span>
                </p>
                <a href="{{ route('slide') }}" class="main-see-all-link">
                    <span>مشاهده همه</span>
                </a>
            </div>
            <div class="photo-sec-all mt-lg-0 owl-carousel owl-theme">
                @forelse($slides as $slide)
                    <div class="photo-sec-col col-12">
                        <div class="photo-sec-card">
                            <div class="photo-sec-thumbnail">
                                <a href="{{ route('slide.show', $slide,) }}">
                                    <img src="{{ asset($slide->image['indexArray']['large']) }}" alt="{{ $slide->title }}">
                                </a>
                            </div>
                            <div class="photo-sec-title">
                                <a href="{{ route('slide.show', $slide,) }}">
                                    <i class="fa-duotone fa-image"></i>
                                    <span>{{ $slide->title }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="photo-sec-col col-12">
                        <div class="photo-sec-card">
                            <div class="photo-sec-thumbnail">
                                <a href="#">
                                    <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="img">
                                </a>
                            </div>
                            <div class="photo-sec-title">
                                <a href="#">
                                    <i class="fa-duotone fa-image"></i>
                                    <span>عنوان اسلاید</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
