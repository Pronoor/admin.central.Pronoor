<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.service.index',
        [
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        try {
            $service_id = Service::insertGetId($request->getMenuBarPayload());
            if ($request->hasFile('service_photos')) {
                $uploaded_photo = $request->file('service_photos');
                $new_upload_name ="service_image_". $service_id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/service_photos/' . $new_upload_name;
                Image::make($uploaded_photo)->save(base_path($new_upload_location), 50);
                // $service = Service::where('id',$service_id)->first();
                // $service->service_photos =$new_upload_name;
                // $service->save();
                Service::whereId($service_id)->update([
                    'service_photos' => $new_upload_name,
                ]);
            }
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Service Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
        return view('admin.cms.service.edit',
        [
            'services' => Service::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            $service = Service::find($id);
            $service->update($request->getMenuBarPayload());
            if ($request->hasFile('service_photos')) {
                $uploaded_photo = $request->file('service_photos');
                $new_upload_name ="service_image_". $id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/service_photos/' . $new_upload_name;
                Image::make($uploaded_photo)->save(base_path($new_upload_location), 50);
                // $service = Service::where('id',$service_id)->first();
                // $service->service_photos =$new_upload_name;
                // $service->save();
                Service::whereId($id)->update([
                    'service_photos' => $new_upload_name,
                ]);
            }
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Service  update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Something Went Wrong!');;
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
            $service = Service::findOrFail($id);
            $service->delete();
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Service delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([ServiceController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
