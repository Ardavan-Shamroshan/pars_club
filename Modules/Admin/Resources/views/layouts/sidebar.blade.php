<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">

        <div class="app-sidebar__user clearfix">
            @auth
                <div class="dropdown user-pro-body">
                    <div>
                        @if(auth()->user()->profile_photo_path)
                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}" class="avatar avatar-xl brround">
                            <span class="avatar-status profile-status bg-green"></span>
                        @else
                            <div class="profile-user avatar avatar-lg bg-info rounded-circle text-white mx-auto">
                                <small>{{ auth()->user()->fullname[0] ?? 'م' }}</small>
                            </div>
                            <span class="avatar-status profile-status bg-green"></span>
                        @endif
                    </div>

                    <div class="user-info">
                        <h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->fullname ?? auth()->user()->name }}</h4>
                        <span class="mb-0 text-muted">مدیریت</span>
                    </div>
                </div>
            @endauth

        </div>

        <ul class="side-menu">
            <li class="side-item side-item-category">مجله و خبرنامه</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.postcategory') }}">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-list"></i></span> دسته بندی اخبار </span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.post') }}">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-newspaper-o"></i></span> اخبار </span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.comment') }}">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-comment"></i></span> نظرات </span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-pager"></i></span> محتوا</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="chart-morris.html">منو ها</a></li>
                    <li><a class="slide-item" href="chart-flot.html">صفحه ساز</a></li>
                </ul>
            </li>

            @admin
            @if(auth()->user()->role('super admin') || auth()->user()->canany(['manage roles','manage permissions','manage users']))
                <li class="side-item side-item-category">احراز هویت</li>
                @can('manage users')
                    <li class="slide">
                        <a class="side-menu__item" href={{ route('admin.user') }}>
                            <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-user"></i></span> کاربران</span>
                        </a>
                    </li>
                @endcan
                @can('manage roles')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('admin.role') }}">
                            <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-users"></i></span> نقش ها</span>
                        </a>
                    </li>
                @endcan
                @can('manage permissions')
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('admin.permission') }}">
                            <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-key"></i></span> دسترسی ها</span>
                        </a>
                    </li>
                @endcan
            @endif
            @endadmin

            <li class="side-item side-item-category">تنظیمات</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-cogs"></i></span> پیشرفته</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="chart-morris.html">نمودار موریس</a></li>
                    <li><a class="slide-item" href="chart-flot.html">نمودار های فلوت</a></li>
                    <li><a class="slide-item" href="chart-chartjs.html">نمودار JS</a></li>
                    <li><a class="slide-item" href="chart-echart.html">اچارت</a></li>
                    <li><a class="slide-item" href="chart-sparkline.html">شكلر</a></li>
                    <li><a class="slide-item" href="chart-peity.html">چارت گرایی</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside><!-- main-sidebar -->
