@extends('admin::layouts.master')
@section('title')
    گالری ویدیو | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.videogallery') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item">گالری ویدیو</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">گالری ویدیو</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $videos->currentPage() }} از {{ $videos->lastPage() }} صفحه از همه {{ $videosCount }} مورد .
                            <a href="{{ route('admin.videogallery') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.videogallery.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ساخت گالری ویدیو</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">

                                    {{-- filters --}}
                                    <div class="filters d-flex justify-content-between align-items-center tx-12">
                                        {{-- filter items --}}
                                        <div class="filter-items  d-flex justify-content-start align-items-center gap-1">
                                            <div><i class="fe fe-filter"></i></div>

                                            {{-- filter 1 --}}
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?status'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">
                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">
                                                <a href="{{ route('admin.videogallery','status=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=1'))) bg-primary-transparent @endif">فعال</a>
                                                <a href="{{ route('admin.videogallery','status=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=0'))) bg-primary-transparent @endif">غیر فعال</a>
                                            </div>

                                            {{-- filter 2 --}}
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?parent_id'))) border bg-primary-transparent @endif">پدر، فرزند<i class="fe fe-chevron-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">
                                                <a href="{{ route('admin.videogallery','parent_id=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=0'))) bg-primary-transparent @endif">دسته های پدر</a>
                                                <a href="{{ route('admin.videogallery','parent_id=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=1'))) bg-primary-transparent @endif">زیر دسته ها</a>
                                            </div>

                                            {{-- filter clearing --}}
                                            @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))
                                                <a href="{{ route('admin.videogallery') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>
                                            @endif
                                        </div>
                                        {{-- filter guid --}}
                                    </div>

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 201.667px;">عنوان</th>
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 151.667px;">عنوان</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 54.4375px;">وضعیت</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($videos as $video)
                                            <tr>
                                                <td>
                                                    <video width=320" height="140" controls>
                                                        <source src="{{ asset(str_replace("\\", '/', $video->video)) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </td>
                                                <td>{{ $video->title }}</td>
                                                <td>
                                                    <label for="{{ $video->id }}">
                                                        <input type="checkbox" id="{{ $video->id }}" onchange="changeStatus({{ $video->id }})" data-url="{{ route('admin.videogallery.status', $video->id) }}" data-value="{{ $video->status }}" @checked($video->status == 1)>
                                                    </label>
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.videogallery.show', $video) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                    <a href="{{ route('admin.videogallery.edit', $video) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.videogallery.destroy', $video) }}" method="post">
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
                                        {{ $videos->links('vendor.pagination.bootstrap-5', ['elements' => $videos]) }}
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

    <script>
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
