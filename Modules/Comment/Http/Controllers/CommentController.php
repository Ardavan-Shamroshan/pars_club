<?php

namespace Modules\Comment\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Http\Requests\CommentRequest;
use Modules\Comment\Notifications\NewComment;
use Modules\Post\Entities\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        return view('comment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('comment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CommentRequest $request, Post $post) {
        $inputs = $request->all();
        $inputs['author_id'] = Auth::id();
        $inputs['commentable_id'] = $post->id;
        $inputs['commentable_type'] = 'Modules\Post\Entities\Post';
        $comment = Comment::query()->create($inputs);

        // get all admin users
        $adminUsers = User::query()->where('user_type', 1)->get();
        // define details of new comment notification
        $details = [
            'user' => Auth::user(),
            'comment' => $comment->body,
            'message' => 'دیدگاه جدید وارد شده است'
        ];
        // send notification for all admin users
        foreach ($adminUsers as $admin) {
            $admin->notify(new NewComment($details));
        }

        toast('دیدگاه با موفقیت ثبت شد، برای تایید آن اندکی صبر کنید', 'success');
        return redirect()->route('post.show', $post);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('comment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('comment::edit');
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

    public function answer(CommentRequest $request, Comment $comment) {
        $inputs = $request->all();
        $inputs = $request->all();
        $inputs['author_id'] = Auth::id();
        $inputs['parent_id'] = $comment->id;
        $inputs['commentable_id'] = $comment->commentable_id;
        $inputs['commentable_type'] = $comment->commentable_type;
        $comment = Comment::query()->create($inputs);

        // get all admin users
        $adminUsers = User::query()->where('user_type', 1)->get();
        // define details of new comment notification
        $details = [
            'user' => Auth::user(),
            'comment' => $comment->body,
            'message' => 'دیدگاه جدید وارد شده است'
        ];
        // send notification for all admin users
        foreach ($adminUsers as $admin) {
            $admin->notify(new NewComment($details));
        }

        toast('پاسخ با موفقیت ثبت شد، برای تایید آن اندکی صبر کنید', 'success');
        return redirect()->route('post.show', $comment->commentable);
    }

}
