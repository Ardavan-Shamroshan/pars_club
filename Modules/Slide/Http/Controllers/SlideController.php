<?php

namespace Modules\Slide\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slide\Entities\Slide;
use Modules\VideoGallery\Entities\VideoGallery;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $slides = Slide::query()
            ->where('status', 1)
            ->latest()
            ->get();
        return view('slide::index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('slide::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Slide $slide) {
        // latest videos
        $latestVideos = VideoGallery::query()
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('slide::show', compact('latestVideos', 'slide'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('slide::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        //
    }
}
