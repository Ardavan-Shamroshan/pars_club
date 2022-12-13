<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Http\Requests\MenuRequest;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        // All Categories
        $menus = Menu::query()->paginate(10);
        $menusCount = Menu::query()->count();
        return view('menu::admin.index', compact('menus', 'menusCount'));
 }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        // All active menu for parent selection
        $menus = Menu::query()->where('status', 1)->get();
        return view('menu::admin.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MenuRequest $request) {
        $inputs = $request->all();
        dd($inputs);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('menu::edit');
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
