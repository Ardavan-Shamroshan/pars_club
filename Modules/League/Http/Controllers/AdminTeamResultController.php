<?php

namespace Modules\League\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\League\Entities\LeagueTeam;
use Modules\League\Entities\TeamResult;
use Modules\League\Http\Requests\TeamResultRequest;

class AdminTeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $teams = LeagueTeam::query()->paginate(10);
        $teamsCount = LeagueTeam::query()->count();
        $results = TeamResult::query()->orderBy('points', 'desc')->get();
        return view('league::admin.team-result.index', compact('teamsCount', 'teams', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('league::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TeamResultRequest $request) {
        $inputs = $request->all();
        TeamResult::query()->create($inputs);
        toast('تیم با موفقیت در جدول ثبت شد', 'success');
        return redirect()->route('admin.team-result');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('league::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(TeamResult $result) {
        $teams = LeagueTeam::query()->paginate(10);
        $teamsCount = LeagueTeam::query()->count();
        return view('league::admin.team-result.index', ['teams' => $teams, 'teamsCount' => $teamsCount])->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TeamResultRequest $request, TeamResult $result) {
        $inputs = $request->all();
        $result->update($inputs);
        toast('جدول با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.team-result');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(TeamResult $result) {
        $result->delete();
        toast('تیم با موفقیت حذف شد', 'success');
        return redirect()->route('admin.team-result');
    }
}
