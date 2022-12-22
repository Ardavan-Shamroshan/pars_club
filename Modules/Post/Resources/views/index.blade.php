@extends('home::layouts.master')
@section('title')
    مجله و خبرنامه
@endsection
@section('content')

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('post') }}">مجله و خبرنامه</a></li>
            @if(isset($postcategory))
                <li class="breadcrumb-item">دسته {{ $postcategory->name }}</li>
            @endif
        </ol>
    </nav>
    <!-- breadcrumb -->

    <div class="container paddin-mini">
        <div class="row">

            <!-- right aside -->
            <aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">

                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4><i class="fe fe-list"></i>دسته بندی ها</h4>
                    </div>
                    <div class="info-panel">
                        <ul class="list-news">

                            @forelse($categories as $category)
                                <li><i class="fa fa-circle"></i><a href="{{ route('postcategory', $category) }}">{{ $category->name }}</a></li>
                            @empty
                                <small>
                                    درحال حاضر دسته بندی برای نمایش وجود ندارد! @admin<a href="{{ route('admin.postcategory') }}" class="btn-link links links-footer text-primary">وارد کردن دسته بندی</a> @endadmin
                                </small>
                            @endforelse

                        </ul>
                    </div>
                </div>

                @include('home::layouts.right-sidebar')

            </aside>

            <div class="col-lg-5 col-xl-6 col-sm-12 ">

                <!-- last news -->
                <div class="panel-box rounded">
                    <div class="titles bg-light">
                      @if(isset($postcategory))
                            <h4><i class="fe fe-bookmark"></i>  اخبار دسته بندی <a class="text-primary" href="{{ route('postcategory', $postcategory) }}">{{ $postcategory->name }}</a></h4>
                        @else
                            <h4><i class="fe fe-bookmark"></i> آخرین اخبار</h4>
                      @endif
                    </div>

                    @forelse($posts as $post)
                        <div class="post-item">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">
                                        <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                                    </h4>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="img-hover rounded">
                                        <img src="{{ asset($post->image['indexArray']['large']) }}" alt="{{ $post->title }}" class="img-responsive">
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                                <div class="col-md-8 pt-sm-2 col-8">
                                    <small>{{ $post->summary }}</small>
                                    <span class="data-info d-flex justify-content-between mt-4">
                                            <small class="font-weight-bold">
                                                <i class="fe fe-edit text-navy"></i>{{ $post->author->fullname ?? $post->author->name }}
                                            </small> <small class="font-weight-bold">
                                                <i class="fe fe-clock text-navy"></i>{{ jalaliDate($post->published_at, 'H:i - Y/m/d') }}
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fe fe-message-circle text-navy"></i> {{ $post->comments()->count() }}
                                            </small>
                                        </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="post-item">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">
                                        <a href="#">عنوان خبر</a>
                                    </h4>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="img-hover rounded">
                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="عنوان" class="img-responsive">
                                        <div class="overlay"></div>
                                    </div>
                                </div>
                                <div class="col-md-8 pt-sm-2 col-8">
                                    <small>
                                        درحال حاضر خبری برای نمایش وجود ندارد! @admin
                                        <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                                    </small>
                                    <span class="data-info d-flex justify-content-between mt-4">
                                            <small class="font-weight-bold">
                                                <i class="fe fe-edit text-navy"></i>نویسنده
                                            </small> <small class="font-weight-bold">
                                                <i class="fe fe-clock text-navy"></i>تاریخ انتشار
                                            </small>
                                            <small class="font-weight-bold">
                                                <i class="fe fe-message-circle text-navy"></i> نظرات
                                            </small>
                                        </span>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                {{ $posts->links('vendor.pagination.bootstrap-5', ['elements' => $posts]) }}

            </div>

            <!-- left aside -->
            <aside class="col-sm-12 col-lg-3 col-xl-3 dark-home py-2 rounded h-100">
                @include('home::layouts.left-sidebar')
            </aside>
        </div>
    </div>

@endsection