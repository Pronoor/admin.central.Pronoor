<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inventory.product.index',[
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inventory.product.create',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $home_slider_id = Product::insertGetId($request->getMenuBarPayload());
            if ($request->hasFile('image')) {
                $uploaded_photo = $request->file('image');
                $new_upload_name ="product_image_". $home_slider_id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/product_photos/' . $new_upload_name;
                Image::make($uploaded_photo)->resize(1080, 1900)->save(base_path($new_upload_location), 50);
                Product::find($home_slider_id)->update([
                    'image' => $new_upload_name,
                ]);
            }
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Product Added Successfully!');;
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.inventory.product.edit',[
            'products' => Product::find($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->update($request->getMenuBarPayload());
            if ($request->hasFile('image')) {
                $uploaded_photo = $request->file('image');
                $new_upload_name ="product_image_". $id . "." . $uploaded_photo->getClientOriginalExtension();
                $new_upload_location = 'public/uploads/product_photos/' . $new_upload_name;
                Image::make($uploaded_photo)->resize(1080, 1900)->save(base_path($new_upload_location), 50);
                Product::where('id',$id)->update([
                    'image' => $new_upload_name,
                ]);
            }
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Product Update Successfully!');;
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Product Delete Successfully!');;
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->action([ProductController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
