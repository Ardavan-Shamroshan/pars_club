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
                                                        <h2>کد تایید را وارد کن!</h2>
                                                        <h5 class="fw-semibold mb-4">
                                                            @if($otp->type === 0)
                                                               <small> کد تایید برای شماره {{ $otp->login_id }} پیامک شد</small>
                                                            @else
                                                              <small>  کد تایید برای ایمیل {{ $otp->login_id }} ارسال شد</small>
                                                               <small class="tag tag-section tx-12"> اگر ایمیل را مشاهده نکردید، تب <span class="mx-1"><i class="fe fe-alert-octagon"></i>spam</span> را چک کنید </small>
                                                            @endif
                                                        </h5>


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


                                                        <form action="{{ route('auth.login-confirm', $token) }}"  method="post">
                                                            @csrf

                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="کد تایید را وارد کن" name="otp" type="text">
                                                            </div>
                                                            <button type="submit" class="btn btn-main-primary btn-block">تایید</button>


                                                            <div id="resend-otp" class="d-none mt-3">
                                                                <a href="{{ route('auth.login-resend-otp', $token) }}" class="text-decoration-none text-primary">دریافت مجدد کد تایید</a>
                                                            </div>

                                                            <div id="timer" class="mt-4"></div>

                                                        </form>
                                                        <div class="main-signin-footer mt-5">
                                                            <p>ورود شما به معنای پذیرش
                                                                <a href="#"> پذیرش شرایط باشگاه پارس </a> و
                                                                <a href="#"> قوانین حریم‌ خصوصی </a> است</p>
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

@section('script')
    @php
        // 5 minutes after otp code created_at time MINUS now() time "all times are im timestamp" and *1000 to get times in ms
        $timer = ((new \Carbon\Carbon($otp->created_at))->addMinutes(5)->timestamp - \Carbon\Carbon::now()->timestamp) * 1000
    @endphp

    <script>

        var countDownDate = new Date().getTime() + {{ $timer }};
        var timer = $('#timer');
        var resend_otp = $('#resend-otp');

        var x = setInterval(function () {
            var now = new Date().getTime(); // current time
            var distance = countDownDate - now; // period time between otp created time and current time

            // extract seconds and minutes from timestamp format
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // convert numbers(seconds and minutes) in minimum two digits => 02:56, 00:32
            minutes = minutes.toLocaleString(undefined, {minimumIntegerDigits: 2})
            seconds = seconds.toLocaleString(undefined, {minimumIntegerDigits: 2})

            if (minutes === 0)
                timer.html(seconds + ' : ' + minutes + ' تا  ارسال مجدد کد تایید');
            else
                timer.html(seconds + ' : ' + minutes + ' تا  ارسال مجدد کد تایید');

            if (distance < 0) {
                clearInterval(x);
                timer.addClass('d-none');
                resend_otp.removeClass('d-none');
            }
        }, 1000);

    </script>

@endsection