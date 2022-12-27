@extends('auth::layouts.master')
@section('title')
    ورود | ثبت نام
@endsection
@section('content')

    <div class="error-page1 bg-light text-dark">
        <!-- Page -->
        <div class="page">

            <!-- container -->
            <div class="container-fluid">

                <div class="row no-gutter">
                    <!-- The image half -->
                    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                        <div class="row wd-100p mr-center text-center">
                            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mr-center wd-100p">
                                <img src="{{ asset('modules/admin/assets/img/media/login.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mr-center" alt="logo">
                            </div>
                        </div>
                    </div>
                    <!-- The content half -->
                    <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                        <div class="login d-flex align-items-center py-2">
                            <!-- Demo content-->
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-md-10 col-lg-10 col-xl-9 mr-center">
                                        <div class="card-sigin">
                                            <div class="card-sigin">
                                                <div class="card-sigin d-flex mb-5">
                                                    <a href="{{ route('home') }}"><img src="{{ asset('modules/home/img/clubs-logos/club_logo.jpg') }}" class="sign-favicon-a" alt="logo" width="100">
                                                        <img src="{{ asset('modules/admin/assets/img/brand/favicon-white.png') }}" class="sign-favicon-b ht-40" alt="logo">
                                                    </a>
{{--                                                    <h1 class="main-logo1 ms-1 me-0 my-auto tx-28 ps-1">باشگاه فرهنگی ورزشی پارس برازجان</h1>--}}
                                                </div>
                                                <div class="card-sigin">
                                                    <div class="main-signup-header">
                                                        <h2>خوش آمدی!</h2>
                                                        <h5 class="fw-semibold mb-4">ورود | ثبت نام</h5>

                                                        {{-- validation errors alert --}}
                                                        @if ($errors->any())
                                                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                                                <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                                                                    <span aria-hidden="true">×</span></button>

                                                                @foreach($errors->all() as $error)
                                                                    <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        @endif

                                                        <form action="{{ route('auth.login-register') }}" method="post">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label>نام و نام خانوادگی خود را وارد کنید*</label> <input class="form-control @error('id') border border-danger @enderror" name="name" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>پست الکترونیک خود را وارد کنید*</label> <input class="form-control @error('id') border border-danger @enderror" name="id" type="text">
                                                            </div>
                                                            <button type="submit" class="btn btn-main-primary btn-block">ورود</button>
                                                        </form>
                                                        <div class="main-signin-footer mt-5">
                                                            <p>ورود شما به معنای پذیرش <a href="#"> پذیرش شرایط باشگاه پارس  </a> و <a href="#"> قوانین حریم‌ خصوصی  </a> است</p>
                                                        </div>
                                                        <div class="main-signin-footer mt-5">
                                                            <a href="{{ route('home') }}">بازگشت<i class="fe fe-arrow-left"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End -->
                            </div>
                        </div><!-- End -->
                    </div>
                </div>

            </div>
            <!-- container -->


        </div>


    </div>
    <!-- class -->


@endsection