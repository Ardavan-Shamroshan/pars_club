@extends('admin::layouts.master')
@section('title')
    نمایش دسته بندی اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex justify-content-between">
                <span class="text-muted mt-1 tx-13 mb-0">مجله و خبرنامه<span class="text-muted ms-1">/</span></span>
                <span class="mt-1 tx-13 mb-0"><a href="#">دسته بندی اخبار</a><span class="text-muted ms-1">/</span></span>
                <h4 class="content-title mb-0 my-auto">نمایش دسته بندی اخبار</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">دسته بندی اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش دسته بندی.
                            <a href="#" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست دسته بندی ها</a>
                        </p>
                    </div>

                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn buttons-copy" tabindex="0" aria-controls="example" type="button">
                            <span><i class="fe fe-copy"></i></span></button>
                        <button class="btn buttons-excel" tabindex="0" aria-controls="example" type="button">
                            <span><i class="fa fa-file-excel"></i></span></button>
                        <button class="btn buttons-pdf" tabindex="0" aria-controls="example" type="button">
                            <span><i class="fe fe-printer"></i></span></button>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <tbody>
                                <tr>
                                    <th class="font-weight-bold">نام :</th>
                                    <td>جوآن پاول</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">اسلاگ :</th>
                                    <td>گاوین-گیبسون</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">زیر دسته :</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">مقالات :</th>
                                    <td><a href="" class="btn-sm">0 مورد</a></td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">زمان ایجاده شده :</th>
                                    <td>چهارشنبه 9 آذر - 13:21</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">ویرایش شده در :</th>
                                    <td>چهارشنبه 9 آذر - 13:21</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">عملیات :</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                        <form action="" method="post">
                                            <button type="submit" class="btn btn-sm btn-link">
                                                <i class="fe fe-trash-2"></i> پاک کردن
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>

        </div>
        <!--/div-->

    </div>
    <!-- /row -->

@endsection
