<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuBarRequest;
use App\Http\Requests\UpdateMenuBarRequest;
use App\Models\MenuBar;

class MenuBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.menubar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuBarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuBarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuBar  $menuBar
     * @return \Illuminate\Http\Response
     */
    public function show(MenuBar $menuBar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuBar  $menuBar
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuBar $menuBar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuBarRequest  $request
     * @param  \App\Models\MenuBar  $menuBar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuBarRequest $request, MenuBar $menuBar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuBar  $menuBar
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuBar $menuBar)
    {
        //
    }
}
