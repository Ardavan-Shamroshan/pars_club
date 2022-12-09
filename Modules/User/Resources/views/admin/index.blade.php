@extends('admin::layouts.master')
@section('title')
    کاربران | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.user') }}">احراز هویت</a>
            </li>
            <li class="breadcrumb-item">کاربران
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
                        <h4 class="card-title mg-b-0"> کاربران</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $users->currentPage() }} از {{ $users->lastPage() }} صفحه از همه {{ $usersCount }} مورد .
                            <a href="{{ route('admin.user') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.user.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ثبت کاربر
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

                                    {{-- filters --}}
                                    {{--                                    <div class="filters d-flex justify-content-between align-items-center tx-12">--}}
                                    {{--                                        --}}{{-- filter items --}}
                                    {{--                                        <div class="filter-items  d-flex justify-content-start align-items-center gap-1">--}}
                                    {{--                                            <div><i class="fe fe-filter"></i></div>--}}

                                    {{--                                            --}}{{-- filter 1 --}}
                                    {{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?status'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>--}}
                                    {{--                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">--}}
                                    {{--                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">--}}
                                    {{--                                                <a href="{{ route('admin.user') }}" class="dropdown-item">همه</a>--}}
                                    {{--                                                <a href="{{ route('admin.user','status=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=1'))) bg-primary-transparent @endif">فعال</a>--}}
                                    {{--                                                <a href="{{ route('admin.user','status=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=0'))) bg-primary-transparent @endif">غیر فعال</a>--}}
                                    {{--                                            </div>--}}

                                    {{--                                            --}}{{-- filter 2 --}}
                                    {{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?category_id'))) border bg-primary-transparent @endif">دسته بندی<i class="fe fe-chevron-down"></i></a>--}}
                                    {{--                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown2">--}}
                                    {{--                                                <input type="text" placeholder="جستجو" id="myInput2" class="border m-1 rounded" onkeyup="filterFunction2()" style="outline: none">--}}
                                    {{--                                                @foreach($categories as $category)--}}
                                    {{--                                                    <a href="{{ route('admin.user', 'category_id=' . $category->id) }}" class="dropdown-item @if((str_contains(request()->getUri(), '?category_id=' . $category->id))) bg-primary-transparent @endif" data-bs-placement="left" data-bs-toggle="tooltip" title="{{ $category->name }}">{{ Str::limit($category->name, 25) }}</a>--}}
                                    {{--                                                @endforeach--}}
                                    {{--                                            </div>--}}

                                    {{--                                            --}}{{-- filter clearing --}}
                                    {{--                                            @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))--}}
                                    {{--                                                <a href="{{ route('admin.user') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>--}}
                                    {{--                                            @endif--}}
                                    {{--                                        </div>--}}
                                    {{--                                        --}}{{-- filter guid --}}
                                    {{--                                    </div>--}}

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc w-25" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">کاربر</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="ایمیل: activate to sort column ascending" style="width: 80.667px;">ایمیل</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="ایمیل: activate to sort column ascending" style="width: 60.667px;">نقش ها</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="ایمیل: activate to sort column ascending" style="width: 101.667px;">دسترسی های بیشتر</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="عملیات: activate to sort column ascending" style="width: 101.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    @if($user->profile_photo_path)
                                                        <img alt="{{ $user->fullname ?? $user->name }}" class="rounded-circle avatar-md mr-2" src="{{ $user->profile_photo_url }}">
                                                    @else
                                                        <div class="profile-user avatar bg-info rounded-circle text-white">
                                                            <small>{{ $user->fullname[0] ?? 'م' }}</small>
                                                        </div>
                                                    @endif
                                                    <small>{{ $user->fullname ?? $user->name ?? '-' }}</small>
                                                </td>
                                                <td>
                                                    <small><a href="mailto:{{ $user->email }}">{{ $user->email ?? '-' }}</a></small>
                                                </td>
                                                <td>{{ $user->roles ?? '-' }}</td>
                                                <td>{{ $user->permissions ?? '-' }}</td>
                                                <td class="d-flex justify-content-start">
                                                    @if($user->activeUser)
                                                        <a href="{{ route('admin.user.activate', $user) }}"><span class="label text-success d-flex"><div class="dot-label bg-success ml-1 mt-lg-n1"></div>فعال</span></a>
                                                    @else
                                                        <a href="{{route('admin.user.activate', $user)}}"><span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1 mt-lg-n1"></div>غیر فعال</span></a>
                                                    @endif

                                                    <a href="{{ route('admin.user.edit', $user) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.user.destroy', $user) }}" method="user">
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
                                        {{ $users->links('vendor.pagination.bootstrap-5', ['elements' => $users]) }}
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

        function filterFunction2() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown2");
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
