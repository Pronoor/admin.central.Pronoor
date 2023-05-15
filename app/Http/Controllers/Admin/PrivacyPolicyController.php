<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Requests\UpdatePrivacyPolicayRequest;
use App\Models\PrivacyPolicy;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.privacy_policy.index',
    [
        'privacyPolices' => PrivacyPolicy::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.privacy_policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrivacyPolicyRequest $request)
    {
        try {
            PrivacyPolicy::create($request->getMenuBarPayload());
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Privacy Policy Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.privacy_policy.edit',
    [
        'privacyPolices' => PrivacyPolicy::find($id)
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrivacyPolicayRequest $request, $id)
    {
        try {
            $privacyPolicy = PrivacyPolicy::find($id);
            $privacyPolicy->update($request->getMenuBarPayload());
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Privacy Policy Update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $privacyPolicy = PrivacyPolicy::findOrFail($id);
            $privacyPolicy->delete();
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Privacy Policy Delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([PrivacyPolicyController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
