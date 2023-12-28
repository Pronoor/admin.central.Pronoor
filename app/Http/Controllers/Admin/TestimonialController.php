<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.testimonial.index',
        [
            'testimonials' => Testimonial::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        try {
            $payload = $request->getMenuBarPayload();

            if($request->file('image')){
                $logoPath = $request->file('image')->store('uploads/testimonials', 'public');
                $payload['image'] = $logoPath;
            }

            Testimonial::create($payload);
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Testimonial Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.testimonial.edit',
        [
            'testimonials' => Testimonial::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        try {

            $payload = $request->getMenuBarPayload([
                'quote' =>$request->quote,
                'quotes_given_by' =>$request->quotes_given_by,
                'quotes_given_by_profession' =>$request->quotes_given_by_profession
            ]);

            if($request->file('image')){
                $logoPath = $request->file('image')->store('uploads/testimonials', 'public');
                $payload['image'] = $logoPath;
            }

            Testimonial::find($id)->update($payload);
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Testimonial Updated Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            Testimonial::where('id',$id)->delete();
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Testimonial Deleted Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TestimonialController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
