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
                                <strong>ورزش جام جهانی</strong><br>
                                <i class="fa fa-map-marker"></i><strong>نشانی:</strong>fa795 folsom ave، suite 600<br>
                                <i class="fa fa-plane"></i><strong>شهرستان:</strong>سان فرانسیسکو، 94107<br>
                                <i class="fa fa-phone"></i> <abbr title="Phone">p:</abbr>(123) 456-7890
                            </address>
                        </div>
                    </aside>

                    <aside class="panel-box">
                        <div class="titles no-margin">
                            <h4>گوگل مپ</h4>
                        </div>
                        <div class="info-panel p-1">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d435.065044839531!2d51.2150429!3d29.2670473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb40fd940e8d46d%3A0x70c51a775e324fc1!2z2qnZhNuM2YbbjNqpINiq2K7Ytdi124wg2K_Zhtiv2KfZhtm-2LLYtNqp24wg2b7Yp9ix2LM!5e0!3m2!1sen!2sde!4v1671474207426!5m2!1sen!2sde"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </aside>
                    <aside class="panel-box">
                        <div class="titles no-margin">
                            <h4>ایمیل تماس</h4>
                        </div>
                        <div class="info-panel">
                            <address>
                                <i class="fa fa-envelope"></i><strong>ایمیل:</strong>
                                sales@sportscup.com<br>
                                <i class="fa fa-envelope"></i><strong>ایمیل:</strong>
                                sales@sportscup.com
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
                            <form class="form-theme" action="php/send-mail.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>اسم شما *</label>
                                        <input type="text" required="required" value="" maxlength="100" class="form-control" name="Name" id="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>آدرس ایمیل شما *</label>
                                        <input type="email" required="required" value="" maxlength="100" class="form-control" name="Email" id="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>موضوع *</label>
                                        <input type="text" required="required" value="" maxlength="100" class="form-control" name="Email" id="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>اظهار نظر *</label>
                                        <textarea maxlength="5000" rows="10" class="form-control" name="message" style="height: 138px;" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="ارسال پیام" class="btn btn-lg btn-primary">
                                    </div>
                                </div>
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
        <div class="section-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>ایمیل خود را وارد کنید و<span class="text-resalt">مشترک</span> خبرنامه ما شوید.</h2>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپ</p>
                        </div>
                        <form id="newsletterForm" action="php/mailchip/newsletter-subscribe.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        <input class="form-control" placeholder="اسم شما" name="name" type="text" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        <input class="form-control" placeholder="ایمیل شما" name="email" type="email" required="required">
                                        <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit" name="subscribe">ثبت نام</button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="result-newsletter"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
