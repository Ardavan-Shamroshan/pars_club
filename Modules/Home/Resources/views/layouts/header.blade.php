<!-- header -->
<div class="container">
    <header class="header-2 mb-1 bg-sky">
        <!-- header alert -->
        {{--    <div class="header-alert p-2 bg-navy">--}}
        {{--        <a href="#" class="text-dark font-weight-bold"><span class="">اخبار رده های پایه تا جوانان تیم فوتبال پارس را دنبال کنید</span></a>--}}
        {{--        <a class="text-dark font-weight-bold"><span class="">اخبار رده های پایه تا جوانان تیم فوتبال پارس را از اینجا دنبال کنید</span></a>--}}
        {{--    </div>--}}
        <!-- header -->
        <div class="header-alert">
            <div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-6 py-2">
                            <a href="{{ route('home') }}" title="Return Home">
                                @if($setting->logo)
                                    <img src="{{ asset($setting->logo) }}" alt="Logo" class="logo_img rounded-circle border" width="50">
                                @else
                                    <img src="{{ asset('modules/home/img/clubs-logos/club_logo.jpg') }}" alt="Logo" class="logo_img rounded-circle border" width="50">
                                @endif
                            </a>
                        </div>
                        <div class="col-6 py-2" style="background: linear-gradient(to right,rgba(37,169,224,1) 0,rgba(37,169,224,1) 30%,rgba(37,169,224,0) 100%);">
                            <div class="w-75 mr-auto">
                            <span class="d-flex justify-content-end gap-1" title="{{ $setting->title }}">
                            <p class="text-wrap text-white my-auto">مسابقه رایگان پیش‌بینی
                                بازی‌های پارس</p>
                            <img src="{{ asset('modules/admin/assets/img/symbol.png') }}" alt="Logo" class="logo_img" width="50">
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <a href="{{ route('post') }}">مجله و خبرنامه</a>
                                            <div class="sf-mega">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5><i class="fe fe-list" aria-hidden="true"></i>دسته بندی ها
                                                        </h5>
                                                        <ul>
                                                            @forelse($categories as $category)
                                                                <li>
                                                                    <a href="{{ route('postcategory', $category) }}">{{ $category->name }}</a>
                                                                </li>
                                                            @empty
                                                                <li>
                                                                    <small>درحال حاضر دسته بندی برای نمایش وجود ندارد! @admin
                                                                        <a href="{{ route('admin.postcategory') }}" class="btn-link links links-footer text-primary">وارد کردن دسته بندی</a> @endadmin
                                                                    </small></li>
                                                            @endforelse
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <h5><i class="fe fe-book-open" aria-hidden="true"></i>آخرین مقالات
                                                        </h5>
                                                        <div class="row" style="padding: 0; margin: 0;">
                                                            @forelse($latestPosts as $post)
                                                                <div class="col-md-4">
                                                                    <div class="img-hover rounded border">
                                                                        <img src="{{ asset($post->image['indexArray']['medium']) ?? asset('modules/home/img/blog/1.jpg') }}" alt="{{ $post->title }}" class="img-responsive rounded">
                                                                        <a href="{{ route('post.show', $post) }}">
                                                                            <div class="overlay text-white">
                                                                                {{ $post->title }}
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="col-md-4">
                                                                    <div class="img-hover rounded border">
                                                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="یافت نشد" class="img-responsive rounded">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="img-hover rounded border">
                                                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="یافت نشد" class="img-responsive rounded">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="img-hover rounded border">
                                                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="یافت نشد" class="img-responsive rounded">
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="current">
                                            <a href="{{ route('home.about-us') }}">درباره ما</a>
                                        </li>
                                        <li class="current">
                                            <a href="{{ route('contact-us') }}">تماس با ما</a>
                                        </li>
                                        <li class="current">
                                            <a href="teams.html">روابط عمومی</a>
                                            <ul class="sub-current">
                                                <li>
                                                    <a href="teams.html">تبلیغات</a>
                                                </li>
                                                <li>
                                                    <a href="single-team.html">شرایط استفاده</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>

                                    @auth
                                        @admin
                                        <ul class="sf-menu w-25 text-left">
                                            <li class="bg-white m-0">
                                                <a href="#" class="text-dark-sky">پیشخوان</a>
                                            </li>
                                        </ul>
                                        @endadmin
                                    @endauth
                                    @guest
                                        <ul class="sf-menu w-25 text-left">
                                            <li class="bg-white m-0">
                                                <a href="{{ route('login') }}" class="text-dark-sky">ورود</a>
                                            </li>
                                            <li class="bg-success m-0">
                                                <a href="{{ route('register') }}" class="">عضویت</a>
                                            </li>
                                        </ul>
                                    @endguest
                                </div>
                            </div>
                        </nav>


                        <div class="dropdown main-header-message right-toggle">
                            <a class="nav-link pe-0" data-bs-toggle="sidebar-left" data-bs-target=".sidebar-left">
                                <i class="fe fe-menu text-white"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

</div>

<!-- Sidebar-left-->
<div class="sidebar sidebar-left sidebar-animate">
    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading border-0 p-3">
            <div class="card-title mb-0">منو</div>
            <div class="card-options ms-auto">
                <a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
            <div class="tabs-menu ">
                <!-- Tabs -->
                <ul class="nav panel-tabs">
                    <li><a href="{{ route('home') }}" class="active"><i class="ion ion-md-home tx-18 me-2"></i> خانه</a></li>
                    <li><a href="{{ route('post') }}"><i class="ion ion-md-book tx-18  me-2"></i> مجله و خبرنامه</a></li>
                    <li><a href="{{ route('home.about-us') }}"><i class="ion ion-md-football tx-18 me-2"></i> درباره ما</a></li>
                    <li><a href="{{ route('contact-us') }}"><i class="ion ion-md-contacts tx-18 me-2"></i> تماس با ما</a></li>
                        @admin
                            <ul class="d-flex w-100 p-0 gap-1">
                                <li ><a href="" class="bg-white"> پیشخوان</a></li>
                            </ul>
                        @endadmin
                        @guest
                            <ul class="d-flex w-100 p-0 gap-1">
                                <li ><a href="{{ route('login') }}" class="bg-white"> ورورد</a></li>
                                <li ><a href="{{ route('register') }}" lass="bg-success text-white">عضویت</a></li>
                            </ul>
                        @endguest
                    </ul>
            </div>

        </div>
    </div>
</div>
<!--/Sidebar-left-->