@extends('admin::layouts.master')
@section('title')
    تیم ها | داشبورد مدیریت
@endsection

@section('content')

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">باشگاه</a>
            </li>
            <li class="breadcrumb-item">نتایج</li>
        </ol>
    </nav><!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0"> نتایج</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $teams->currentPage() }} از {{ $teams->lastPage() }} صفحه از همه {{ $teamsCount }} مورد .
                            <a href="{{ route('admin.team-result') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap myDiv">
                            <thead>
                            <tr>
                                <th>تیم</th>
                                <th>بازی</th>
                                <th>برد</th>
                                <th>مساوی</th>
                                <th>باخت</th>
                                <th>گل +/-</th>
                                <th>تفاضل</th>
                                <th>امتیاز</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($teamResult))
                                @foreach($teams as $team)
                                    <form action="{{ route('admin.team-result.update', $team->result) }}" id="form" method="post">
                                        @csrf @method('PUT')
                                        <tr>
                                            <td>{{ $team->name ?? '-' }}</td>
                                            <td><input type="number" class="form-control form-control-sm" name="matches" value="{{ old('matched', $team->result->matches) }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" name="won" value="{{ old('won',$team->result->won) }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" name="loss" value="{{ old('loss', $team->result->loss ) }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" name="deal" value="{{ old('deal',  $team->result->deal ) }}"></td>
                                            <td><input type="text" class="form-control form-control-sm" name="goal" value="{{ old('goal',  $team->result->goal ) }}" placeholder="13-7"></td>
                                            <td><input type="number" class="form-control form-control-sm" name="GD" value="{{ old('GD', $team->result->GD ) }}" ></td>
                                            <td><input type="number" class="form-control form-control-sm" name="points" value="{{ old('points', $team->result->points) }}"></td>
                                            <td><button type="submit" class="btn btn-link link-primary"><i class="fe fe-save"></i></button></td>
                                        </tr>
                                    </form>
                                @endforeach
                            @else
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{ $team->name ?? '-' }}</td>
                                        <td>{{ $team->result->matches ?? '-' }}</td>
                                        <td>{{ $team->result->won ?? '-' }}</td>
                                        <td>{{ $team->result->loss ?? '-' }}</td>
                                        <td>{{ $team->result->deal ?? '-' }}</td>
                                        <td>{{ $team->result->goal ?? '-' }}</td>
                                        <td>{{ $team->result->GD ?? '-' }}</td>
                                        <td>{{ $team->result->points ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('admin.team-result.edit', $team->result->id) }}"><small><i class="fe fe-edit-2"></i></small></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!--/div-->

    </div><!-- /row -->
@endsection

@section('script')
    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])
@endsection

