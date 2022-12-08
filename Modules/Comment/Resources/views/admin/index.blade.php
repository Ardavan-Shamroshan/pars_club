@extends('admin::layouts.master')
@section('title')
    نظرات اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.comment') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item">نظرات</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">نظرات اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $comments->currentPage() }} از {{ $comments->lastPage() }} صفحه از همه {{ $commentsCount }} مورد .
                            <a href="{{ route('admin.comment') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
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
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?approved')) || (str_contains(request()->getUri(), '?seen'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>

                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">
                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">
                                                <a href="{{ route('admin.comment') }}" class="dropdown-item">همه</a>
                                                <a href="{{ route('admin.comment','approved=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?approved=1'))) bg-primary-transparent @endif">تایید شده</a>
                                                <a href="{{ route('admin.comment','approved=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?approved=0'))) bg-primary-transparent @endif">درانتظار تایید</a>
                                                <a href="{{ route('admin.comment','seen=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?seen=1'))) bg-primary-transparent @endif">دیده شده</a>
                                                <a href="{{ route('admin.comment','seen=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?seen=0'))) bg-primary-transparent @endif">دیده نشده</a>
                                            </div>

                                            {{-- filter 2 --}}
                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?commentable_id'))) border bg-primary-transparent @endif">خبر<i class="fe fe-chevron-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown2">
                                                <input type="text" placeholder="جستجو" id="myInput2" class="border m-1 rounded" onkeyup="filterFunction2()" style="outline: none">
                                                @foreach($posts as $post)
                                                    <a href="{{ route('admin.comment', 'commentable_id=' . $post->id) }}" class="dropdown-item @if((str_contains(request()->getUri(), '?commentable_id=' . $post->id))) bg-primary-transparent @endif" data-bs-placement="left" data-bs-toggle="tooltip" title="{{ $post->title }}">{{ Str::limit($post->title, 25) }}</a>
                                                @endforeach
                                            </div>

                                            {{-- filter clearing --}}
                                            @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))
                                                <a href="{{ route('admin.comment') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>
                                            @endif
                                        </div>
                                        {{-- filter guid --}}
                                        <div class="filter-guid d-flex justify-content-between align-items-center gap-3 rounded border mb-2 px-3 tx-12 w-auto">
                                            <span><div class="dot-label bg-gray-500"></div>دیده نشده</span>
                                            <span><div class="dot-label bg-success"></div>دیده شده</span>
                                            <span class="mt-2"><i class="fe fe-check-circle text-success"></i> تایید شده</span>
                                            <span class="mt-2"><i class="fe fe-clock text-warning"></i> در انتظار تایید</span>
                                        </div>
                                    </div>

                                    <!-- table responsive -->
                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc w-25" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="متن نظر: activate to sort column descending" style="width: 101.667px;">متن نظر</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پاسخ به: activate to sort column ascending" style="width: 101.667px;">پاسخ به</th>
                                            <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نویسنده: activate to sort column ascending" style="width: 148.885px;">کاربر</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="عملیات: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div class="dot-label @if($comment->seen == 1) bg-success @else bg-gray-500 @endif"></div>
                                                        {{ $comment->body }}
                                                    </div>
                                                    <small class="tx-10"><a href="{{ route('admin.post.show', $comment->commentable) }}">{{ $comment->commentable->title ?? '-' }}</a></small>
                                                </td>
                                                <td><a href="{{ route('admin.comment.show', $comment) }}"><small>{{ $comment->parent->body ?? '-' }}</small></a>
                                                </td>
                                                <td><a href="#">{{$comment->author->fullname ?? '-' }}</a></td>

                                                <td class="d-flex justify-content-start">
                                                    @if($comment->approval)
                                                        <a href="{{ route('admin.comment.approve', $comment) }}" class="btn-sm text-success"><i class="fe fe-check-circle"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.comment.approve', $comment) }}" class="btn-sm text-warning"><i class="fe fe-clock"></i></a>
                                                    @endif
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#dataModal-{{ $comment->id }}" class="btn-sm"><i class="fe fe-message-circle"></i> پاسخ</a>
                                                    <a href="{{ route('admin.comment.show', $comment) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                    <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-link delete">
                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>










                                            <!-- Modal -->
                                            <div class="modal fade" id="dataModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 35%">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <span><h5 class="card-title mg-b-20">پاسخ به نظر</h5></span>
                                                            <p><a href="{{ route('admin.post.show', $comment->commentable) }}" class="btn btn-link btn-sm">{{ $comment->commentable->title }}</a></p>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="card card-body pd-20 pd-md-40 m-1 border-0 shadow-none">
                                                            <span class="main-content-label tx-11 tx-medium tx-gray-600">{{ $comment->body }}</span>
                                                            <form action="{{ route('admin.comment.answer', $comment) }}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="main-form-group">
                                                                        <label class="form-label">پاسخ نظر</label>
                                                                        <input class="form-control" name="body" placeholder="پاسخ خود را بنویسید" type="text" value="{{ old('body') }}">
                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-main-primary btn-block">ثبت پاسخ</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                        </tbody>

                                    </table>

                                    <div class="col-12 mt-4 text-left">
                                        {{ $comments->links('vendor.pagination.bootstrap-5', ['elements' => $comments]) }}
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
