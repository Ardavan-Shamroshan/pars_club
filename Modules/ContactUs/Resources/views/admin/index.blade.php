@extends('admin::layouts.master')
@section('title')
    تماس با ما | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.contact-us') }}">محتوا</a></li>
            <li class="breadcrumb-item">تماس با ما</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2"><h4 class="card-title mg-b-0">تماس با ما</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $contacts->currentPage() }} از {{ $contacts->lastPage() }} صفحه از همه {{ $contactsCount }} مورد .
                            <a href="{{ route('admin.contact-us') }}" id="m-l-c-05">تازه سازی </a></p></div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">

                                    {{--                                    filters--}}
                                    {{--                                    <div class="filters d-flex justify-content-between align-items-center tx-12"> filter items--}}
                                    {{--                                        <div class="filter-items  d-flex justify-content-start align-items-center gap-1">--}}
                                    {{--                                            <div><i class="fe fe-filter"></i></div>--}}

                                    {{--                                            filter 1--}}
                                    {{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?status'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>--}}
                                    {{--                                            <div class="dropdown-contact-us dropdown-contact-us-filter rounded shadow tx-12" id="myDropdown">--}}
                                    {{--                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">--}}
                                    {{--                                                <a href="{{ route('admin.contact-us','status=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=1'))) bg-primary-transparent @endif">فعال</a>--}}
                                    {{--                                                <a href="{{ route('admin.contact-us','status=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=0'))) bg-primary-transparent @endif">غیر فعال</a>--}}
                                    {{--                                            </div>--}}

                                    {{--                                            filter 2--}}
                                    {{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?parent_id'))) border bg-primary-transparent @endif">پدر، فرزند<i class="fe fe-chevron-down"></i></a>--}}
                                    {{--                                            <div class="dropdown-contact-us dropdown-contact-us-filter rounded shadow tx-12" id="myDropdown">--}}
                                    {{--                                                <a href="{{ route('admin.contact-us','parent_id=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=0'))) bg-primary-transparent @endif">دسته های پدر</a>--}}
                                    {{--                                                <a href="{{ route('admin.contact-us','parent_id=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=1'))) bg-primary-transparent @endif">زیر دسته ها</a>--}}
                                    {{--                                            </div>--}}

                                    {{--                                            filter clearing @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))--}}
                                    {{--                                                <a href="{{ route('admin.contact-us') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>--}}
                                    {{--                                            @endif                                        </div>--}}
                                    {{--                                        filter guid--}}
                                    {{--                                    </div>--}}

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 71.667px;">نام تماس گیرنده</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نام خانوادگی: activate to sort column ascending" style="width: 51.667px;">ایمیل</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="نام خانوادگی: activate to sort column ascending" style="width: 161.667px;">موضوع</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 104.4375px;">وضعیت</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 106.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name ?? '-' }}</td>
                                                <td>{{ $contact->email ?? '-' }}</td>
                                                <td>
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#dataModal-{{ $contact->id }}">{{ $contact->subject ?? '-' }}</a>
                                                </td>
                                                <td>
                                                    <small class="tag @if($contact->is_read == 1) bg-success-transparent text-success @else bg-warning-transparent text-warning  @endif">
                                                        {{ $contact->read }}
                                                    </small>
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                    @if($contact->is_read == 0)
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#dataModalAnswer-{{ $contact->id }}" class="btn-sm"><i class="fe fe-message-square"></i> پاسخ</a>
                                                    @endif
                                                    <form action="{{ route('admin.contact-us.destroy', $contact) }}" method="post">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-link delete">
                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>



                                            <!-- Show Modal -->
                                            <div class="modal fade" id="dataModal-{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 45%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="row">
                                                                <div class="col-12 mg-b-0 pb-1">
                                                                    <div class="d-flex">
                                                                        <ul class="list-unstyled w-100">
                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">موضوع تماس :</div>
                                                                                <div>
                                                                                    {{ $contact->subject ?? '-' }}
                                                                                </div>
                                                                            </li>

                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">متن تماس :</div>
                                                                                <div>
                                                                                    <?= html_entity_decode($contact->message) ?? '-' ?>
                                                                                </div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">تماس گیرنده :</div>
                                                                                <div>{{ $contact->name ?? '-' }}</div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">ایمیل تماس گیرنده :</div>
                                                                                <div class="">
                                                                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email ?? '-' }}</a>
                                                                                </div>
                                                                            </li>

                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">پاسخ :</div>

                                                                                <div>
                                                                                    @if($contact->is_read == 1)
                                                                                        <?= html_entity_decode( $contact->response) ?>
                                                                                    @else
                                                                                        <small class="tag bg-warning-transparent text-warning">
                                                                                            {{ $contact->read }}
                                                                                        </small>
                                                                                    @endif
                                                                                </div>

                                                                            </li>

                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">زمان ایجاده شده :</div>
                                                                                <div>{{ jalaliDate($contact->created_at) }} {{ jalaliTime($contact->created_at, 'H:i') }}</div>

                                                                            </li>

                                                                            <li class="d-flex justify-content-start gap-3 m-0 p-3">
                                                                                <div class="font-weight-bold">ویرایش شده در :</div>
                                                                                <div>{{ jalaliDate($contact->updated_at) }} {{ jalaliTime($contact->updated_at, 'H:i') }}</div>
                                                                            </li>
                                                                            <li class="d-flex justify-content-start gap-3 bg-light m-0 p-3">
                                                                                <div class="font-weight-bold">عملیات :</div>
                                                                                <div class="d-flex justify-content-start">
                                                                                    @if($contact->is_read == 0)
                                                                                        <a href="" data-bs-toggle="modal" data-bs-target="#dataModalAnswer-{{ $contact->id }}" class="btn-sm"><i class="fe fe-message-square"></i> پاسخ</a>
                                                                                    @endif
                                                                                    <form action="{{ route('admin.contact-us.destroy', $contact) }}" method="post">
                                                                                        @csrf @method('delete')
                                                                                        <button type="submit" class="btn btn-sm btn-link delete">
                                                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                            </div><!-- bd -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($contact->is_read == 0)
                                                <!-- Answer Modal -->
                                                <div class="modal fade " id="dataModalAnswer-{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" style="max-width: 45%">
                                                        <form action="{{ route('admin.contact-us.update', $contact) }}" method="post">
                                                            @csrf @method('PUT')

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="mb-0 desc text-body">{{ $contact->subject }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body p-0">
                                                                    <div class="row">
                                                                        <div class="col-12 mg-b-0 pb-1">
                                                                            <div class="p-3 my-2">

                                                                                <a class="p-3 d-flex border-bottom gap-3">
                                                                                    <div class="drop-img cover-image " data-bs-image-src="{{ asset('modules/admin/assets/img/faces/no-profile.jpg') }}">
                                                                                        <span class="avatar-status bg-teal"></span>
                                                                                    </div>
                                                                                    <div class="wd-90p">
                                                                                        <div class="d-flex">
                                                                                            <h5 class="mb-1 name text-body">{{ $contact->name }}</h5>
                                                                                        </div>
                                                                                        <p class="mb-0 desc tx-gray-600 my-2"><?= html_entity_decode($contact->message) ?></p>
                                                                                        <p class="time mb-0 text-left float-right mr-2 mt-2 tx-gray-500">{{ jalaliDate($contact->created_at, '%d %B، %Y') }}</p>
                                                                                    </div>
                                                                                </a>

                                                                                {{-- response --}}
                                                                                <div class="form-group my-4">
                                                                                    <label for="response" class="@error('response') tx-danger @enderror">پاسخ
                                                                                        <span class="tx-danger">*</span></label>
                                                                                    <textarea class="form-control @error('response') border-danger @enderror" name="response" rows="3" style="height: 7rem; resize: none">{{ old('response') }}</textarea>
                                                                                    @error('response')
                                                                                    <small class="tx-danger">{{ $message }}</small> @enderror
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div><!-- bd -->
                                                                </div>

                                                                <div class="modal-footer text-center dropdown-footer">
                                                                    <button type="submit" class="btn btn-sm btn-warning mx-auto">ارسال پاسخ</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif

                                        @endforeach

                                        </tbody>

                                    </table>

                                    <div class="col-12 mt-4 text-left">
                                        {{ $contacts->links('vendor.pagination.bootstrap-5', ['elements' => $contacts]) }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        <!--/div-->

    </div>    <!-- /row -->

@endsection

@section('script')
    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])
@endsection
