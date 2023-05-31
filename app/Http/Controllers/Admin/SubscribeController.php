<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscribe.index',[
            'subscribers' => Subscribe::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscribe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscribeRequest $request)
    {
        try {
            Subscribe::create($request->getMenuBarPayload());
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Email Added Successfully!');
        } catch (\Exception $exception) {
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Something Went Wrong!');
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
        return view('admin.subscribe.edit',
    [
        'subscribes' => Subscribe::find($id),
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubscribeRequest $request, $id)
    {
        try {
            $aboutUs = Subscribe::find($id);
            $aboutUs->update($request->getMenuBarPayload());
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Email update Successfully!');
        } catch (\Exception $exception) {
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Something Went Wrong!');
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
            $aboutUs = Subscribe::findOrFail($id);
            $aboutUs->delete();
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Email delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([SubscribeController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
