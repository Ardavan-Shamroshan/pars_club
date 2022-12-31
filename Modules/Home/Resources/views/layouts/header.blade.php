<!--Header Start-->
<header>
    <!--Top Header Start-->
    <div class="top-header d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="header-date">
                <span>سه شنبه</span>
                <span>12</span>
                <span>اردیبهشت</span>
                <span>1401</span>
            </div>
            <div class="top-header-social">
                <a href="#">
                    <i class="fa-brands fa-telegram"></i>
                    <span>تلگرام</span>
                </a>
                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                    <span>اینستاگرام</span>
                </a>
                <a href="#">
                    <i class="fa-brands fa-twitter"></i>
                    <span>توییتر</span>
                </a>
            </div>
        </div>
    </div>
    <!--Top Header End-->
    <!--Main Header Start-->
    <div class="main-header">
        <div class="container d-flex justify-content-between">
            <div class="main-header-right d-flex">
                <div class="mobile-menu-toggle">
                    <button onclick="openMobileMenu()">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <!--Logo Start-->
                <div class="main-logo">
                    <a href="index-2.html">
                        <img src="{{ asset('modules/home/assets/img/Logo.png') }}" alt="Logo">
                    </a>
                </div>
                <!--Logo End-->
            </div>
            <!--Nav Start-->
            <div class="top-navbar d-flex align-items-center navbar-expand-xl">
                <ul class="navbar-list p-0 m-0 navbar-collapse collapse">
                    <li>
                        <a href="index-2.html">
                            <span>صفحه اصلی</span>
                        </a>
                    </li>
                    <li>
                        <a href="archive.html">
                            <span>صفحه آرشیو</span>
                        </a>
                    </li>
                    <li>
                        <a href="single.html">
                            <span>صفحه سینگل</span>
                        </a>
                    </li>
                    <li>
                        <a href="tags-archive.html">
                            <span>صفحه آرشیو تگ ها</span>
                        </a>
                    </li>
                    <li>
                        <a href="pictures-single.html">
                            <span>صفحه سینگل عکس ها</span>
                        </a>
                    </li>
                    <li class="top-dropdown">
                        <a href="#" class="top-dropdown-link">
                            <span>صفحات دیگر</span>
                        </a>
                        <ul class="top-dropdown-menu">
                            <li>
                                <a href="contact-us.html">
                                    <span>تماس با ما</span>
                                </a>
                            </li>
                            <li>
                                <a href="about-us.html">
                                    <span>درباره ما</span>
                                </a>
                            </li>
                            <li>
                                <a href="rules.html">
                                    <span>قوانین</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--Nav End-->
            <!--Search and icons Start-->
            <div class="main-header-left d-flex align-items-center">
                <div class="search-and-icons d-flex align-items-center">
                    <div class="top-search d-none d-lg-block">
                        <label for="top-search" class="d-flex align-items-center">
                            <i class="fa-solid fa-search"></i>
                        </label>
                        <input type="text" class="form-control" id="top-search" placeholder="جستجو ...">
                    </div>
                    <div class="top-search-mobile d-block d-lg-none">
                        <button onclick="openMobileSearch()">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                    <div class="top-notifications">
                        <button onclick="openNotifPanel()">
                            <i class="fa-solid fa-bell"></i>
                            <div class="notif-badge">
                                <span>2</span>
                            </div>
                        </button>
                        <div class="notifications-div">
                            <ul class="notification-message">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-exclamation mark-ic"></i>
                                        <span>از آخرین اخبار ما مطلع شوید</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-exclamation mark-ic"></i>
                                        <span>از آخرین اخبار ما مطلع شوید</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="top-header-menu">
                        <button id="header-menu-btn" onclick="openHeaderMenuPanel()">
                            <i class="fa-solid fa-grid"></i>
                        </button>
                        <div class="top-header-menu-div">
                            <!-- <div id="overlay" class="overlay"></div> -->
                            <ul class="top-header-menu-list">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-house grid-ic"></i>
                                        <span>خانه</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-gear grid-ic"></i>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-user grid-ic"></i>
                                        <span>حساب کاربری</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-bookmark grid-ic"></i>
                                        <span>علاقه مندی ها</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-language grid-ic"></i>
                                        <span>زبان</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-donate grid-ic"></i>
                                        <span>حمایت مالی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-store grid-ic"></i>
                                        <span>فروشگاه</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-mobile grid-ic"></i>
                                        <span>شماره تماس</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-at grid-ic"></i>
                                        <span>ایمیل</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Search and icons End-->
        </div>
    </div>
    <!--Top Header End-->
    <!--Mobile Search Field Start-->
    <div class="mobile-search-field d-flex align-items-center d-lg-none">
        <input type="text" class="form-control" id="mobile-top-search" placeholder="جستجو ...">
    </div>
    <!--Mobile Search Field End-->
</header>
<!--Header End-->