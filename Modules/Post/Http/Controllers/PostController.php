<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $posts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->paginate(10);

        // get the latest Post
        $latestPost = $posts[0];

        // Posts without key:0
        $posts->forget(0);

        // latest posts
        $latestPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->take(15)
            ->get();


        // hot posts
        $hotPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 1)
            ->latest()
            ->take(15)
            ->get();

        return view('post::index', compact('posts', 'latestPost', 'hotPosts', 'latestPosts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('post::create');
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
    public function show(Post $post) {


        // latest posts
        $latestPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->latest()
            ->take(15)
            ->get();


        // hot posts
        $hotPosts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 1)
            ->latest()
            ->take(15)
            ->get();


        // editor suggest
        $editorSuggests = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 0)
            ->latest()
            ->take(3)
            ->get();

        return view('post::show', compact('post', 'editorSuggests', 'latestPosts', 'hotPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('post::edit');
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
