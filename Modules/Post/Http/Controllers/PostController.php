<?php

namespace Modules\Post\Http\Controllers;

use App\Models\User;
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
     * Show the club posts except world-news posts".
     *
     */
    public function clubNews() {
        $posts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)

            ->whereNot('label', 2)
            ->orWhereNull('label')

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


        return view('post::index', compact('posts', 'latestPost', 'hotPosts', 'latestPosts'))
            ->with('clubNews', 'آرشیو اخبار');
    }

    /**
     * Show the posts with label 2 "ورزش جهان".
     *
     */
    public function worldNews() {
        $posts = Post::query()
            ->where('published_at', '<=', now())
            ->where('status', 1)
            ->where('label', 2)
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


        return view('post::index', compact('posts', 'latestPost', 'hotPosts', 'latestPosts'))
            ->with('worldNews', 'ورزش جهان');
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
