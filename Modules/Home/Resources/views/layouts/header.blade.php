<!-- header -->
<header class="header-2 mb-1 bg-sky">
    <!-- header alert -->
    <div class="header-alert p-2 bg-navy">
        <a href="#" class="text-dark font-weight-bold"><span class="">اخبار رده های پایه تا جوانان تیم فوتبال پارس را دنبال کنید</span></a>
    </div>
    <!-- header -->
    <div class="header-alert p-2 ">
        <div class="col col-xl-6">
            <a href="index.html" title="Return Home">
                <img src="{{ asset('modules/home/img/clubs-logos/fc.png') }}" alt="Logo" class="logo_img" width="50">
            </a>
        </div>
    </div>

    <!-- header-menu -->
    <div class="bg-sky-secondary">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col col-xl-12 header-menu">
                    <nav class="mainmenu">
                        <div class="container">
                            <div class="row justify-content-between">
                                <ul class="sf-menu w-75 text-right" id="menu">
                                    <li class="current">
                                        <a href="{{ route('home') }}">خانه</a>
                                    </li>
                                    <li>
                                        <a href="#">جام جهانی</a>
                                        <div class="sf-mega">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5><i class="fa fa-trophy" aria-hidden="true"></i>مقالات </h5>
                                                    <ul>
                                                        @foreach($categories as $category)
                                                            <li><a href="{{ route('postcategory.posts', $category) }}">{{ $category->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><i class="fa fa-pencils" aria-hidden="true"></i>لیست تیم ها
                                                    </h5>
                                                    <div class="img-hover">
                                                        <img src="{{ asset('modules/home/img/blog/1.jpg') }}" alt="" class="img-responsive">
                                                        <div class="overlay"><a href="teams.html">+</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><i class="fa fa-futbol-o" aria-hidden="true"></i>لیست
                                                        بازیکنان</h5>
                                                    <div class="img-hover">
                                                        <img src="{{ asset('modules/home/img/blog/2.jpg') }}" alt="" class="img-responsive">
                                                        <div class="overlay"><a href="players.html">+</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><i class="fa fa-gamepad" aria-hidden="true"></i>اطلاعات
                                                        نتایج</h5>
                                                    <div class="img-hover">
                                                        <img src="{{ asset('modules/home/img/blog/3.jpg') }}" alt="" class="img-responsive">
                                                        <div class="overlay"><a href="results.html">+</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    {{--                                    <li class="current">--}}
                                    {{--                                        <a href="teams.html">تیم</a>--}}
                                    {{--                                        <ul class="sub-current">--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="teams.html">لیست تیم ها</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="single-team.html">تیم تک</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="current">--}}
                                    {{--                                        <a href="players.html">بازیکنان</a>--}}
                                    {{--                                        <ul class="sub-current rounded">--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="players.html">لیست بازیکنان</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="single-player.html">بازیکن تک</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="fixtures.html">تجهیزات</a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="current">--}}
                                    {{--                                        <a href="results.html">نتایج</a>--}}
                                    {{--                                        <ul class="sub-current rounded">--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="results.html">لیست نتایج</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <a href="single-result.html">نتیجه ی تک</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="table-point.html">جدول امتیازات</a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="groups.html">گروه</a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#">امکانات</a>--}}
                                    {{--                                        <div class="sf-mega">--}}
                                    {{--                                            <div class="row">--}}
                                    {{--                                                <div class="col-md-3">--}}
                                    {{--                                                    <h5>امکانات</h5>--}}
                                    {{--                                                    <ul class="rounded">--}}
                                    {{--                                                        <li><a href="page-full-width.html">تمام عرض</a></li>--}}
                                    {{--                                                        <li><a href="page-left-sidebar.html">نوار کناری سمت چپ</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li><a href="page-right-sidebar.html">نوار کناری سمت--}}
                                    {{--                                                                راست</a></li>--}}
                                    {{--                                                        <li><a href="page-404.html">صفحه 404</a></li>--}}
                                    {{--                                                        <li><a href="page-faq.html">پرسش و پاسخ</a></li>--}}
                                    {{--                                                        <li><a href="sitemap.html">نقشه سایت</a></li>--}}
                                    {{--                                                        <li><a href="page-pricing.html">قیمت گذاری</a></li>--}}
                                    {{--                                                        <li><a href="page-register.html">فرم ثبت نام</a></li>--}}
                                    {{--                                                    </ul>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="col-md-3">--}}
                                    {{--                                                    <h5>هدر ها و پاورقی ها</h5>--}}
                                    {{--                                                    <ul class="rounded" r>--}}
                                    {{--                                                        <li><a href="feature-header-footer-1.html">نسخه هدر 1</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li><a href="feature-header-footer-2.html">نسخه هدر 2</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li><a href="feature-header-footer-3.html">نسخه هدر 3</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li><a href="index-5.html">نسخه هدر 4</a></li>--}}
                                    {{--                                                        <li><a href="feature-header-footer-1.html#footer">نسخه پایه--}}
                                    {{--                                                                1</a></li>--}}
                                    {{--                                                        <li><a href="feature-header-footer-2.html#footer">نسخه--}}
                                    {{--                                                                پاورقی 2</a></li>--}}
                                    {{--                                                        <li><a href="feature-header-footer-3.html#footer">نسخه پایه--}}
                                    {{--                                                                3</a></li>--}}
                                    {{--                                                    </ul>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="col-md-3">--}}
                                    {{--                                                    <h5>صفحات</h5>--}}
                                    {{--                                                    <ul class="rounded">--}}
                                    {{--                                                        <li><a href="page-about.html">درباره ی ما</a></li>--}}
                                    {{--                                                        <li><a href="single-player.html">درباره من</a></li>--}}
                                    {{--                                                        <li><a href="services.html">خدمات</a></li>--}}
                                    {{--                                                        <li><a href="single-team.html">اطلاعات باشگاه</a></li>--}}
                                    {{--                                                        <li><a href="single-result.html">نتیجه مسابقه</a></li>--}}
                                    {{--                                                        <li><a href="table-point.html">موقعیت ها</a></li>--}}
                                    {{--                                                    </ul>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="col-md-3">--}}
                                    {{--                                                    <h5>اخبار</h5>--}}
                                    {{--                                                    <ul class="rounded">--}}
                                    {{--                                                        <li>--}}
                                    {{--                                                            <a href="news-left-sidebar.html">نوار کنفرانس خبری</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li>--}}
                                    {{--                                                            <a href="news-right-sidebar.html">نوار کناری سمت--}}
                                    {{--                                                                راست</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li>--}}
                                    {{--                                                            <a href="news-no-sidebar.html">اخبار بدون نوار کناری</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li>--}}
                                    {{--                                                            <a href="single-news.html">اخبار تک</a>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                    </ul>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <i class="fa fa-trophy big-icon" aria-hidden="true"></i>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="contact.html">تماس</a>--}}
                                    {{--                                    </li>--}}
                                </ul>

                                <ul class="sf-menu w-25 text-left">
                                    <li class="bg-white m-0">
                                        <a href="#" class="text-dark-sky">ورود</a>
                                    </li>
                                    <li class="bg-success m-0">
                                        <a href="index.html" class="">عضویت</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <a class="mobile-nav" href="#mobile-nav"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>