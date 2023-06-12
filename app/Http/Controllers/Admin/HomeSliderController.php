<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomeSliderRequest;
use App\Http\Requests\UpdateHomeSliderRequest;
use App\Models\HomeSlider;
use Intervention\Image\Facades\Image;

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
            'homeSliders' => HomeSlider::paginate(15),

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
        // print_r($request->all());
        try {
            $home_slider_id = HomeSlider::insertGetId($request->getMenuBarPayload());
            if ($request->hasFile('slider_photos')) {
                $uploaded_photo = $request->file('slider_photos');
                $new_upload_name ="slider_image_". $home_slider_id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/sliders/' . $new_upload_name;
                Image::make($uploaded_photo)->save(base_path($new_upload_location));
                HomeSlider::find($home_slider_id)->update([
                    'slider_photos' => $new_upload_name,
                ]);
            }
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Home Slider Added Successfully!');;
        } catch (\Exception $exception) {
            dd($exception);
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
        return view('admin.cms.home_slider.edit',[
            'homeSliders' => HomeSlider::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeSliderRequest $request, $id)
    {
        try {
            HomeSlider::find($id)->update($request->getMenuBarPayload());
            if ($request->hasFile('slider_photos')) {
                $uploaded_photo = $request->file('slider_photos');
                $new_upload_name ="slider_image_". $id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/sliders/' . $new_upload_name;
                Image::make($uploaded_photo)->save(base_path($new_upload_location));
                HomeSlider::where('id',$id)->update([
                    'slider_photos' => $new_upload_name,
                ]);
            }
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Home Slider Updated Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            HomeSlider::where('id',$id)->delete();
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Home Slider Deleted Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([HomeSliderController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
