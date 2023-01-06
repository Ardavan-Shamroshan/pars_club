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
            </div>
        </div>
        <div class="news-box col-12 mt-3">
            <div class="news-box-card-mini">
                <div class="news-box-header">
                    <i class="fa-duotone fa-newspaper"></i>
                    <span>آخرین ویدیو ها</span>
                </div>
                <div class="new-box-news">

                    @forelse($latestVideos as $latest)
                        <div class="main-video-arcive-card m-2">
                            <div class="main-video-arcive-card-thumbnail border">
                                <a href="{{ route('videogallery.show', $latest) }}">
                                    <img src="{{ asset('modules/home/img/video.jpg') }}" alt="{{ $latest->title }}" width="10">
                                    <div class="video-arcive-card-thumbnail-hover">
                                        <i class="fa-solid fa-eye"></i>
                                        <span class="video-view-count"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="main-video-arcive-card-title">
                                <small class="text-black-50">{{ jalaliDate($latest->created_at, '', true) }}</small> <br>
                                <a href="{{ route('videogallery.show', $latest) }}">
                                    <span>{{ $latest->title }}</span>
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



    </div>
</div>