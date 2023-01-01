@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/contact-us.css') }}">
@endsection
@section('title')
    تماس با ما
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="contact-us-main-col col-12">
            <div class="contact-us-section">
                <div class="contact-us-section-header">
                    <p>تماس با ما</p>
                </div>
                <div class="contact-us-form-section">
                    <div class="contact-us-form-section-text mt-3">
                        <h2>شما میتوانید در این قسمت پیام های خود را ارسال کنید</h2>
                        <p></p>
                    </div>
                    <br>
                    <form action="{{ route('contact-us.store') }}" method="post" class="row g-3 mt-auto">
                        @csrf

                        <div class="col-12">
                            {{-- validation errors alert --}}
                            @if ($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger  d-flex align-items-center gap-2 mt-3" role="alert">
                                        <span><i class="fa-duotone fa-info-circle"></i></span>
                                        <span>{{ $error }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        @auth
                            <div class="col-12 col-lg-6">
                                <input id="contact-name" name="name" type="text" class="form-control" placeholder="نام و نام خانوادگی" value="{{ old('name', auth()->user()->fullname ?? auth()->user()->name) }}" disabled>
                                <input type="email" name="email" class="form-control" placeholder="ایمیل" value="{{ old('email', auth()->user()->email) }}" disabled>
                                <input type="text" name="subject" class="form-control" placeholder="موضوع" value="{{ old('subject') }}">
                            </div>
                        @endauth

                        @guest
                            <div class="col-12 col-lg-6">
                                <input id="contact-name" name="name" type="text" class="form-control" placeholder="نام و نام خانوادگی" value="{{ old('name') }}">
                                <input type="email" name="email" class="form-control" placeholder="ایمیل" value="{{ old('email') }}">
                                <input type="text" name="subject" class="form-control" placeholder="موضوع" value="{{ old('subject') }}">
                            </div>
                        @endguest

                        <div class="col-12 col-lg-6">
                            <span error-for="contact-textarea" class="contact-error">این مورد را به درستی پر کنید</span>
                            <textarea cols="30" rows="35" id="contact-textarea" placeholder="متن پیام" name="message"></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button id="contact-submit">ارسال پیام</button>
                        </div>
                    </form>
                </div>
                <div class="contact-us-section-header mt-3">
                    <p>راه های ارتباطی</p>
                </div>
                <div class="contact-us-informations row g-3 mt-auto">
                    <div class="contact-us-info col-12 col-lg-6">
                        <div class="contact-us-phonenumber">
                            <svg class="svg-inline--fa fa-square-phone-flip contact-us-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square-phone-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64H64C28.65 32 0 60.65 0 96zM105.5 303.6l54.24-23.25c6.391-2.766 13.9-.9062 18.24 4.484l22.02 26.91c34.63-17 62.77-45.14 79.77-79.75l-26.91-22.05c-5.375-4.391-7.211-11.83-4.492-18.22l23.27-54.28c3.047-6.953 10.59-10.77 17.93-9.062l50.38 11.63c7.125 1.625 12.11 7.891 12.11 15.22c0 126.1-102.6 228.8-228.7 228.8c-7.336 0-13.6-4.984-15.24-12.11l-11.62-50.39C94.71 314.2 98.5 306.6 105.5 303.6z"></path>
                            </svg><!-- <i class="fa-solid fa-square-phone-flip contact-us-icon"></i> -->
                            <span>{{ $setting->mobile }}</span>
                        </div>
                        <div class="contact-us-phonenumber">
                            <svg class="svg-inline--fa fa-square-phone-flip contact-us-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square-phone-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64H64C28.65 32 0 60.65 0 96zM105.5 303.6l54.24-23.25c6.391-2.766 13.9-.9062 18.24 4.484l22.02 26.91c34.63-17 62.77-45.14 79.77-79.75l-26.91-22.05c-5.375-4.391-7.211-11.83-4.492-18.22l23.27-54.28c3.047-6.953 10.59-10.77 17.93-9.062l50.38 11.63c7.125 1.625 12.11 7.891 12.11 15.22c0 126.1-102.6 228.8-228.7 228.8c-7.336 0-13.6-4.984-15.24-12.11l-11.62-50.39C94.71 314.2 98.5 306.6 105.5 303.6z"></path>
                            </svg><!-- <i class="fa-solid fa-square-phone-flip contact-us-icon"></i> -->
                            <span>{{ $setting->phone }}</span>
                        </div>

                        <div class="contact-us-email">
                            <svg class="svg-inline--fa fa-at contact-us-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="at" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"></path>
                            </svg><!-- <i class="fa-solid fa-at contact-us-icon"></i> -->
                            <a href="mailto:{{ $setting->email }}">
                                <span><span class="__cf_email__" data-cfemail="8dfde4f8e4fee4f9e8cdeae0ece4e1a3eee2e0">{{ $setting->email }}</span></span>
                            </a>
                        </div>
                        <hr>
                        <div class="contact-us-address">
                            <svg class="svg-inline--fa fa-map-location contact-us-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-location" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M273.2 311.1C241.1 271.9 167.1 174.6 167.1 120C167.1 53.73 221.7 0 287.1 0C354.3 0 408 53.73 408 120C408 174.6 334.9 271.9 302.8 311.1C295.1 321.6 280.9 321.6 273.2 311.1V311.1zM416 503V200.4C419.5 193.5 422.7 186.7 425.6 179.8C426.1 178.6 426.6 177.4 427.1 176.1L543.1 129.7C558.9 123.4 576 135 576 152V422.8C576 432.6 570 441.4 560.9 445.1L416 503zM15.09 187.3L137.6 138.3C140 152.5 144.9 166.6 150.4 179.8C153.3 186.7 156.5 193.5 160 200.4V451.8L32.91 502.7C17.15 508.1 0 497.4 0 480.4V209.6C0 199.8 5.975 190.1 15.09 187.3H15.09zM384 504.3L191.1 449.4V255C212.5 286.3 234.3 314.6 248.2 331.1C268.7 357.6 307.3 357.6 327.8 331.1C341.7 314.6 363.5 286.3 384 255L384 504.3z"></path>
                            </svg><!-- <i class="fa-solid fa-map-location contact-us-icon"></i> -->
                            <span>{{ $setting->address }}</span>
                        </div>

                    </div>
                    <div class="contact-us-map col-12 col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d435.065044839531!2d51.2150429!3d29.2670473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb40fd940e8d46d%3A0x70c51a775e324fc1!2z2qnZhNuM2YbbjNqpINiq2K7Ytdi124wg2K_Zhtiv2KfZhtm-2LLYtNqp24wg2b7Yp9ix2LM!5e0!3m2!1sen!2sde!4v1671474207426!5m2!1sen!2sde" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
