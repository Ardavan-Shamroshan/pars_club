@extends('home::layouts.master')
@section('title')
    خبرنامه | داشبورد مدیریت
@endsection
@section('content')

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('post') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item">{{ $post->title }}</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <div class="container paddin-mini">
        <div class="row">

            <!-- right aside -->
            <aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">
                @include('home::layouts.right-sidebar')
            </aside>

            <div class="col-lg-5 col-xl-6 col-sm-12 ">
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>{{ $post->title }}</h4>
                    </div>

                    <div class="info-panel">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- author info -->
                            <div class="d-flex justify-content-start align-items-center" style="gap: 0.5rem">
                                <img alt="{{ $post->author->fullname ?? $post->author->name ?? '-' }}" class="avatar rounded-circle border border-primary" src="{{ $post->author->profile_photo_url }}">
                                <small>{{ $post->author->fullname ?? $post->author->name ?? '-' }}</small>
                            </div>
                            <div>
                                <small class="font-weight-bold">
                                    <i class="fa fa-comment text-navy"></i> {{ $post->comments()->count() }}
                                </small>
                            </div>
                        </div>

                        <!-- post image -->
                        <div class="text-center rounded border mb-3">
                            <img src="{{ asset($post->image['indexArray']['large']) }}" alt="{{ $post->title }}" class="rounded">
                        </div>

                        <!-- post detail -->
                        <div class="mb-2">
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb" class="text-info">
                                <ol class="breadcrumb breadcrumb-style1">
                                    <li class="breadcrumb-item">
                                        کد خبر: {{ $post->id }}
                                    </li>
                                    <li class="breadcrumb-item">
                                        زمان انتشار: {{ jalaliDate($post->published_at,'', true)  }}
                                    </li>
                                </ol>
                            </nav>
                            <!-- breadcrumb -->
                        </div>

                        <div class="text-body">
                            {!! $post->body !!}
                        </div>

                        <!-- post tags -->
                        @php
                            $tags = explode(',', $post->tags);
                        @endphp
                        <div class="d-flex justify-content-start align-items-center" style="gap: 0.5rem">
                            <span>برچسب ها</span>
                            @foreach($tags as $tag)
                                <span><a href="#" class="badge badge-light border"> <i class="fe fe-hash"></i>{{$tag}}</a></span>
                            @endforeach
                        </div>

                        <hr>

                        <div class=" no-margin">
                            <h4> مطالب پیشنهادی</h4>
                        </div>
                        <div class="info-panel py-1 px-0">
                            <ul class="list-news">
                                @forelse($relatedPosts as $related)
                                    <li class="d-flex justify-content-between">
                                        <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $related) }}"> {{ $related->title }} </a></small>
                                        <small>{{ jalaliDate($related->published_at, '', true) }} - {{ $related->comments->count() }} دیدگاه</small>
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

                @if($post->checkCommentable)
                    @if($post->comments->isNotEmpty())
                        <div class="panel-box">
                            <div class="titles">
                                <h4>نظرات</h4>
                            </div>

                            <ul class="testimonials">
                                <li>
                                    <blockquote>
                                        <p>لیونل مسی و کریستیانو رونالدو خواهد آمد چهره به چهره برای اولین بار در جام جهانی تنها در صورتی خود را در دو کشور پایان در همان موقعیت در گروه فاز یا اول یا دوم.!.</p>
                                        <img src="img/testimonials/1.jpg" alt="">
                                        <strong>federic gordon</strong><a href="#">@iwthemes</a></blockquote>
                                </li>
                                <li>
                                    <blockquote>
                                        <p>پس از جلسات قبلی در مرحله بزرگ است و افتخارات حتی: برزیل برنده نهایی از کره/ژاپن 2002 2-0 در حالی که آلمان ثبت شده است که معروف پیروزی در برزیل 2014!.</p>
                                        <img src="img/testimonials/2.jpg" alt="">
                                        <strong>federic gordon</strong><a href="#">@iwthemes</a></blockquote>
                                </li>
                                <li>
                                    <blockquote>
                                        <p>به کمک آتش تصورات خود را و شما اجازه دیدن اگر وجود دارد یک پتانسیل حذفی بازی شما ممکن است وسوسه به خرید بلیط برای, fifa.com آمده است تا با یک لیست از امکان last-16 و یک چهارم نهایی دوئل بین برخی از بازی بزرگترین جاذبه های.!.</p>
                                        <img src="img/testimonials/3.jpg" alt="">
                                        <strong>federic gordon</strong><a href="#">@iwthemes</a></blockquote>
                                </li>
                            </ul>
                        </div>
                    @endif

                    @auth
                        <div class="panel-box padding-b">

                            <div class="titles">
                                <h4>ارسال دیدگاه</h4>
                            </div>
                            <div class="info-panel">

                                <form class="form-theme">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>دیدگاهتان را بنویسید *</label>
                                            <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;" required="required"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-group btn-success"><small>ارسال دیدگاه</small>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endauth
                @endif

            </div>

            <!-- left aside -->
            <aside class="col-sm-12 col-lg-3 col-xl-3 dark-home py-2 rounded h-100">
                @include('home::layouts.left-sidebar')
            </aside>
        </div>
    </div>

@endsection