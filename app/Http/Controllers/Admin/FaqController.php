<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.faq.index',
        [
            'faqs' => Faq::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        try {
            Faq::create($request->getMenuBarPayload());
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Faq Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.faq.edit',
        [
            'fars' => Faq::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        try {
            $faq = Faq::find($id);
            $faq->update($request->getMenuBarPayload());
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Faq update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $faq = Faq::findOrFail($id);
            $faq->delete();
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Faq delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FaqController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
