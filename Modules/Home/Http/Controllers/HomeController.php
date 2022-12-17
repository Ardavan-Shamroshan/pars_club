<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\Slide\Entities\Slide;
use Modules\VideoGallery\Entities\VideoGallery;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        // recommended posts
        $recommendedPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 0)
            ->get();

        // transfer posts
        $transferPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 2)
            ->get();

        // video posts
        $videoPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->whereNotIn('label', [0, 1, 2])
            ->get();


        // latest posts
        $latestPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        // posts
        $posts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->paginate(4);

        // slides
        $slides = Slide::query()->where('status', 1)
            ->latest()
            ->get();

        // slides
        $videos = VideoGallery::query()->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('home::index', compact('recommendedPosts', 'transferPosts', 'videoPosts', 'latestPosts', 'posts', 'slides', 'videos'));
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
}
