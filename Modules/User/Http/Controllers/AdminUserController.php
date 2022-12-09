<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\UserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        $users = User::query()->filter($request)->paginate(10);
        $usersCount = User::query()->count();
        return view('user::admin.index', compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('user::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request) {
        $inputs = $request->all();
        // Hashing password
        $inputs['password'] = Hash::make('password');
        User::query()->create($inputs);
        toast('کاربر جدید با موفقیت ثبت شد', 'success');
        return redirect()->route('admin.user');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user) {
        return view('user::admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserRequest $request, User $user) {
        $inputs = $request->all();
        // Hashing password
        $inputs['password'] = Hash::make($request->password);
        $user->update($inputs);
        toast('کاربر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user) {
        $user->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return redirect()->route('admin.user');
    }

    public function activate(User $user) {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {
            toast('وضعیت کاربر با موفقیت تغییر کرد', 'success');
            return back();
        } else {
            toast('عملیات با خطا مواجه شد، دوباره تلاش کنید', 'error');
            return back();
        }
    }
}
