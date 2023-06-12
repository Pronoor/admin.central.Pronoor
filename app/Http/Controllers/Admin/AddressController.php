<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.address.index',[

            'addresses' => Address::first(),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Address::create($request->all());
            return redirect()->action([AddressController::class, 'index'])->with('status', 'Create Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([AddressController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
    //     return view('admin.cms.about_us.edit',
    // [
    //     'aboutUsed' => AboutUs::find($id)
    // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $address = Address::find($id);
            $address->address = $request->address;
            $address->location = $request->location;
            $address->email = $request->email;
            $address->phone = $request->phone;
            $address->save();

            return redirect()->action([AddressController::class, 'index'])->with('status', 'Address update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([AddressController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        // try {
        //     $aboutUs = AboutUs::findOrFail($id);
        //     $aboutUs->delete();
        //     return redirect()->action([AboutUsController::class, 'index'])->with('status', 'About Us delete Successfully!');;
        // } catch (\Exception $exception) {
        //     return redirect()->action([AboutUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        // }
    }
}
