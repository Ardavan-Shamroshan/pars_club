@extends('admin::layouts.master')
@section('title')
    اسلایدشو | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.slide') }}">مجله و خبرنامه</a>
            </li>
            <li class="breadcrumb-item">اسلایدشو
            </li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0"> اسلایدشو</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $slides->currentPage() }} از {{ $slides->lastPage() }} صفحه از همه {{ $slidesCount }} مورد .
                            <a href="{{ route('admin.slide') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.slide.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ساخت اسلاید
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc w-25" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">تصویر</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="اسلاگ: activate to sort column ascending" style="width: 101.667px;">عنوان</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="برچسب: activate to sort column ascending" style="width: 101.667px;">آدرس</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="وضعیت: activate to sort column ascending" style="width: 54.4375px;">وضعیت</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="عملیات: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($slides as $slide)
                                            <tr>
                                                <td><img src="{{ asset($slide->image['indexArray']['large']) }}" alt="{{ $slide->title }}"></td>
                                                <td><a href="#">{{ $slide->title ?? '-' }}</a></td>
                                                <td><a href="#">{{ $slide->url }}</a></td>
                                                <td>
                                                    <label for="{{ $slide->id }}">
                                                        <input type="checkbox" id="{{ $slide->id }}" onchange="changeStatus({{ $slide->id }})" data-url="{{ route('admin.slide.status', $slide) }}" data-value="{{ $slide->status }}" @checked($slide->status == 1)>
                                                    </label>
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.slide.edit', $slide) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.slide.destroy', $slide) }}" method="post">
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
                                        {{ $slides->links('vendor.pagination.bootstrap-5', ['elements' => $slides]) }}
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
