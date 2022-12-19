@extends('admin::layouts.master')
@section('title')
    ویرایش گالری ویدیو | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.videogallery') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.videogallery') }}">گالری ویدیو</a></li>
            <li class="breadcrumb-item">ویرایش گالری ویدیو</li>
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
                        <p class="tx-12 tx-gray-500 mb-2">ویرایش گالری ویدیو.
                            <a href="{{ route('admin.videogallery') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست گالری ویدیو ها</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-8">

                {{-- validation errors alert --}}
                @if ($errors->any())
                    <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                        <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span></button>

                        @foreach($errors->all() as $error)
                            <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }} </div>
                        @endforeach

                    </div>
                @endif

                {{-- form --}}
                <form action="{{ route('admin.videogallery.update', $video) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="card box-shadow-0">
                        <div class="card-header"></div>
                        <div class="card-body pt-0">
                            <div>

                                {{-- video --}}
                                <div class="form-group mb-4">
                                    <input type="file" name="video" class="dropify" data-height="200" data-default-file="{{ asset($video->video) }}">
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
                                <div class="form-group">
                                    <label class="form-label @error('title') tx-danger @enderror">عنوان گالری ویدیو:
                                        <span class="tx-danger">*</span></label>
                                    <input type="text" name="title" class="form-control @error('title') border-danger @enderror" value="{{ old('title', $video->title) }}">
                                    @error('title') <small class="tx-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- description --}}
                                <div class="form-group mb-4">
                                    <label for="body" class="@error('description') tx-danger @enderror">متن
                                        <span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control form-control-sm @error('description') border border-danger @enderror" name="description" id="editor">{{ old('description', $video->description) }}</textarea>
                                    @error('description') <small class="tx-danger">{{ $message }}</small> @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                    </button>

                    {{-- cancel --}}
                    <a href="{{ route('admin.videogallery') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
                </form>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
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