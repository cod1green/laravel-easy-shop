<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();

        return view('backend.category.subcategory.index',compact('subcategories','categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $data = $request->all();

        $data['subcategory_slug_en'] = Str::slug($data['subcategory_name_en']);
        $data['subcategory_slug_pt'] = Str::slug($data['subcategory_name_pt']);

        SubCategory::create($data);

        $notification = ['alert-type' => 'success', 'message' => 'SubCategory Inserted Successfully'];
        return redirect()->back()->with($notification);
    }



    public function edit(SubCategory $subcategory)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.subcategory.edit', compact('subcategory','categories'));
    }


    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory)
    {
        $data = $request->all();

        $data['subcategory_slug_en'] = Str::slug($data['subcategory_name_en']);
        $data['subcategory_slug_pt'] = Str::slug($data['subcategory_name_pt']);

        $subcategory->update($data);

        $notification = ['alert-type' => 'info', 'message' => 'SubCategory Updated Successfully'];
        return redirect()->route('admin.categories.subcategories.index')->with($notification);
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        $notification = ['alert-type' => 'info', 'message' => 'SubCategory Deleted Successfully'];
        return redirect()->back()->with($notification);
    }

    public function getSubCategory($categoryId)
    {
        $subcat = SubCategory::where('category_id',$categoryId)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
}
