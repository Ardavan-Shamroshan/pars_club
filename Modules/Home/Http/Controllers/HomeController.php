<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\League\Entities\League;
use Modules\Post\Entities\Post;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Slide\Entities\Slide;
use Modules\VideoGallery\Entities\VideoGallery;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        // posts
        $posts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->whereNot('label', 2)
            ->latest()
            ->paginate(5);

        // latest posts
        $latestPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->take(15)
            ->get();

        // editor suggest
        $editorSuggests = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 0)
            ->latest()
            ->take(6)
            ->get();

        // hot posts
        $hotPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 1)
            ->latest()
            ->take(15)
            ->get();


        // banner post
        // randomly chooses a single post from is-banner posts
        $banner = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('is_banner', 1)
            ->inRandomOrder()
            ->first();


        // leagues
        $leagues = League::all();

        // world news
        $worldNews = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 2)
            ->latest()
            ->take(15)
            ->get();


        // video
        $videos = VideoGallery::query()->where('status', 1)
            ->orderBy('created_at')
            ->take(6)
            ->get();

        // get the latest Video
        $latestVideo = $videos[0];

        // Videos without key:0
        $videos->forget(0);

        // slides
        $slides = Slide::query()
            ->where('status', 1)
            ->latest()
            ->take(10)
            ->get();
        // setting
        $setting = Setting::query()->first();

        return view('home::index', compact(
            'latestPosts',
            'posts',
            'editorSuggests',
            'hotPosts',
            'worldNews',
            'banner',
            'leagues',
            'latestVideo',
            'videos',
            'slides',
            'setting',
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('home::create');
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
    public function show($id) {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('home::edit');
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

    public function aboutUs() {
        $setting = Setting::query()->first();
        return view('home::about-us', compact('setting'));
    }
}
