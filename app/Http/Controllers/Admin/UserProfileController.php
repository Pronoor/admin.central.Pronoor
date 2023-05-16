<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_profile.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProfileRequest $request)
    {
        try {
            // if ($request->hasFile('profile_photo')) {
            //     if(Auth::user()->profile_photo != 'default.png'){
            //         //delete Old Photo
            //         $old_photo_location = 'public/uploads/profile_photos/'.Auth::user()->profile_photo;
            //         unlink(base_path($old_photo_location));
            //     }
            //     $uploaded_photo = $request->file('profile_photo');
            //     $new_upload_name = Auth::user()->id . "." . $uploaded_photo->getClientOriginalExtension();
            //     $new_upload_location = 'public/uploads/profile_photos/' . $new_upload_name;
            //     Image::make($uploaded_photo)->resize(200,200)->save(base_path($new_upload_location), 50);
            //     User::find(Auth::user()->id)->update([
            //         'name' => $request->name,
            //         'email' => $request->email,
            //         'profile_photo' => $new_upload_name,
            //     ]);


                    if ($request->hasFile('profile_photo')) {
                        if(Auth::user()->profile_photo != 'default.png'){
                            //delete Old Photo
                            $old_photo_location = 'public/uploads/profile_photos/'.Auth::user()->profile_photo;
                            unlink(base_path($old_photo_location));
                        }
                        $uploaded_photo = $request->file('profile_photo');
                        $new_upload_name ="profile_image_". Auth::user()->id . "." . $uploaded_photo->getClientOriginalExtension();
                        $new_upload_location = 'public/uploads/profile_photos/' . $new_upload_name;
                        Image::make($uploaded_photo)->resize(360, 360)->save(base_path($new_upload_location), 50);
                        User::find(Auth::user()->id)->update([
                            'profile_photo' => $new_upload_name,
                            'name' => $request->name,
                            'email' => $request->email,
                        ]);
                    }
            // $user = User::find($id);
            // $user->update($request->getMenuBarPayload());
            return redirect()->action([UserProfileController::class, 'index'])->with('status', 'User Update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([UserProfileController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        //
    }
}
