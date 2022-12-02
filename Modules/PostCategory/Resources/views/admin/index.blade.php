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
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $categoriesCount }} از {{ $categories->perPage() * $categories->currentPage() }} مورد درصفحه.
                            <a href="{{ route('admin.postcategory') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.postcategory.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ساخت دسته بندی</a>
            </div>

            <div class="card">
                <div class="card-body">
                    {{--                    <div class="table-responsive">--}}
                    {{--                        <table class="table mg-b-0 text-md-nowrap">--}}
                    {{--                            <thead>--}}
                    {{--                            <tr>--}}
                    {{--                                <th>نام</th>--}}
                    {{--                                <th>اسلاگ</th>--}}
                    {{--                                <th>زیر دسته</th>--}}
                    {{--                                <th>مقالات</th>--}}
                    {{--                                <th>وضعیت</th>--}}
                    {{--                                <th>عملیات</th>--}}
                    {{--                            </tr>--}}
                    {{--                            </thead>--}}
                    {{--                            <tbody>--}}
                    {{--                            <tr>--}}
                    {{--                                <td>ورزشی</td>--}}
                    {{--                                <td>ورزشی</td>--}}
                    {{--                                <td>-</td>--}}
                    {{--                                <td><a href="" class="btn-sm">0 مورد</a></td>--}}
                    {{--                                <td>--}}
                    {{--                                    <div class="main-toggle main-toggle-success"><span></span></div>--}}
                    {{--                                </td>--}}
                    {{--                                <td class="d-flex justify-content-start">--}}
                    {{--                                    <a href="" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>--}}
                    {{--                                    <a href="" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>--}}
                    {{--                                    <form action="" method="post">--}}
                    {{--                                        @csrf @method('delete')--}}
                    {{--                                        <button type="submit" class="btn btn-sm btn-link delete">--}}
                    {{--                                            <i class="fe fe-trash-2"></i> پاک کردن--}}
                    {{--                                        </button>--}}
                    {{--                                    </form>--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}

                    {{--                            </tbody>--}}
                    {{--                        </table>--}}
                    {{--                    </div>--}}

                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">نام</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نام خانوادگی: activate to sort column ascending" style="width: 101.667px;">اسلاگ</th>
                                            <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="موقعیت: activate to sort column ascending" style="width: 148.885px;">زیر دسته</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="تاریخ شروع: activate to sort column ascending" style="width: 101.667px;">مقالات</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 54.4375px;">وضعیت</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug ?? '-' }}</td>
                                                <td>{{ $category->parent->name ?? '-' }}</td>
                                                <td><a href="#" class="btn-sm">0 مورد</a></td>
                                                <td>
                                                    <label for="{{ $category->id }}">
                                                        <input type="checkbox" id="{{ $category->id }}" onchange="changeStatus({{ $category->id }})" data-url="{{ route('admin.postcategory.status', $category->id) }}" data-value="{{ $category->status }}" @if($category->status === 1) checked @endif>
                                                    </label>
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.postcategory.show', $category) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                    <a href="{{ route('admin.postcategory.edit', $category) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.postcategory.destroy', $category) }}" method="post">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-link delete">
                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>

                                    <div class="col-12 mt-4 text-left">
                                        {{ $categories->links('vendor.pagination.bootstrap-5', ['elements' => $categories]) }}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/div-->

    </div>
    <!-- /row -->

@endsection

@section('script')
    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])
@endsection
