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
                        @if(auth()->user()->profile_photo_url)
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

            <li class="side-item side-item-category">احراز هویت</li>
            <li class="slide">
                <a class="side-menu__item" href={{ route('admin.user') }}>
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-user"></i></span> کاربران</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="icons.html">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-users"></i></span> نقش ها</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="icons.html">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-key"></i></span> دسترسی ها</span>
                </a>
            </li>

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
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3" />
                        <path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                    <span class="side-menu__label">تجارت الکترونیک</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="products.html">محصولات</a></li>
                    <li><a class="slide-item" href="product-details.html">مشخصات محصول</a></li>
                    <li><a class="slide-item" href="product-cart.html">سبد</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside><!-- main-sidebar -->
