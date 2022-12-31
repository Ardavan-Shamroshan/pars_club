@extends('home::layouts.master')
@section('title')
    {{ $setting->title }}
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="main-col col-12 col-lg-6">
            <div class="main-col-card">
                <div class="main-col-image">
                    <a href="single.html">
                        <img src="{{ asset('modules/home/assets/img/thumbnails/101 copy.jpg') }}" alt="img">
                    </a>
                </div>
                <div class="main-col-title">
                    <a href="single.html">
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    </a>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="main-news">
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/1 (1) copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>خودروسازی</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>رونمایی از خودروی جدید فراری در سال 2023</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/100 copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>نجوم</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>چرا باید از پیرامون اطراف خود با خبر باشیم ؟</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/103 (1) copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>خودروسازی</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>رونمایی از خودروی جدید فراری در سال 2023</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/103 (1) copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>نجوم</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>چرا باید از پیرامون اطراف خود با خبر باشیم ؟</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/108 copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>خودروسازی</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>رونمایی از خودروی جدید فراری در سال 2023</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/103 (1) copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>نجوم</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>چرا باید از پیرامون اطراف خود با خبر باشیم ؟</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/105 copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>خودروسازی</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>رونمایی از خودروی جدید فراری در سال 2023</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-news-card">
                        <div class="main-news-card-thumbnail">
                            <a href="single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/12 copy.jpg') }}" alt="img">
                            </a>
                        </div>
                        <div class="col ps-3">
                            <div class="main-news-top-title d-none d-sm-block">
                                <p>نجوم</p>
                            </div>
                            <div class="main-news-card-title">
                                <a href="single.html">
                                    <p>چرا باید از پیرامون اطراف خود با خبر باشیم ؟</p>
                                </a>
                            </div>
                            <div class="main-news-card-except">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="open-all-archive">
                        <a href="archive.html">
                            <span>مشاهده آرشیو اخبار</span>
                        </a>
                    </div>
                </div>
                <div class="six-news mt-3">
                    <div class="six-news-all row gx-3">
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/108 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/12 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/11 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/102 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/104 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="six-news-card">
                                <div class="six-news-thumbnail">
                                    <a href="single.html">
                                        <img src="{{ asset('modules/home/assets/img/thumbnails/105 copy.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="six-news-top-title">
                                    <p>در یک نظرسنجی مطرح شد</p>
                                </div>
                                <div class="six-news-title">
                                    <a href="single.html">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="news-box col-12 mt-3">
                    <div class="news-box-card-mini">
                        <div class="news-box-header">
                            <i class="fa-duotone fa-newspaper"></i>
                            <span>محبوب ترین ها</span>
                        </div>
                        <div class="new-box-news">
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</span>
                                    </a>
                                </li>
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
                            <a href="#">
                                <div class="social-btns social-instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                    <span>اینستاگرام</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#">
                                <div class="social-btns social-telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                    <span>تلگرام</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#">
                                <div class="social-btns social-twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                    <span>توییتر</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#">
                                <div class="social-btns social-rss">
                                    <i class="fa-solid fa-rss"></i>
                                    <span>آر اس اس</span>
                                </div>
                            </a>
                        </div>
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
            <div class="currency-first-col col-12 col-lg-6">
                <div class="currency-gold-price">
                    <div class="currency-col-title">
                        <p>
                            <i class="fa-duotone fa-coin"></i>
                            <span>قیمت طلا</span>
                        </p>
                    </div>
                    <div class="currency-gold-table mt-3">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>قیمت طلا</th>
                                <th>قیمت زنده</th>
                                <th>تغییر</th>
                                <th class="least">کمترین</th>
                                <th class="most">بیشترین</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>طلای 18 عیار
                                </td>
                                <td>13,919,000</td>
                                <td class="price-change inc">
                                    <i class="price-icon-inc fa-solid fa-chevron-up"></i>
                                    <span class="currency-percent">(0.53%)</span>
                                    <span>74,000</span>
                                </td>
                                <td class="least">37,740</td>
                                <td class="most">38,199</td>
                            </tr>
                            <tr>
                                <th>طلای 24 عیار
                                </td>
                                <td>13,919,000</td>
                                <td class="price-change dec">
                                    <i class="price-icon-inc fa-solid fa-chevron-down"></i>
                                    <span class="currency-percent">(0.24%)</span>
                                    <span>32,000</span>
                                </td>
                                <td class="least">37,740</td>
                                <td class="most">38,199</td>
                            </tr>
                            <tr>
                                <th>طلای دست دوم
                                </td>
                                <td>13,919,000</td>
                                <td class="price-change dec">
                                    <i class="price-icon-inc fa-solid fa-chevron-down"></i>
                                    <span class="currency-percent">(0.23%)</span>
                                    <span>32,000</span>
                                </td>
                                <td class="least">37,740</td>
                                <td class="most">38,199</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="currency-second-col col-12 col-lg-6 mt-3 mt-lg-0">
                <div class="currency-usd-price">
                    <div class="currency-col-title">
                        <p>
                            <i class="fa-duotone fa-square-dollar"></i>
                            <span>قیمت ارز</span>
                        </p>
                    </div>
                    <div class="currency-usd-table mt-3">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>قیمت ارز</th>
                                <th>قیمت زنده</th>
                                <th>تغییر</th>
                                <th class="least">کمترین</th>
                                <th class="most">بیشترین</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>دلار آمریکا
                                </td>
                                <td>32,600</td>
                                <td class="price-change inc">
                                    <i class="price-icon-inc fa-solid fa-chevron-up"></i>
                                    <span class="currency-percent">(0.53%)</span>
                                    <span>1,200</span>
                                </td>
                                <td class="least">31,900</td>
                                <td class="most">32,800</td>
                            </tr>
                            <tr>
                                <th>یورو
                                </td>
                                <td>37,200</td>
                                <td class="price-change dec">
                                    <i class="price-icon-inc fa-solid fa-chevron-down"></i>
                                    <span class="currency-percent">(0.24%)</span>
                                    <span>2,000</span>
                                </td>
                                <td class="least">37,000</td>
                                <td class="most">38,199</td>
                            </tr>
                            <tr>
                                <th>درهم امارات
                                </td>
                                <td>22,000</td>
                                <td class="price-change dec">
                                    <i class="price-icon-inc fa-solid fa-chevron-down"></i>
                                    <span class="currency-percent">(0.24%)</span>
                                    <span>2,400</span>
                                </td>
                                <td class="least">20,200</td>
                                <td class="most">23,400</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="third-row mt-3">
        <div class="sport-section row gx-3">
            <div class="sport-first-col col-12 col-md-8 col-lg-9">
                <div class="sport-news-section">
                    <div class="sport-col-title">
                        <p>
                            <i class="fa-duotone fa-futbol"></i>
                            <span>ورزشی</span>
                        </p>
                        <a href="archive.html" class="main-see-all-link">
                            <span>مشاهده همه</span>
                        </a>
                    </div>
                    <div class="sport-news mt-3">
                        <div class="sport-news-card">
                            <div class="sport-news-card-thumbnail">
                                <a href="single.html">
                                    <img src="{{ asset('modules/home/assets/img/thumbnails/101 copy.jpg') }}" alt="img">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="sport-news-top-title d-none d-sm-block">
                                    <p>نقل و انتقالات اروپا</p>
                                </div>
                                <div class="sport-news-card-title">
                                    <a href="single.html">
                                        <p>پیوستن ارلینگ هالند به منچستر سیتی</p>
                                    </a>
                                </div>
                                <div class="sport-news-card-except">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-news-card">
                            <div class="sport-news-card-thumbnail">
                                <a href="single.html">
                                    <img src="{{ asset('modules/home/assets/img/thumbnails/100 copy.jpg') }}" alt="img">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="sport-news-top-title d-none d-sm-block">
                                    <p>لیگ ملت های والیبال</p>
                                </div>
                                <div class="sport-news-card-title">
                                    <a href="single.html">
                                        <p>پیروزی تیم ملی ایران برابر لهستان</p>
                                    </a>
                                </div>
                                <div class="sport-news-card-except">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-news-card">
                            <div class="sport-news-card-thumbnail">
                                <a href="single.html">
                                    <img src="{{ asset('modules/home/assets/img/thumbnails/108 copy.jpg') }}" alt="img">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="sport-news-top-title d-none d-sm-block">
                                    <p>نقل و انتقالات اروپا</p>
                                </div>
                                <div class="sport-news-card-title">
                                    <a href="single.html">
                                        <p>پیوستن ارلینگ هالند به منچستر سیتی</p>
                                    </a>
                                </div>
                                <div class="sport-news-card-except">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sport-news-card">
                            <div class="sport-news-card-thumbnail">
                                <a href="single.html">
                                    <img src="{{ asset('modules/home/assets/img/thumbnails/108 copy.jpg') }}" alt="img">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="sport-news-top-title d-none d-sm-block">
                                    <p>لیگ ملت های والیبال</p>
                                </div>
                                <div class="sport-news-card-title">
                                    <a href="single.html">
                                        <p>پیروزی تیم ملی ایران برابر لهستان</p>
                                    </a>
                                </div>
                                <div class="sport-news-card-except">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربرد</p>
                                </div>
                            </div>
                        </div>
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
                <a href="archive.html" class="main-see-all-link">
                    <span>مشاهده همه</span>
                </a>
            </div>
            <div class="video-col col-12 col-lg-8 mt-3">
                <div class="main-video-player">
                    <video class="video-js" poster="{{ asset('modules/home/assets/img/thumbnails/12 copy.jpg') }}" width="100%" height="100%" disablePictureInPicture controls controlsList="nodownload noplaybackrate" data-setup="{}">
                        <source src="{{ asset('modules/home/assets/videos/footage.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="main-video-player-title mt-3">
                    <a href="single.html">
                        <span>ازدواج آسان برای جوانان + فیلم</span>
                    </a>
                </div>
                <div class="main-video-player-description">
                    <p>ویدئویی در ارتباط با ازدواج آسان برای جوانان منتشر شده است.</p>
                </div>
            </div>
            <div class="archive-col col-12 col-lg-4 mt-3">
                <div class="main-video-arcive-card">
                    <div class="main-video-arcive-card-thumbnail">
                        <a href="single.html">
                            <img src="{{ asset('modules/home/assets/img/thumbnails/108 copy.jpg') }}" alt="">
                            <div class="video-arcive-card-thumbnail-hover">
                                <i class="fa-solid fa-eye"></i>
                                <span class="video-view-count">158 بازدید</span>
                            </div>
                        </a>
                    </div>
                    <div class="main-video-arcive-card-title">
                        <a href="single.html">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                        </a>
                    </div>
                </div>
                <div class="main-video-arcive-card">
                    <div class="main-video-arcive-card-thumbnail">
                        <a href="single.html">
                            <img src="{{ asset('modules/home/assets/img/thumbnails/11 copy.jpg') }}" alt="">
                            <div class="video-arcive-card-thumbnail-hover">
                                <i class="fa-solid fa-eye"></i>
                                <span class="video-view-count">158 بازدید</span>
                            </div>
                        </a>
                    </div>
                    <div class="main-video-arcive-card-title">
                        <a href="single.html">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                        </a>
                    </div>
                </div>
                <div class="main-video-arcive-card">
                    <div class="main-video-arcive-card-thumbnail">
                        <a href="single.html">
                            <img src="{{ asset('modules/home/assets/img/thumbnails/102 copy.jpg') }}" alt="">
                            <div class="video-arcive-card-thumbnail-hover">
                                <i class="fa-solid fa-eye"></i>
                                <span class="video-view-count">158 بازدید</span>
                            </div>
                        </a>
                    </div>
                    <div class="main-video-arcive-card-title">
                        <a href="single.html">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                        </a>
                    </div>
                </div>
                <div class="main-video-arcive-card">
                    <div class="main-video-arcive-card-thumbnail">
                        <a href="single.html">
                            <img src="{{ asset('modules/home/assets/img/thumbnails/14 copy.jpg') }}" alt="">
                            <div class="video-arcive-card-thumbnail-hover">
                                <i class="fa-solid fa-eye"></i>
                                <span class="video-view-count">158 بازدید</span>
                            </div>
                        </a>
                    </div>
                    <div class="main-video-arcive-card-title">
                        <a href="single.html">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                        </a>
                    </div>
                </div>
                <div class="main-video-arcive-card">
                    <div class="main-video-arcive-card-thumbnail">
                        <a href="single.html">
                            <img src="{{ asset('modules/home/assets/img/thumbnails/11 copy.jpg') }}" alt="">
                            <div class="video-arcive-card-thumbnail-hover">
                                <i class="fa-solid fa-eye"></i>
                                <span class="video-view-count">158 بازدید</span>
                            </div>
                        </a>
                    </div>
                    <div class="main-video-arcive-card-title">
                        <a href="single.html">
                            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                        </a>
                    </div>
                </div>
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
                <a href="archive.html" class="main-see-all-link">
                    <span>مشاهده همه</span>
                </a>
            </div>
            <div class="photo-sec-all mt-lg-0 owl-carousel owl-theme">
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/103 copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>عکس منتخب از مردم در تیر ماه 1401</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/103 (1) copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/11 copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>عکس منتخب از مردم در تیر ماه 1401</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/102 copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/100 copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>عکس منتخب از مردم در تیر ماه 1401</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="photo-sec-col col-12">
                    <div class="photo-sec-card">
                        <div class="photo-sec-thumbnail">
                            <a href="pictures-single.html">
                                <img src="{{ asset('modules/home/assets/img/thumbnails/11 copy.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="photo-sec-title">
                            <a href="pictures-single.html">
                                <i class="fa-duotone fa-image"></i>
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
