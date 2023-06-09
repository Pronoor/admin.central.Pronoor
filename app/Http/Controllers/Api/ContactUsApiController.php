<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cms\ContactUsCollection;
use App\Http\Resources\Cms\ContactUsResource;
use App\Models\ContactUs;
use App\Traits\Cms\ContactUsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\StoreContactUsRequests;

class ContactUsApiController extends Controller
{
    use ContactUsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contacts = $this->getAllContact();
            $contactUsCollection = new ContactUsCollection($contacts);
            return response()->json(
                $contactUsCollection, 200
            );
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => 'Something went wrong!',
                    'error' => $exception->getMessage()
                ], 403
            );
        }
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
    public function store(StoreContactUsRequests $request)
    {
        try{
            $contactUs = ContactUs::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'replayed' => "0",
                'message_body' => $request->message_body,
            ]);
            if($contactUs){
                return response()->json([
                    'status' => 200,
                    'message' => "Your Message has been sent Successfully!",
                ],200);
            } 
        }catch(\Exception $exception){
            return response()->json([
                'status' => 500,
                    'message' => "Something Went Wrong!",
                ],500);
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
        try {
            $contacts = new ContactUsResource($this->showContact($id));
            return response()->json(
                $contacts, 200
            );
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => 'Something went wrong!',
                    'error' => $exception->getMessage()
                ], 403
            );
        }
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
    public function update(Request $request, $id)
    {
        //
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
