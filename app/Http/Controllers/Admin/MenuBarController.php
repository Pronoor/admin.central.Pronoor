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
        return view('admin.cms.menubar.index',
            [
                'menus' => MenuBar::paginate(15)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cms.menubar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMenuBarRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuBarRequest $request)
    {
        try {
            MenuBar::create($request->getMenuBarPayload());
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Menu Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MenuBar $menuBar
     * @return \Illuminate\Http\Response
     */
    public function show(MenuBar $menuBar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MenuBar $menuBar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // print_r($menuBar);
        return view('admin.cms.menubar.edit',
        [
            'menuBars' => MenuBar::find($id)
        ]);
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMenuBarRequest $request
     * @param \App\Models\MenuBar $menuBar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuBarRequest $request, $id)
    {
        try {
            $menuBar = MenuBar::find($id);
            $menuBar->find($id)->update($request->getMenuBarPayload());
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Menu Updated Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MenuBar $menuBar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            MenuBar::where('id',$id)->delete();
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Menu Deleted Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([MenuBarController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
