<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.about_us.index',
    [
        'aboutUsed' => AboutUs::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutUsRequest $request)
    {
        try {
            AboutUs::create($request->getMenuBarPayload());
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'About Us Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.cms.about_us.edit',
    [
        'aboutUsed' => AboutUs::find($id)
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutUsRequest $request, $id)
    {
        try {
            $aboutUs = AboutUs::find($id);
            $aboutUs->update($request->getMenuBarPayload());
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'About Us update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $aboutUs = AboutUs::findOrFail($id);
            $aboutUs->delete();
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'About Us delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([AboutUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
