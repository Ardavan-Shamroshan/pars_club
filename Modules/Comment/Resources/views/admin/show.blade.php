@extends('admin::layouts.master')
@section('title')
    نمایش نظر اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.comment') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.comment') }}">نظر اخبار</a></li>
            <li class="breadcrumb-item">نمایش نظر</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">{{ $comment->name }}</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش نظر.
                            <a href="{{ route('admin.comment') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست نظر ها</a>
                        </p>
                    </div>

                    <div>
                        <div class="tag tag-rounded tag-blue">
                            <a href="#" class="text-white"><i class="fe fe-chevron-right"></i> مشاهده در وبگاه</a>
                        </div>
                        <div class="dt-buttons btn-group flex-wrap">
                            <a class="btn buttons-pdf" id="print" tabindex="0" aria-controls="example" type="button">
                                <span><i class="fe fe-printer"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card" id="printable">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <tbody>
                                <tr>
                                    <th class="font-weight-bold">متن نظر :</th>
                                    <td>
                                        <div> {{ $comment->body ?? '-' }}</div>
                                        @if($comment->parent)
                                            <br>
                                            <div>
                                                <small class="font-weight-bold">پاسخ به: </small>
                                                <small><a href="{{ route('admin.comment.show', $comment->parent) }}">{{ $comment->parent->body ?? '-' }}</a></small>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">کاربر :</th>
                                    <td><a href="#">{{ $comment->author->fullname }}</a></td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">نوع نظر :</th>
                                    <td>{{ $comment->commentable_type ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">خبر / کد خبر / دسته بندی :</th>
                                    <td>
                                        <a href="{{ route('admin.post.show', $comment->commentable) }}" class="tx-12">{{ $comment->commentable->title ?? '-' }}</a>:
                                        <span class="badge badge-light border">{{ $comment->commentable->id }}</span>
                                        <span class="badge badge-light border">{{ $comment->commentable->category->name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">زمان ایجاده شده :</th>
                                    <td>{{ jalaliDate($comment->created_at) }} {{ jalaliTime($comment->created_at, 'H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">ویرایش شده در :</th>
                                    <td>{{ jalaliDate($comment->updated_at) }} {{ jalaliTime($comment->updated_at, 'H:i') }}</td>
                                </tr>
                                <tr>

                                    <th class="font-weight-bold">عملیات :</th>
                                    <td class="d-flex justify-content-start">
                                        @if($comment->approval)
                                            <a href="{{ route('admin.comment.approve', $comment) }}" class="btn-sm text-success"><i class="fe fe-check-circle"></i> تایید شده</a>
                                        @else
                                            <a href="{{ route('admin.comment.approve', $comment) }}" class="btn-sm text-warning"><i class="fe fe-clock"></i> در انتظار تایید</a>
                                        @endif
                                        <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-sm btn-link delete">
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
@section('script')
    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function () {
            printContent('printable');
        })

        function printContent(el) {
            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').empty().html(restorePage);
        }
    </script>

    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])
@endsection