@extends('home::layouts.master')
@section('title')
    تماس با ما
@endsection
@section('content')

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i></a></li>
            <li class="breadcrumb-item">تماس با ما</li>
        </ol>
    </nav>
    <!-- breadcrumb -->


    <section class="content-info">
        <div class="container">
            <div class="row p-0">
                <div class="col-md-4">
                    <aside class="panel-box">
                        <div class="titles no-margin">
                            <h4>دفتر</h4>
                        </div>
                        <div class="info-panel">
                            <address>
                                <iframe src="{{ 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d435.065044839531!2d51.2150429!3d29.2670473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb40fd940e8d46d%3A0x70c51a775e324fc1!2z2qnZhNuM2YbbjNqpINiq2K7Ytdi124wg2K_Zhtiv2KfZhtm-2LLYtNqp24wg2b7Yp9ix2LM!5e0!3m2!1sen!2sde!4v1671474207426!5m2!1sen!2sde'}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <i class="fa fa-plane"></i><strong>نشانی:</strong>{{ $setting->address }}<br>
                                <i class="fa fa-phone"></i><strong>تلفن:</strong>
                                <abbr title="Phone"></abbr>{{ $setting->phone }}
                                <br> <i class="fa fa-mobile"></i><strong>موبایل:</strong>
                                <abbr title="Phone"></abbr>{{ $setting->mobile }}
                                <br> <i class="fa fa-mail-bulk"></i><strong>ایمیل:</strong>
                                <abbr title="Phone"></abbr>{{ $setting->email }}
                            </address>
                        </div>
                    </aside>

                </div>

                <div class="col-md-8">
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>فرم تماس</h4>
                        </div>
                        <div class="info-panel">
                            {{-- form --}}
                            <form action="{{ route('contact-us.store') }}" id="form" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        {{-- validation errors alert --}}
                                        @if ($errors->any())
                                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                                <button aria-label="بستن" class="close text-left" data-dismiss="alert" type="button">
                                                    <span aria-hidden="true">×</span></button>
                                                <br>
                                                <br>

                                                @foreach($errors->all() as $error)
                                                    <div>
                                                        <span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                                    </div>
                                                @endforeach

                                            </div>
                                        @endif

                                        <div class="row">
                                            @auth
                                                <div class="col-md-6 my-3">
                                                    <label class="font-weight-bold">اسم شما
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ old('name', auth()->user()->fullname ?? auth()->user()->name) }}" class="form-control rounded" name="name" disabled>
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label class="font-weight-bold">آدرس ایمیل شما
                                                        <span class="text-danger">*</span></label>
                                                    <input type="email" value="{{ old('subject', auth()->user()->email) }}" class="form-control rounded" name="email" disabled>
                                                </div>
                                            @endauth
                                            @guest
                                                <div class="col-md-6 my-3">
                                                    <label class="font-weight-bold">اسم شما
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{ old('name') }}" class="form-control rounded" name="name">
                                                </div>
                                                <div class="col-md-6 my-3">
                                                    <label class="font-weight-bold">آدرس ایمیل شما
                                                        <span class="text-danger">*</span></label>
                                                    <input type="email" value="{{ old('email') }}" class="form-control rounded" name="email">
                                                </div>
                                            @endguest
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 my-3">
                                                <label class="font-weight-bold">موضوع <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ old('subject') }}" class="form-control rounded" name="subject">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 my-3">
                                                <label class="font-weight-bold">اظهار نظر
                                                    <span class="text-danger">*</span></label>
                                                <textarea rows="10" class="form-control rounded" name="message" style="height: 138px;">{{ old('message') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- submit --}}
                                <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-send"></i> ارسال پیام</button>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
