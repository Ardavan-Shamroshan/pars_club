@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/single.css') }}">
@endsection
@section('title')
    مجله و خبرنامه
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="single-main-col col-12 col-lg-9">
            <div class="single-section">
                <div class="single-tools-breadcrumb">
                    <div class="single-bread-crumb">
                        <a href="{{ route('home') }}"><span>خانه</span></a>
                        <a href="{{ route('post')  }}"><span>مجله و خبر نامه</span></a>
                        <a><span>{{ $post->title }}</span></a>

                    </div>
                    <div class="single-tools">
                        <svg class="svg-inline--fa fa-clock" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                        </svg><!-- <i class="fa-solid fa-clock"></i> -->
                        <p>
                            <span>{{ jalaliDate($post->published_at, 'd M Y') }}</span>
                            <span>-</span>
                            <span>{{ jalaliDate($post->published_at, 'H:i') }}</span>
                        </p>
                    </div>
                </div>
                <div class="single-title mt-4">
                    <h1>{{ $post->title }}. </h1>
                </div>
                <hr>

                <div class="comments-user-name mt-3">
                    <p>
                        <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <g class="fa-duotone-group">
                                <path class="fa-secondary" fill="currentColor" d="M352 128c0 70.69-57.3 128-128 128C153.3 256 96 198.7 96 128s57.31-128 128-128C294.7 0 352 57.31 352 128z"></path>
                                <path class="fa-primary" fill="currentColor" d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                            </g>
                        </svg><!-- <i class="fa-duotone fa-user"></i> -->
                        <span class="text-black-50 small">{{ $post->author->fullname ?? $post->author->name ?? '-' }}</span>
                    </p>
                </div>

                <div class="single-abstract mt-3">
                    <p><?= html_entity_decode($post->summary) ?>.</p>
                </div>
                <div class="single-image mt-3">
                    <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                </div>

                <hr>
                <div class="single-content mt-3">
                    <?= html_entity_decode($post->body) ?>
                </div>
                <hr>

                <div class="single-tags">
                    @php
                        $tags = explode(',', $post->tags);
                    @endphp

                    @foreach($tags as $tag)
                        <a href="#">
                            <span>{{ $tag }}</span>
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="share-post mt-3">
                <div class="share-post-title">
                    <span>اشتراک گذاری</span>
                </div>
                <div class="share-post-buttons-link">
                    {{--                    <div class="share-post-link">--}}
                    {{--                        <button class="share-link" btn-tooltip="کپی">--}}
                    {{--                            <span>https://piui.ir/aHnfviH42sS</span>--}}
                    {{--                            <svg class="svg-inline--fa fa-link-simple" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link-simple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">--}}
                    {{--                                <path fill="currentColor" d="M0 256C0 167.6 71.63 96 160 96H256C273.7 96 288 110.3 288 128C288 145.7 273.7 160 256 160H160C106.1 160 64 202.1 64 256C64 309 106.1 352 160 352H256C273.7 352 288 366.3 288 384C288 401.7 273.7 416 256 416H160C71.63 416 0 344.4 0 256zM480 416H384C366.3 416 352 401.7 352 384C352 366.3 366.3 352 384 352H480C533 352 576 309 576 256C576 202.1 533 160 480 160H384C366.3 160 352 145.7 352 128C352 110.3 366.3 96 384 96H480C568.4 96 640 167.6 640 256C640 344.4 568.4 416 480 416zM416 224C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H224C206.3 288 192 273.7 192 256C192 238.3 206.3 224 224 224H416z"></path>--}}
                    {{--                            </svg><!-- <i class="fa-solid fa-link-simple"></i> -->--}}
                    {{--                            <div class="tooltip-div"><span>کپی</span></div>--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}
                    <div class="share-post-buttons">
                        <button class="share-twitter">
                            <a href="https://twitter.com/intent/tweet?text=Awesome%20Blog!&url={{ route('post.show', $post) }}">
                                <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                                </svg><!-- <i class="fa-brands fa-twitter"></i> -->
                            </a>
                        </button>
                        <button class="share-telegram">
                            <a href="https://t.me/share/url?url={{ route('post.show', $post) }}&text=Awesome%20blog!">
                                <svg class="svg-inline--fa fa-telegram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="telegram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M248 8C111 8 0 119 0 256S111 504 248 504 496 392.1 496 256 384.1 8 248 8zM362.1 176.7c-3.732 39.22-19.88 134.4-28.1 178.3-3.476 18.58-10.32 24.82-16.95 25.42-14.4 1.326-25.34-9.517-39.29-18.66-21.83-14.31-34.16-23.22-55.35-37.18-24.49-16.14-8.612-25 5.342-39.5 3.652-3.793 67.11-61.51 68.33-66.75 .153-.655 .3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283 .746-104.6 69.14-14.85 10.19-26.89 9.934c-8.855-.191-25.89-5.006-38.55-9.123-15.53-5.048-27.88-7.717-26.8-16.29q.84-6.7 18.45-13.7 108.4-47.25 144.6-62.3c68.87-28.65 83.18-33.62 92.51-33.79 2.052-.034 6.639 .474 9.61 2.885a10.45 10.45 0 0 1 3.53 6.716A43.76 43.76 0 0 1 362.1 176.7z"></path>
                                </svg><!-- <i class="fa-brands fa-telegram"></i> -->
                            </a>
                        </button>
                        <button class="share-whatsapp">
                            <a href="https://wa.me/?text=Awesome%20Blog!%5Cn%20{{ route('post.show', $post) }}">
                                <svg class="svg-inline--fa fa-whatsapp" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                </svg><!-- <i class="fa-brands fa-whatsapp"></i> -->
                            </a>
                        </button>
                        <button class="share-facebook">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.show', $post) }}&quote=Awesome%20Blog!">
                                <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                                </svg><!-- <i class="fa-brands fa-facebook"></i> -->
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="related-news mt-3">
                <div class="related-news-haeder">
                    <span>اخبار مرتبط</span>
                </div>
                <div class="row gx-3">

                    @foreach($editorSuggests as $suggest)

                        <div class="col-12 col-lg-4">
                            <div class="related-news-card">
                                <div class="related-news-thumbnail">
                                    <a href="{{ route('post.show', $suggest) }}">
                                        <img src="{{ asset($suggest->image['indexArray']['medium']) }}" alt="{{ $suggest->title }}">
                                    </a>
                                </div>
                                <div class="related-news-title mt-3">
                                    <a href="{{ route('post.show', $suggest) }}">
                                        <p>{{ $suggest->title }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

            @if($post->commentable)

                @guest
                    <div class="single-user-comments-title mt-3">
                        <span>دیدگاه ها</span>
                    </div>
                    <div class="alert alert-warning  d-flex align-items-center gap-2 mt-3" role="alert">
                        <span><i class="fa-duotone fa-info-circle"></i></span>
                        <span>جهت ارسال نظر و دیدگاه خود باید ابتدا وارد سایت شوید. جهت ورود به سایت  <a href="{{ route('auth.login-register') }}" class="alert-link btn-link"> اینجا </a> را کلیک کنید
                       </span>
                    </div>
                @endguest
                @auth
                    <div class="single-comment-section mt-3">
                        <div class="single-comment-section-header">
                            <span>دیدگاه خود را بنویسید</span>
                        </div>
                        <div class="single-comment-section-form">
                            <form action="{{ route('comment.store', $post) }}" method="post">
                                @csrf

                                <div class="col-12 px-3">
                                    <textarea name="body" id="single-comments" class="single-comments" cols="30" rows="10" placeholder="دیدگاه خود را در این قسمت بنویسید"></textarea>
                                </div>
                                <div class="col-12 px-3 d-flex justify-content-end">
                                    <button id="comment-submit" class="comment-submit" type="submit">
                                        <span>ارسال</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth

                <div class="single-user-comments mt-3">
                    <div class="single-user-comments-title">
                        <span>دیدگاه کاربران</span>
                    </div>

                    @forelse($post->comments()->where('approved', 1)->get() as $comment)
                        <div class="single-user-comments-card">

                            {{-- if comment has no father --}}
                            @if($comment->parent == null)
                                <div class="comments-user-name-date">
                                    <div class="comments-user-name">
                                        <p>
                                            <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <g class="fa-duotone-group">
                                                    <path class="fa-secondary" fill="currentColor" d="M352 128c0 70.69-57.3 128-128 128C153.3 256 96 198.7 96 128s57.31-128 128-128C294.7 0 352 57.31 352 128z"></path>
                                                    <path class="fa-primary" fill="currentColor" d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                                </g>
                                            </svg><!-- <i class="fa-duotone fa-user"></i> -->
                                            <span>{{ $comment->author->fullname ?? $comment->author->name ?? '' }}</span>
                                        </p>
                                    </div>
                                    <div class="comments-date">
                                        <svg class="svg-inline--fa fa-clock d-none d-lg-block" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                        </svg><!-- <i class="fa-solid fa-clock d-none d-lg-block"></i> -->
                                        <p>
                                            <span>{{ jalaliDate($comment->published_at, 'd M Y') }}</span>
                                            <span>-</span>
                                            <span>{{ jalaliDate($comment->published_at, 'H:i') }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="comments-content">
                                    <p>{{ $comment->body }}</p>
                                </div>

                                {{-- answer button --}}
                                <div class="comments-replybtn-like">
                                    <div class="comments-reply-btn">
                                        <button>
                                            <svg class="svg-inline--fa fa-message-dots" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="message-dots" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <g class="fa-duotone-group">
                                                    <path class="fa-secondary" fill="currentColor" d="M447.1 0h-384c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.1c0 9.749 11.25 15.45 19.12 9.7l124.9-93.7h144c35.25 0 64-28.75 64-63.1V63.1C511.1 28.75 483.2 0 447.1 0zM127.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S145.7 239.1 127.1 239.1zM255.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S273.7 239.1 255.1 239.1zM383.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S401.7 239.1 383.1 239.1z"></path>
                                                    <path class="fa-primary" fill="currentColor" d="M127.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S145.7 239.1 127.1 239.1zM255.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S273.7 239.1 255.1 239.1zM383.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S401.7 239.1 383.1 239.1z"></path>
                                                </g>
                                            </svg><!-- <i class="fa-duotone fa-message-dots"></i> -->
                                            <span>پاسخ دهید</span>
                                        </button>
                                    </div>
                                    <div class="comments-like-btn d-none">
                                        <button btn-tooltip="پسندیدن">
                                            <span style="display: block;">1</span>
                                            <svg class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                                            </svg><!-- <i class="fa-solid fa-heart"></i> -->
                                            <div class="tooltip-div"><span>پسندیدن</span></div>
                                        </button>
                                    </div>
                                </div>

                                {{-- answer form --}}
                                <div class="comments-reply-form">
                                    <form action="{{ route('comment.answer', $comment) }}" method="post">
                                         @csrf
                                        <div class="col-12 d-flex flex-wrap">
                                        </div>
                                        <div class="col-12 px-3">
                                            <textarea name="body" class="reply-comments" cols="30" rows="10" placeholder="دیدگاه ها خود را در این قسمت بنویسید"></textarea>
                                        </div>
                                        <div class="col-12 px-3 d-flex justify-content-end">
                                            <button class="reply-submit" type="submit">
                                                <span>ارسال</span>
                                            </button>
                                            <button class="btn btn-outline-danger reply-cancel" type="reset">
                                                <span>انصراف</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                {{-- replies --}}
                                @if($comment->answers)
                                    @foreach($comment->answers()->where('approved', 1)->get() as $answer)
                                        <div class="comments-reply-card">
                                            <div class="comments-reply-card-icon col-1">
                                                <svg class="svg-inline--fa fa-arrow-turn-up" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="arrow-turn-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                                    <g class="fa-duotone-group">
                                                        <path class="fa-secondary" fill="currentColor" d="M224 109.3V432c0 44.13-35.89 80-80 80H32c-17.67 0-32-14.31-32-32s14.33-32 32-32h112C152.8 448 160 440.8 160 432V109.3l31.1-32L224 109.3z"></path>
                                                        <path class="fa-primary" fill="currentColor" d="M214.6 9.375c-12.5-12.5-32.75-12.5-45.25 0l-127.1 128c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l105.4-105.4l105.4 105.4C303.6 188.9 311.8 192 319.1 192s16.38-3.125 22.62-9.375c12.5-12.5 12.5-32.75 0-45.25L214.6 9.375z"></path>
                                                    </g>
                                                </svg><!-- <i class="fa-duotone fa-arrow-turn-up"></i> -->
                                            </div>
                                            <div class="comments-reply-content-card col-11">
                                                <div class="comments-user-name-date">
                                                    <div class="comments-user-name">
                                                        <p>
                                                            <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                <g class="fa-duotone-group">
                                                                    <path class="fa-secondary" fill="currentColor" d="M352 128c0 70.69-57.3 128-128 128C153.3 256 96 198.7 96 128s57.31-128 128-128C294.7 0 352 57.31 352 128z"></path>
                                                                    <path class="fa-primary" fill="currentColor" d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                                                </g>
                                                            </svg><!-- <i class="fa-duotone fa-user"></i> -->
                                                            <span>{{ $answer->author->fullname ?? $answer->author->name ?? '-' }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="comments-date">
                                                        <svg class="svg-inline--fa fa-clock d-none d-lg-block" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                                        </svg><!-- <i class="fa-solid fa-clock d-none d-lg-block"></i> -->
                                                        <p>
                                                        <p>
                                                            <span>{{ jalaliDate($answer->published_at, 'd M Y') }}</span>
                                                            <span>-</span>
                                                            <span>{{ jalaliDate($answer->published_at, 'H:i') }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p>{{ $answer->body }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- only because template --}}
                            @else
                                <div class="comments-user-name-date d-none">
                                    <div class="comments-user-name">
                                        <p>
                                            <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <g class="fa-duotone-group">
                                                    <path class="fa-secondary" fill="currentColor" d="M352 128c0 70.69-57.3 128-128 128C153.3 256 96 198.7 96 128s57.31-128 128-128C294.7 0 352 57.31 352 128z"></path>
                                                    <path class="fa-primary" fill="currentColor" d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                                                </g>
                                            </svg><!-- <i class="fa-duotone fa-user"></i> -->
                                        </p>
                                    </div>
                                    <div class="comments-date">
                                        <svg class="svg-inline--fa fa-clock d-none d-lg-block" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                        </svg><!-- <i class="fa-solid fa-clock d-none d-lg-block"></i> -->
                                        <p></p>
                                    </div>
                                </div>
                                <div class="comments-content d-none"></div>
                                {{-- answer button --}}
                                <div class="comments-replybtn-like d-none">
                                    <div class="comments-reply-btn">
                                        <button>
                                            <svg class="svg-inline--fa fa-message-dots" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="message-dots" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <g class="fa-duotone-group">
                                                    <path class="fa-secondary" fill="currentColor" d="M447.1 0h-384c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.1c0 9.749 11.25 15.45 19.12 9.7l124.9-93.7h144c35.25 0 64-28.75 64-63.1V63.1C511.1 28.75 483.2 0 447.1 0zM127.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S145.7 239.1 127.1 239.1zM255.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S273.7 239.1 255.1 239.1zM383.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S401.7 239.1 383.1 239.1z"></path>
                                                    <path class="fa-primary" fill="currentColor" d="M127.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S145.7 239.1 127.1 239.1zM255.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S273.7 239.1 255.1 239.1zM383.1 239.1c-17.75 0-32-14.25-32-31.1s14.25-31.1 32-31.1s32 14.25 32 31.1S401.7 239.1 383.1 239.1z"></path>
                                                </g>
                                            </svg><!-- <i class="fa-duotone fa-message-dots"></i> -->
                                            <span>پاسخ دهید</span>
                                        </button>
                                    </div>
                                    <div class="comments-like-btn d-none">
                                        <button btn-tooltip="پسندیدن">
                                            <span style="display: block;">1</span>
                                            <svg class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                                            </svg><!-- <i class="fa-solid fa-heart"></i> -->
                                            <div class="tooltip-div"><span>پسندیدن</span></div>
                                        </button>
                                    </div>
                                </div>
                                {{-- answer form --}}
                                <div class="comments-reply-form d-none">
                                    <form action="#">
                                        <div class="col-12 d-flex flex-wrap">
                                            <div class="col-12 col-lg-6 p-3">
                                                <input type="text" placeholder="نام و نام خانوادگی">
                                            </div>
                                            <div class="col-12 col-lg-6 pt-0 pt-lg-3 p-3">
                                                <input type="email" placeholder="ایمیل">
                                            </div>
                                        </div>
                                        <div class="col-12 px-3">
                                            <textarea name="comments" class="reply-comments" cols="30" rows="10" placeholder="دیدگاه ها خود را در این قسمت بنویسید"></textarea>
                                        </div>
                                        <div class="col-12 px-3 d-flex justify-content-end">
                                            <button class="reply-submit" type="submit">
                                                <span>ارسال</span>
                                            </button>
                                            <button class="reply-cancel" type="reset">
                                                <span>انصراف</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>

                    @empty

                        <div class="alert alert-warning  d-flex align-items-center gap-2 mt-3" role="alert">
                            <span><i class="fa-duotone fa-info-circle"></i></span>
                            <span>دیدگاهی وارد نشده است. دیدگاه خود را در قسمت بالا وارد کنید </span>
                        </div>

                    @endforelse

                </div>
            @endif

        </div>

        @include('post::layouts.sidebar', ['latestPosts' => $latestPosts, 'hotPosts' => $hotPosts])

    </div>
@endsection