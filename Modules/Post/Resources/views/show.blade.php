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

            @include('home::layouts.left-sidebar')

            <div class="col-lg-5 col-xl-6 col-sm-12 ">
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>روسیه 2018 پتانسیل های کلاسیک بازی-یو پی اس</h4>
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
                            <p>از لحظه ای که در قرعه کشی نهایی برای 2018 fifa world cup russia™ ساخته شده بود طرفداران در سراسر جهان شده اند پدیده هنگامی آشکار شد بیش از هر یک از گروه ها و فکر که ممکن است در صورت که در دور حذفی.</p>
                            <p>به عنوان آنها خواهد شد و بدون شک متوجه شده اند وجود دارد برخی از کلاسیک مسابقات به طور بالقوه در فروشگاه از دور 16 به بعد. در عین حال اگر ورزش فوتبال همچنان به توسعه در سرعت آن باقی مانده است به عنوان غیر قابل پیش بینی بوده است. هر چیزی می تواند اتفاق می افتد در طول 90 دقیقه و هیچ چیز می تواند گرفته شده برای اعطا در گروه فاز که در آن بسیاری از مورد علاقه خود را پیدا کرده است تلاش فقط آن را از طریق به دور بعدی. برای مثال چند می خواهم که نوک کاستاریکا به پیش از جام جهانی 2014 برزیل استخر نیز شامل انگلستان و ایتالیا و اروگوئه. و در عین حال لوس ticos پیشرفت به عنوان برندگان گروه در حالی که زبان انگلیسی و ایتالیایی ها, هواپیما برای اولین بار از صفحه اصلی.</p>
                            <p>به کمک آتش تصورات خود را و شما اجازه دیدن اگر وجود دارد یک پتانسیل حذفی بازی شما ممکن است وسوسه به خرید بلیط برای, fifa.com آمده است تا با یک لیست از امکان last-16 و یک چهارم نهایی دوئل بین برخی از بازی بزرگترین جاذبه های.</p>
                            <h5>فرانسه-آرژانتین</h5>
                            <p>بالا دانه در گروه های c و d هر دو طرح در برنده شدن خود را در بخش مربوطه. اما اگر یکی از آنها پیشرفت به عنوان یک گروه برنده و دیگر به عنوان یک دونده-پس از آن ما خواهد شد از دیدن لیونل مسی رو خاموش در برابر تراکتورسازی هم در قازان (30 ژوئن) یا نیژنی نووگورود (1 جولای) بسته به تیم گروه دادن. آرژانتین را برنده هر دو جهان قبلی نهایی جلسات بین دو کشور: 1-0 در اروگوئه 1930 و 2-1 در آرژانتین 1978.</p>
                            <h5>برزیل-آلمان</h5>
                            <p>برزیل ممکن است شانس برای گرفتن انتقام که 7-1 نیمه نهایی شکست در جام جهانی گذشته به عنوان اوایل به عنوان دور 16. اگر آنها دچار لغزش جزئی در گروه e و تنها پایان دوم و آلمان برنده گروه f و یا بالعکس پس از آن این دو کشور دیدار خواهد کرد در سامارا (2 جولای) یا st petersburg (3 جولای). پس از جلسات قبلی در مرحله بزرگ است و افتخارات حتی: برزیل برنده نهایی از کره/ژاپن 2002 2-0 در حالی که آلمان ثبت شده است که معروف پیروزی در برزیل 2014.</p>
                            <h5>روسیه-اسپانیا</h5>
                            <p>آنها باید پیش از گروه فاز میزبان بیش از احتمال زیاد به صورت سفت اپوزیسیون در گذشته 16 با پرتغال یا اسپانیا به طور بالقوه دروغ گفتن در انتظار برای آنها یا در سوچی (30 ژوئن) یا مسکو (1 جولای). باید به روسیه می آیند تا در برابر اسپانیایی آن خواهد بود که برای اولین بار در جام جهانی برخورد بین این دو است. la roja مدت طولانی است که یک دیو تیم برای کشور اروپای شرقی برنده اول خود را عنوان اروپایی در برابر اتحاد جماهیر شوروی سابق در سال 1964 و پس از آن ضرب و شتم آنها را دو بار مسیر خود را به قاره دوم تاج در سال 2008.</p>
                            <h5>آلمان-انگلستان</h5>
                            <p>کازان (6 جولای) یا سامارا (7 جولای) می تواند با ارائه تنظیمات برای آخرین قسط در یکی از جهان فوتبال بزرگ رقابت. دوباره یک نفر باید به صفحه دیگر پایان دوم و هر دو پیروزی گذشته خود را-16 روابط. آلمان باید دست بالا را در سر به سر با سه برد در پنج برخوردهای قبلی هر چند انگلستان غالب در یکی از مهم ترین از همه آنها را نهایی – انگلستان 1966 (4-2 یک.e.t.). پس از آن شده است تقریبا در تمام آلمان: 3-2 اضافی-زمان پیروزی در این محله در مکزیک 1970 یک 4-3 ضربات پنالتی پیروزی زیر 1-1 قرعه کشی در نیمه نهایی در ایتالیا 1990 و 4-1 پیروزی در آخرین 16 در آفریقای جنوبی 2010. دیگر دیدار که در دور دوم در اسپانیا 1982 با تساوی بدون گل به پایان رسید.</p>
                            <h5>پرتغال-آرژانتین</h5>
                            <p>لیونل مسی و کریستیانو رونالدو خواهد آمد چهره به چهره برای اولین بار در جام جهانی تنها در صورتی خود را در دو کشور پایان در همان موقعیت در گروه فاز یا اول یا دوم. که ترک آنها را در همان سمت از قرعه کشی و البته برای امکان برخورد در نیژنی نووگورود (6 جولای) یا سوچی (7 جولای). کشورهای هرگز قفل شده و شاخ و قبل از اینکه در فینال اضافه کردن حتی بیشتر علاقه به امکان دوئل بین بازیکنان ستاره است.</p>
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

            @include('home::layouts.right-sidebar')
        </div>
    </div>

@endsection