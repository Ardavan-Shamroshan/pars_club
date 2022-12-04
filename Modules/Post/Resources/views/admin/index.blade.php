@extends('admin::layouts.master')
@section('title')
    اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <span class="text-muted mt-1 tx-13 ms-2 mb-0">مجله و خبرنامه /</span>
                <h4 class="content-title mb-0 my-auto"> اخبار</h4>
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
                        <h4 class="card-title mg-b-0"> اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $posts->currentPage() }} از {{ $posts->lastPage() }} صفحه از همه {{ $postsCount }} مورد .
                            <a href="{{ route('admin.post') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.post.create') }}" class="btn p-2 btn-primary"><i class="fe fe-plus"></i> ساخت اخبار
                </a>
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
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">عنوان</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نویسنده: activate to sort column ascending" style="width: 101.667px;">نویسنده</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="دسته بندی: activate to sort column ascending" style="width: 101.667px;">دسته بندی</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نام خانوادگی: activate to sort column ascending" style="width: 101.667px;">اسلاگ</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="برچسب: activate to sort column ascending" style="width: 101.667px;">برچسب</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="اسلاگ: activate to sort column ascending" style="width: 101.667px;">تاریخ انتشار</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="امکان نظر دهی: activate to sort column ascending" style="width: 54.4375px;">امکان نظر دهی</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="وضعیت: activate to sort column ascending" style="width: 54.4375px;">وضعیت</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="عملیات: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ Str::limit($post->title, 20) }}</td>
                                                <td>{{ $post->author->fullname ?? '-' }}</td>
                                                <td>{{ $post->category->name ?? '-' }}</td>
                                                <td>{{ $post->slug ?? '-' }}</td>
                                                @empty($post->label)
                                                    <td><small class="badge badge-light">بدون برچسب</small></td>
                                                @else
                                                    <td class="badge badge-primary-transparent"><small>{{ $post->label }}</small></td>
                                                @endempty
                                                <td>{{ jalaliDate($post->published_at, '%B %d، %Y') ?? '-' }}</td>
                                                <td>
                                                    <label for="{{ $post->id }}-commentable">
                                                        <input type="checkbox" id="{{ $post->id }}-commentable" onchange="commentable({{ $post->id }})" data-url="{{ route('admin.post.commentable', $post->id) }}"  data-value="{{ $post->commentable }}"  @if ($post->commentable === 1) checked @endif>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="{{ $post->id }}">
                                                        <input type="checkbox" id="{{ $post->id }}" onchange="changeStatus({{ $post->id }})" data-url="{{ route('admin.post.status', $post->id) }}" data-value="{{ $post->status }}" @if($post->status === 1) checked @endif>
                                                    </label>
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.post.show', $post) }}" class="btn-sm"><i class="fe fe-eye"></i> نمایش</a>
                                                    <a href="{{ route('admin.post.edit', $post) }}" class="btn-sm"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.post.destroy', $post) }}" method="post">
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
                                        {{ $posts->links('vendor.pagination.bootstrap-5', ['elements' => $posts]) }}
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
