<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTermsConditionRequest;
use App\Http\Requests\UpdateTermsConditionRequest;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.terms_condition.index',
    [
        'termsConditions' => TermsCondition::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.terms_condition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermsConditionRequest $request)
    {
        try {
            TermsCondition::create($request->getMenuBarPayload());
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Terms And Condtion Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.terms_condition.edit',
    [
        'termsconditions' => TermsCondition::find($id)
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermsConditionRequest $request, $id)
    {
        try {
            $termCondition = TermsCondition::find($id);
            $termCondition->update($request->getMenuBarPayload());
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Terms and condition update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $termCondition = TermsCondition::findOrFail($id);
            $termCondition->delete();
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Terms and condition delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TermsConditionController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
