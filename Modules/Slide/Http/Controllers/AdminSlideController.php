<?php

namespace Modules\Slide\Http\Controllers;

use App\Http\Services\Image\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\Slide\Entities\Slide;
use Modules\Slide\Http\Requests\SlideRequest;

class AdminSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $slides = Slide::query()->paginate(10);
        $slidesCount = Slide::query()->count();
        return view('slide::admin.index', compact('slides', 'slidesCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('slide::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SlideRequest $request, ImageService $imageService) {
        $inputs = $request->all();

        // Image upload
        if ($request->hasFile('image')) {
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide');
            // Create image in 3 indexes and save
            $result = $imageService->createIndexAndSave($request->file('image'));
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.slide');
            }
            $inputs['image'] = $result;

            Slide::query()->create($inputs);
            toast('اسلاید با موفقیت ایجاد شد', 'success');
            return redirect()->route('admin.slide');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('slide::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Slide $slide) {
        return view('slide::admin.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Slide $slide, ImageService $imageService) {
        $inputs = $request->all();

        // Image upload
        if ($request->hasFile('image')) {
            if (!empty($slide->image))
                $imageService->deleteDirectoryAndFiles($slide->image['directory']);
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide');
            // Create image in 3 indexes and save
            $result = $imageService->createIndexAndSave($request->file('image'));
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.slide');
            }
            $inputs['image'] = $result;
        }

        $slide->update($inputs);
        toast('اسلاید با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.slide');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Slide $slide) {
        $slide->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return redirect()->route('admin.slide');
    }

    public function status(Slide $slide) {
        $slide->status = $slide->status == 0 ? 1 : 0;
        $result = $slide->save();

        if ($result) {
            if ($slide->status == 0)
                return response()->json(['status' => true, 'checked' => false,
                ]);
            else
                return response()->json(['status' => true, 'checked' => true,]);
        } else
            return response()->json(['status' => false]);
    }
}
