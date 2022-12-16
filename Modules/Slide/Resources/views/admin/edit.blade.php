@extends('admin::layouts.master')
@section('title')
    ساخت اسلاید | داشبورد مدیریت
@endsection
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/admin/assets/plugins/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.slide') }}">مجله و اسلایدنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.slide') }}">اسلایدشو</a></li>
            <li class="breadcrumb-item">ساخت اسلاید</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">اسلایدشو</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ساخت اسلاید.
                            <a href="{{ route('admin.slide') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست اسلایدشو</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <form action="{{ route('admin.slide.update', $slide) }}" id="form" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-8">
                        {{-- validation errors alert --}}
                        @if ($errors->any())
                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span></button>

                                @foreach($errors->all() as $error)
                                    <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        <div class="card box-shadow-0">
                            <div class="card-header"></div>
                            <div class="card-body pt-0">
                                <div>

                                    {{-- image --}}
                                    <div class="form-group mb-4">
                                        <input type="file" name="image" class="dropify" data-default-file="{{ asset($slide->image['indexArray']['medium']) }}" data-height="200">
                                        <div class="dropify-preview" style="display: none;">
                                            <span class="dropify-render"></span>
                                            <div class="dropify-infos">
                                                <div class="dropify-infos-inner"><p class="dropify-filename">
                                                        <span class="dropify-filename-inner"></span></p>
                                                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- title --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('title') tx-danger @enderror">عنوان اسلاید:
                                            <span class="tx-danger">*</span></label>
                                        <input type="text" name="title" class="form-control @error('title') border-danger @enderror" value="{{ old('title', $slide->title) }}">
                                        @error('title') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{--                                    --}}{{-- address(url) --}}
                                    {{--                                    <div class="form-group mb-4">--}}
                                    {{--                                        <label class="form-label">url: آدرس</label>--}}
                                    {{--                                        <input type="text" name="url" class="form-control" value="{{ old('url') }}">--}}
                                    {{--                                        <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی عنوان تولید خواهد شد.</small>--}}
                                    {{--                                    </div>--}}


                                    {{-- body --}}
                                    <div class="form-group mb-4">
                                        <label for="body" class="@error('body') tx-danger @enderror">متن
                                            <span class="tx-danger">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm @error('body') border border-danger @enderror" name="body" id="editor">{{ old('body', $slide->body) }}</textarea>
                                        @error('body') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- submit --}}
                <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                </button>

                {{-- cancel --}}
                <a href="{{ route('admin.slide') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
            </form>
        </div>
        <!-- /row -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('modules/admin/assets/plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>

    {{-- ckeditor5 --}}
    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
            language: {
                // The UI will be English.
                ui: 'en',
                // But the content will be edited in persian.
                content: 'fa'
            }
        }).then(editor => {
            window.editor = editor;
        }).catch(err => {
            console.error(err.stack);
        });
    </script>
@endsection