@extends('home::layouts.master')
@section('title')
    درباره ما
@endsection
@section('content')

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i></a></li>
            <li class="breadcrumb-item">درباره ما</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- content -->
    <section class="content-info">
        <!-- content container -->
        <div class="container my-2">
            <div class="row">
                <!-- right aside -->
                <aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">
                    @include('home::layouts.right-sidebar')
                </aside>
                <!-- end right aside -->
                <!-- center -->
                <div class="col-lg-5 col-xl-6 col-sm-12 h-100">
                    <!-- last news -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4><i class="fe fe-message-square"></i>درباره ما</h4>
                        </div>

                        <div class="info-panel">
                            <!-- post detail -->

                            <div class="text-body">

                            {!! $setting->description !!}



                            </div>

                        </div>

                        <div class="mb-2 px-4 py-1">
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb" class="text-info">
                                <ol class="breadcrumb breadcrumb-style1">
                                    <li class="breadcrumb-item">
                                        زمان ایجاد: {{ jalaliDate($setting->created_at) }}
                                    </li>
                                    <li class="breadcrumb-item">
                                        زمان آخرین ویرایش: {{ jalaliDate($setting->published_at)  }}
                                    </li>
                                </ol>
                            </nav>
                            <!-- breadcrumb -->
                        </div>

                    </div>

                </div>
                <!-- end center -->
                <!-- left aside -->
                <aside class="col-sm-12 col-lg-4 col-xl-3 h-100">
                    @include('home::layouts.left-sidebar')
                </aside>
                <!-- end left side -->
            </div>
        </div>
        <!-- end content -->


    </section>

@endsection
