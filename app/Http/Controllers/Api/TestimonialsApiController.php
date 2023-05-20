<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cms\AboutUsCollection;
use App\Http\Resources\Cms\TestimonialsCollection;
use App\Http\Resources\Cms\TestimonilasResource;
use App\Traits\Cms\TestimonialsTrait;
use Illuminate\Http\Request;

class TestimonialsApiController extends Controller
{
    use  TestimonialsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $testimonilas = $this->getAllTestimonial();
            $testimonialsCollection = new TestimonialsCollection($testimonilas);
            return response()->json(
                $testimonialsCollection, 200
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
            $testimonials = new TestimonilasResource($this->showTestimonial($id));
            return response()->json(
                $testimonials, 200
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
