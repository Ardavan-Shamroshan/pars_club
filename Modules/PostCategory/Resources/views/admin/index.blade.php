@extends('admin::layouts.master')
@section('title')
    دسته بندی اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <span class="text-muted mt-1 tx-13 ms-2 mb-0">مجله و خبرنامه /</span>
                <h4 class="content-title mb-0 my-auto">دسته بندی اخبار</h4>
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
                        <p class="tx-12 tx-gray-500 mb-2">نمایش 2 از 10 مورد. <a href="#"  id="m-l-c-05">تازه سازی </a></p>
                    </div>
                </div>
                <div class="mb-xl-0">
                    <button type="button" class="btn btn-primary"><i class="fe fe-plus"></i> ساخت دسته بندی</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>اسلاگ</th>
                                <th>زیر دسته</th>
                                <th>مقالات</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ورزشی</td>
                                <td>ورزشی</td>
                                <td>-</td>
                                <td><a href="" class="btn-sm">0 مورد</a></td>
                                <td>
                                    <div class="main-toggle main-toggle-success"><span></span></div>
                                </td>
                                <td class="d-flex justify-content-start">
                                    <a href="{{ route('admin.postcategory.show') }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-sm btn-link"><i class="fe fe-trash-2"></i> پاک کردن</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>فوتبال</td>
                                <td>فوتبال</td>
                                <td>ورزشی</td>
                                <td><a href="" class="btn-sm">0 مورد</a></td>
                                <td>
                                    <div class="main-toggle main-toggle-success"><span></span></div>
                                </td>
                                <td class="d-flex justify-content-start">
                                    <a href="" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-sm btn-link"><i class="fe fe-trash-alt"></i> پاک کردن</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>لیگ برتر</td>
                                <td>لیگ-برتر</td>
                                <td>-</td>
                                <td><a href="" class="btn-sm">0 مورد</a></td>
                                <td>
                                    <div class="main-toggle main-toggle-success"><span></span></div>
                                </td>
                                <td class="d-flex justify-content-start">
                                    <a href="" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-sm btn-link"><i class="fe fe-trash-alt"></i> پاک کردن</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>رده نونهالان</td>
                                <td>رده-نونهالان</td>
                                <td>-</td>
                                <td><a href="" class="btn-sm">0 مورد</a></td>
                                <td>
                                    <div class="main-toggle main-toggle-success"><span></span></div>
                                </td>
                                <td class="d-flex justify-content-start">
                                    <a href="" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-sm btn-link"><i class="fe fe-trash-alt"></i> پاک کردن</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>نتایج زنده</td>
                                <td>نتایج-زنده</td>
                                <td>-</td>
                                <td><a href="" class="btn-sm">0 مورد</a></td>
                                <td>
                                    <div class="main-toggle main-toggle-success"><span></span></div>
                                </td>
                                <td class="d-flex justify-content-start">
                                    <a href="" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-sm btn-link"><i class="fe fe-trash-alt"></i> پاک کردن</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->






    </div>
    <!-- /row -->

@endsection
