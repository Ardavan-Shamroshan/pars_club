@extends('admin::layouts.master')
@section('title')
    ساخت تیم | داشبورد مدیریت
@endsection

@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">باشگاه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.league-team') }}">تیم</a></li>
            <li class="breadcrumb-item">ساخت تیم</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">تیم</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ساخت تیم.
                            <a href="{{ route('admin.league-team') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست تیم ها</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <form action="{{ route('admin.league-team.store') }}" id="form" method="post" enctype="multipart/form-data">
                @csrf

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
                                    {{-- league id --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('league_id') tx-danger @enderror">لیگ
                                            <span class="tx-danger">*</span></label>
                                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false">
                                            <select name="league_id" id="league_id" class="form-control SlectBox SumoUnder @error('league_id') border-danger @enderror" tabindex="-1">
                                                <option value="">-</option>
                                                @foreach($leagues as $league)
                                                    <option value="{{ $league->id }}" @selected(old('league_id') == $league->id)>{{ $league->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('league_id') <small class="tx-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    {{-- name --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('name') tx-danger @enderror">نام تیم:
                                            <span class="tx-danger">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}">
                                        @error('name') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- slug(url) --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">اسلاگ (نمایش در url):</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                        <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی نام تولید خواهد شد.</small>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        {{-- image --}}
                        <div class="form-group mb-4">
                            <input type="file" name="logo" class="dropify" data-height="200">
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
                    </div>
                </div>
                {{-- submit --}}
                <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                </button>

                {{-- cancel --}}
                <a href="{{ route('admin.league-team') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>

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