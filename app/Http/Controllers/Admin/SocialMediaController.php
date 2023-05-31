<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\StoreSocialMediaLinkRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.social_media_link.index',[
            'socialMediaLinks' => SocialMediaLink::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.social_media_link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialMediaLinkRequest $request)
    {
        try {
            SocialMediaLink::create($request->getMenuBarPayload());
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Social Media Link Added Successfully!');
        } catch (\Exception $exception) {
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Something Went Wrong!');
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
        return view('admin.cms.social_media_link.edit',
    [
        'socialMediaLinks' => SocialMediaLink::find($id)
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSocialMediaLinkRequest $request, $id)
    {
        try {
            $socialMediaLinks = SocialMediaLink::find($id);
            $socialMediaLinks->update($request->getMenuBarPayload());
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Social Media Link update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $socialMediaLinks = SocialMediaLink::findOrFail($id);
            $socialMediaLinks->delete();
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Social Media Link delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([SocialMediaController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
