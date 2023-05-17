<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.change_password.index');
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

    //  if (Hash::check($request->old_password, Auth::user()->password)) {
    //     if ($request->old_password == $request->password) {
    //         return back()->with('new_password_error', 'Puran password abar disen kno!');
    //     } else {
    //         User::find(Auth::user()->id)->update([
    //             'password' => Hash::make($request->password),
    //         ]);
            
    //     }
    // }

    public function update(UpdateChangePasswordRequest $request)
    {
        try {
            // $user = User::find();
            // $user->update($request->getMenuBarPayload());
                if(Hash::check($request->old_password, Auth::user()->password)){
                    if ($request->password != $request->confirm_password) {
                        return redirect()->action([ChangePasswordController::class, 'index'])->with('pass_not_match', 'Confirm Password Doest Not Match With New Passeword!');
                    } else {
                        User::find(Auth::user()->id)->update([
                            'password' => Hash::make($request->password),
                        ]);
                    }
                }else{
                    return redirect()->action([ChangePasswordController::class, 'index'])->with('pass_not_match', 'Your Old Password Does Not Match With Database!');
                }
            return redirect()->action([ChangePasswordController::class, 'index'])->with('status', 'Password Update Successfully!');
        } catch (\Exception $exception) {
            return redirect()->action([ChangePasswordController::class, 'index'])->with('status', 'Something Went Wrong!');
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