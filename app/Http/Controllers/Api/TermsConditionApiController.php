<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cms\TermsConditionCollection;
use App\Http\Resources\Cms\TermsConditionResource;
use App\Traits\Cms\TermsConditionTrait;
use Illuminate\Http\Request;

class TermsConditionApiController extends Controller
{
    use  TermsConditionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $terms = $this->getAllTerms();
            $termsconditionCollection = new TermsConditionCollection($terms);
            return response()->json(
                $termsconditionCollection, 200
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
            $terms = new TermsConditionResource($this->showTerms($id));
            return response()->json(
                $terms, 200
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
