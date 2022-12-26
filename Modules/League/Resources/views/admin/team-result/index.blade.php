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
                @if(!isset($teamResult))

                    <form action="{{ route('admin.team-result.store') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    {{-- league team --}}
                                    <div class="form-group mt-4">
                                        <label class="form-label @error('league_team_id') tx-danger @enderror"></label>
                                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false">
                                            <select name="league_team_id" id="league_team_id" class="form-control SlectBox SumoUnder @error('league_team_id') border-danger @enderror" tabindex="-1">
                                                <option value="">-</option>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id }}" @selected(old('league_team_id') == $team->id)>{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('league_team_id')
                                            <small class="tx-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn p-2 btn-primary">
                                            <i class="fe fe-plus"></i> ثبت تیم
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                @endif

            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap myDiv">
                            <thead>
                            <tr>
                                <th>#</th>
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
                            @if(isset($result))
                                @foreach($teams as $team)
                                    @if($team == $result->team)
                                        <form action="{{ route('admin.team-result.update', $team->result) }}" id="form" method="post">
                                            @csrf @method('PUT')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $team->name ?? '-' }}</td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="matches" value="{{ old('matched', $team->result->matches) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="won" value="{{ old('won',$team->result->won) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="loss" value="{{ old('loss', $team->result->loss ) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="deal" value="{{ old('deal',  $team->result->deal ) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" name="goal" value="{{ old('goal',  $team->result->goal ) }}" placeholder="13-7">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="GD" value="{{ old('GD', $team->result->GD ) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" name="points" value="{{ old('points', $team->result->points) }}">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-link link-primary">
                                                        <i class="fe fe-save"></i></button>
                                                </td>
                                            </tr>
                                        </form>
                                    @endif
                                @endforeach
                            @else
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td>{{ $result->team->name ?? '-' }}</td>
                                        <td>{{ $result->matches ?? '-' }}</td>
                                        <td>{{ $result->won ?? '-' }}</td>
                                        <td>{{ $result->loss ?? '-' }}</td>
                                        <td>{{ $result->deal ?? '-' }}</td>
                                        <td>{{ $result->goal ?? '-' }}</td>
                                        <td>{{ $result->GD ?? '-' }}</td>
                                        <td>{{ $result->points ?? '-' }}</td>
                                        <td class="d-flex justify-content-start gap-3">
                                            <a href="{{ route('admin.team-result.edit', $result) }}"><small><i class="fe fe-edit-2"></i></small></a>
                                            <form action="{{ route('admin.team-result.destroy', $result) }}" method="post">
                                                @csrf @method('delete')
                                                <button type="submit" class="btn btn-sm btn-link delete">
                                                    <i class="fe fe-trash-2"></i>
                                                </button>
                                            </form>
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

