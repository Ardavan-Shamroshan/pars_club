<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;
use Modules\PostCategory\Entities\PostCategory;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        // Posts
        $posts = Post::query()->paginate(10);
        $postsCount = Post::query()->count();
        return view('post::admin.index', compact('postsCount', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        // All active categories for post category_id selection
        $categories = PostCategory::query()->where('status', 1)->get();
        // All active users for post author_id selection
        $users = User::query()->where(['user_type' => 1], ['status' => 1])->get();
        return view('post::admin.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request, ImageService $imageService) {
        $inputs = $request->all();

        // Convert timestamp to Y-m-d H:i:s format
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);


        // Image upload
        if ($request->hasFile('image')) {
            // Set image directory
            $imageService->setExclusiveDirectory('modules' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'post');
            // Create image in 3 indexes and save
            $result = $imageService->createIndexAndSave($request->file('image'));
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return redirect()->route('admin.post');
            }
            $inputs['image'] = $result;
            Post::query()->create($inputs);
            toast('خبر با موفقیت ایجاد شد', 'success');
            return redirect()->route('admin.post');
        }


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public
    function show(Post $post) {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public
    function edit($id) {
        return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public
    function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public
    function destroy($id) {
        //
    }

    public
    function status(Post $post) {
        $post->status = $post->status == 0 ? 1 : 0;
        $result = $post->save();

        if ($result) {
            if ($post->status == 0)
                return response()->json(['status' => true, 'checked' => false,
                ]);
            else
                return response()->json(['status' => true, 'checked' => true,]);
        } else
            return response()->json(['status' => false]);
    }


    public function commentable(Post $post) {
        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable == 0)
                return response()->json(['status' => true, 'checked' => false]);
            else
                return response()->json(['status' => true, 'checked' => true]);
        } else
            return response()->json(['status' => false]);
    }

}
