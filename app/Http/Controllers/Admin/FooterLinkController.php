<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFooterLinksRequest;
use App\Http\Requests\UpdateFooterLinksRequest;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.footer_link.index',
            [
                'footer_links' => FooterLink::all()
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
        return view('admin.cms.footer_link.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFooterLinksRequest $request)
    {
        try {
            FooterLink::create($request->getMenuBarPayload());
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Footer Links Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.footer_link.edit', [
            'footer_link' => FooterLink::find($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFooterLinksRequest $request, $id)
    {
        try {
            $FooterLink = FooterLink::find($id);
            $FooterLink->update($request->getMenuBarPayload());
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Footer Links update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $footerLink = FooterLink::findOrFail($id);
            $footerLink->delete();
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Footer Links delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([FooterLinkController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
