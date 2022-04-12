<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function store(StoreBrandRequest $request)
    {
        $data = $request->all();

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid('', true)) . '.' . $image->getClientOriginalExtension();
        $image_path = 'upload/brand/' . $name_gen;
        Image::make($image)->resize(300, 300)->save($image_path);
        $data['brand_image'] = $image_path;

        $data['brand_slug_en'] = Str::slug($data['brand_name_en']);
        $data['brand_slug_pt'] = Str::slug($data['brand_name_pt']);

        Brand::create($data);

        $notification = ['alert-type' => 'success', 'message' => 'Brand inserted successfully'];
        return redirect()->back()->with($notification);
    }

    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->all();

        $data['brand_slug_en'] = Str::slug($data['brand_name_en']);
        $data['brand_slug_pt'] = Str::slug($data['brand_name_pt']);

        if($request->file('brand_image')){
            unlink($brand->brand_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid('', true)) . '.' . $image->getClientOriginalExtension();
            $image_path = 'upload/brand/' . $name_gen;
            Image::make($image)->resize(300, 300)->save($image_path);

            $data['brand_image'] = $image_path;
        }

        $brand->update($data);

        $notification = ['alert-type' => 'info', 'message' => 'Brand updated successfully'];
        return redirect()->route('admin.brands.index')->with($notification);
    }

    public function destroy(Brand $brand)
    {
        unlink($brand->brand_image);
        $brand->delete();
        $notification = ['alert-type' => 'info', 'message' => 'Brand deleted successfully'];
        return redirect()->back()->with($notification);
    }
}
