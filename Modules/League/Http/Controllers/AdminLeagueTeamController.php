<?php

namespace Modules\League\Http\Controllers;

use App\Http\Services\Image\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\League\Entities\League;
use Modules\League\Entities\LeagueTeam;
use Modules\League\Http\Requests\LeagueRequest;
use Modules\League\Http\Requests\LeagueTeamRequest;

class AdminLeagueTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $teams = LeagueTeam::query()->paginate(10);
        $teamsCount = LeagueTeam::query()->count();
        return view('league::admin.league-team.index', compact('teams', 'teamsCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        // All leagues for league selection
        $leagues = League::all();
        return view('league::admin.league-team.create', compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LeagueTeamRequest $request, ImageService $imageService) {
        $inputs = $request->all();

        // logo upload
        if ($request->hasFile('logo')) {
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'league-team');
            // Create image in 3 indexes and save
            $result = $imageService->fitAndSave($request->file('logo'), 1080, 1080);
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.league-team');
            }
            $inputs['logo'] = $result;
        }

        LeagueTeam::query()->create($inputs);
        toast('لیگ با موفقیت ایجاد شد', 'success');
        return redirect()->route('admin.league-team');
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
    public function edit(LeagueTeam $team) {
        // All leagues for league selection
        $leagues = League::all();
        return view('league::admin.league-team.edit', compact('leagues','team'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LeagueTeamRequest $request, LeagueTeam $team, ImageService $imageService) {
        $inputs = $request->all();

        // logo upload
        if ($request->hasFile('logo')) {
            if (!empty($team->logo))
                $imageService->deleteDirectoryAndFiles($team->logo);
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'league-team');
            // Create image in 3 indexes and save
            $result = $imageService->fitAndSave($request->file('logo'), 1080, 1080);
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.league');
            }
            $inputs['logo'] = $result;
        }

        $team->update($inputs);
        toast('تیم با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.league-team');
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(LeagueTeam $team) {
        $team->delete();
        toast('تیم با موفقیت حذف شد', 'success');
        return redirect()->route('admin.league-team');
    }
}
