<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cms\FaqResource;
use App\Http\Resources\Cms\FaqsCollection;
use App\Http\Resources\Cms\SliderCollection;
use App\Http\Resources\Cms\SliderResource;
use App\Traits\Cms\FaqsTrait;
use App\Traits\Cms\SliderTrait;
use Illuminate\Http\Request;

class FaqApiController extends Controller
{
    use  FaqsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $faqs = $this->getAllFaq();
            $faqsCollection = new FaqsCollection($faqs);
            return response()->json(
                $faqsCollection, 200
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
        try {
            $faqs = new FaqResource($this->showfaq($id));
            return response()->json(
                $faqs, 200
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
