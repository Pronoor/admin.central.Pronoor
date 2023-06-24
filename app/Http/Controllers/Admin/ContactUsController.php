<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Mail\PronoorEmail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact_us.index', [
            'contactUses' => ContactUs::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactUsRequest $request)
    {
        try {
            ContactUs::create($request->getMenuBarPayload());
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Contact Us Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.contact_us.edit', [
            'contactUses' => ContactUs::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactUsRequest $request, $id)
    {
        try {
            $contactUs = ContactUs::find($id);
            $contactUs->Update($request->getMenuBarPayload());
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Contact Us Update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $contactUs = ContactUs::findOrFail($id);
            $contactUs->delete();
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Contact Us Delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }


    public function replay($id)
    {
        return view('admin.contact_us.replay', [
            'contactUses' => ContactUs::find($id),
        ]);
    }

    public function post_replay(Request $request, $id)
    {
        try {
            $contactUs = ContactUs::find($id);
            Mail::to($contactUs->email)->send(new PronoorEmail($contactUs->first_name, $contactUs->last_name, $request->replay_body));

            $contactUs->replayed = 1;
            $contactUs->save();
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Contact Us mail successfully sent!');;
        } catch (\Exception $exception) {
            return redirect()->action([ContactUsController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }

    }
}
