<?php

namespace Modules\Comment\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Http\Requests\CommentRequest;
use Modules\Post\Entities\Post;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        // All post comments
        $comments = Comment::query()->where('commentable_type', Post::class)->filter($request)->paginate(10);
        $commentsCount = Comment::query()->count();
        // All posts with status=1 and commentable=1
        $posts = Post::query()->where(['status' => 1], ['commentable' => 1])->get();
        return view('comment::admin.index', compact('comments', 'commentsCount', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        //
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
    public function show(Comment $comment) {
        if ($comment->seen == 0) {
            // Comment has been seen
            $comment->seen = 1;
            $comment->save();
            toast('نظر دیده شد', 'success');
        }
        return view('comment::admin.show', compact('comment'));
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
    public function destroy(Comment $comment) {
        $comment->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return redirect()->route('admin.comment');
    }

    public function approve(Comment $comment) {
        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
            toast('وضعیت نظر با موفقیت تغییر کرد', 'success');
            return back();
        } else {
            toast('عملیات با خطا مواجه شد، دوباره تلاش کنید', 'error');
            return back();
        }
    }


    public function answer(CommentRequest $request, Comment $comment) {
        if ($comment->parent == null) {
            $inputs = $request->all();
            $inputs['author_id'] = Auth::id();
            $inputs['parent_id'] = $comment->id;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $inputs['approved'] = 1;
            $inputs['seen'] = 1;
            $inputs['status'] = 1;
            Comment::query()->create($inputs);
            toast('پاسخ با موفقیت ثبت شد', 'success');
        } else
            toast('عملیات پاسخ با خطا مواجه شد', 'success');
        return redirect()->route('admin.comment');
    }


//    public function status(Comment $comment) {
//        $comment->status = $comment->status == 0 ? 1 : 0;
//        $result = $comment->save();
//        if ($result) {
//            if ($comment->status == 0) {
//                return response()->json(['status' => true, 'checked' => false]);
//            } else
//                return response()->json(['status' => true, 'checked' => true]);
//        } else
//            return response()->json(['status' => false]);
//    }
}
