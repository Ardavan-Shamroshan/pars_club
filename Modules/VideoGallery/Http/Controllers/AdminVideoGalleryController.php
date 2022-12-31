<?php

namespace Modules\VideoGallery\Http\Controllers;

use App\Http\Services\Video\VideoService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\VideoGallery\Entities\VideoGallery;
use Modules\VideoGallery\Http\Requests\VideoGalleryRequest;

class AdminVideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $videos = VideoGallery::query()->paginate(10);
        $videosCount = VideoGallery::query()->count();
        return view('videogallery::admin.index', compact('videos', 'videosCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('videogallery::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(VideoGalleryRequest $request, VideoService $videoService) {
        $inputs = $request->all();

        // Video upload
        if ($request->hasFile('video')) {
            // Set video directory
            $videoService->setExclusiveDirectory('modules' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . 'video');
            // Save video in the exclusive directory
            $result = $videoService->save($request->file('video'));

            // If save failed
            if ($result === false) {
                toast('آپلود ویدیو با خطا مواجه شد', 'error');
                return redirect()->route('admin.videogallery');
            }

            $inputs['video'] = $result;

            VideoGallery::query()->create($inputs);
            toast('گالری ویدیو با موفقیت ایجاد شد', 'success');
            return redirect()->route('admin.videogallery');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('videogallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(VideoGallery $video) {
        return view('videogallery::admin.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(VideoGalleryRequest $request, VideoGallery $video, VideoService $videoService) {
        $inputs = $request->all();

        // Video upload
        if ($request->hasFile('video')) {
            if (!empty($video->video)) {
                $videoService->deleteDirectoryAndFiles($video->video);
            }
            // Set video directory
            $videoService->setExclusiveDirectory('gallery' . DIRECTORY_SEPARATOR . 'video');
            // Save video in the exclusive directory
            $result = $videoService->save($request->file('video'));

            // If save failed
            if ($result === false) {
                toast('آپلود ویدیو با خطا مواجه شد', 'error');
                return redirect()->route('admin.videogallery');
            }
            $inputs['video'] = $result;
        }

        $video->update($inputs);
        toast('گالری ویدیو با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.videogallery');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(VideoGallery $video) {
        $video->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return redirect()->route('admin.videogallery');
    }

    public function status(VideoGallery $video) {
        $video->status = $video->status == 0 ? 1 : 0;
        $result = $video->save();

        if ($result) {
            if ($video->status == 0)
                return response()->json(['status' => true, 'checked' => false,
                ]);
            else
                return response()->json(['status' => true, 'checked' => true,]);
        } else
            return response()->json(['status' => false]);
    }
}
