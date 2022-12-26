<?php

namespace Modules\League\Http\Controllers;

use App\Http\Services\Image\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\League\Entities\League;
use Modules\League\Http\Requests\LeagueRequest;

class AdminLeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $leagues = League::query()->paginate(10);
        $leaguesCount = League::query()->count();
        return view('league::admin.league.index', compact('leagues', 'leaguesCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('league::admin.league.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LeagueRequest $request, ImageService $imageService) {
        $inputs = $request->all();

        // logo upload
        if ($request->hasFile('logo')) {
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'league');
            // Create image in 3 indexes and save
            $result = $imageService->fitAndSave($request->file('logo'), 1080, 1080);
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.league');
            }
            $inputs['logo'] = $result;
        }
        League::query()->create($inputs);
        toast('لیگ با موفقیت ایجاد شد', 'success');
        return redirect()->route('admin.league');
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
    public function edit(League $league) {
        return view('league::admin.league.edit', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LeagueRequest $request, League $league, ImageService $imageService) {
        $inputs = $request->all();

        // logo upload
        if ($request->hasFile('logo')) {
            if (!empty($league->logo))
                $imageService->deleteDirectoryAndFiles($league->logo);
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'league');
            // Create image in 3 indexes and save
            $result = $imageService->fitAndSave($request->file('logo'), 1080, 1080);
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.league');
            }
            $inputs['logo'] = $result;
        }

        $league->update($inputs);
        toast('لیگ با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.league');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(League $league) {
        $league->delete();
        toast('لیگ با موفقیت حذف شد', 'success');
        return redirect()->route('admin.league');
    }
}
