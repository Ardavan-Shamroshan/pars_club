@extends('admin::layouts.master')
@section('title')
    ساخت دسته بندی اخبار | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex justify-content-between">
                <span class="text-muted mt-1 tx-13 mb-0">مجله و خبرنامه<span class="text-muted ms-1">/</span></span>
                <span class="mt-1 tx-13 mb-0"><a href="{{ route('admin.postcategory') }}">دسته بندی اخبار</a><span class="text-muted ms-1">/</span></span>
                <h4 class="content-title mb-0 my-auto">ساخت دسته بندی اخبار</h4>
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
                        <h4 class="card-title mg-b-0">دسته بندی اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ساخت دسته بندی.
                            <a href="{{ route('admin.postcategory') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست دسته بندی ها</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                    <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">×</span></button>
                    <span class="alert-inner--icon"><i class="fe fe-info"></i></span> چند مورد را تغییر دهید و دوباره ارسال کنید.
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card box-shadow-0">
                        <div class="card-header"></div>
                        <div class="card-body pt-0">
                            <div class="">
                                <div class="form-group">
                                    <label class="form-label tx-danger">نام دسته بندی: <span class="tx-danger">*</span></label>
                                    <input type="email" class="form-control border-danger">
                                    <small class="tx-danger">نام را خالی رها نکنید</small>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">نام دسته بندی: <span class="tx-danger">*</span></label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">اسلاگ (نمایش در url):</label>
                                    <input type="email" class="form-control">
                                    <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی نام دسته بندی تولید خواهد شد.</small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">تنها انتخاب کنید</label>

                                    <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false">
                                        <select name="somename" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                            <!--placeholder-->
                                            <option title="ولوو یک ماشین است" value="volvo">ولوو</option>
                                            <option value="saab">ساب</option>
                                            <option value="mercedes">مرسدس</option>
                                            <option value="audi">آئودی</option>
                                        </select>
                                        <p class="CaptionCont SelectBox hidden" title=" ولوو">
                                            <span> ولوو</span><label><i></i></label>
                                        </p>
                                        <div class="optWrapper ">
                                            <ul class="options">
                                                <li class="opt selected" title="ولوو یک ماشین است"><label>ولوو</label>
                                                </li>
                                                <li class="opt"><label>ساب</label></li>
                                                <li class="opt"><label>مرسدس</label></li>
                                                <li class="opt"><label>آئودی</label></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                    </button>
                    <a href="{{ route('admin.postcategory') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
                </form>

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
@endsection