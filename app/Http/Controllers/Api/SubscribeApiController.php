<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApiSubscribeRequest;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Resources\Cms\AboutusResource;
use App\Http\Resources\SubscribeCollection;
use App\Http\Resources\SubscribeResource;
use App\Models\Subscribe;
use App\Traits\SubscribeTrait;
use Illuminate\Http\Request;

class SubscribeApiController extends Controller
{
    use  SubscribeTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $subscribes = $this->getAllSubscribe();
            $subscribeCollection = new SubscribeCollection($subscribes);
            return response()->json(
                $subscribeCollection, 200
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
    public function store(StoreApiSubscribeRequest $request)
    {
        try{
            $subscribes = Subscribe::create([
                'email' => $request->email,
            ]);
            if($subscribes){
                return response()->json([
                    'status' => 200,
                    'message' => "Thank You So Much You Are Subscribed!",
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
            $abouts= new SubscribeResource($this->showSubscribe($id));
            return response()->json(
                $abouts, 200
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
