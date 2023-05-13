<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomeSliderRequest;
use App\Models\HomeSlider;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.home_slider.index',[
            'homeSliders' => HomeSlider::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.home_slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeSliderRequest $request)
    {
        print_r($request->all());
        try {
            $home_slider_id = HomeSlider::insertGetId($request->getMenuBarPayload([
            'title' => $request->title,
            'description' => $request->description,
            ]));
            if ($request->hasFile('photo')) {
                $uploaded_photo = $request->file('photo');
                $new_upload_name ="slider_image_". $home_slider_id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/sliders/' . $new_upload_name;
                Image::make($uploaded_photo)->resize(1080, 1900)->save(base_path($new_upload_location), 50);
                HomeSlider::find($home_slider_id)->update([
                    'slide_photo' => $new_upload_name,
                ]);
            }
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Home Slider Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.home_slider.edit');
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
