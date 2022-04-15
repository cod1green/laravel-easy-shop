<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubSubCategoryRequest;
use App\Http\Requests\UpdateSubSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.subcategory.subcategory.index',compact('subsubcategories', 'categories'));
    }

    public function store(StoreSubSubCategoryRequest $request)
    {
        $data = $request->all();

        $data['subsubcategory_slug_en'] = Str::slug($data['subsubcategory_name_en']);
        $data['subsubcategory_slug_pt'] = Str::slug($data['subsubcategory_name_pt']);

        SubSubCategory::create($data);

        $notification = ['alert-type' => 'success', 'message' => 'Sub-SubCategory Inserted Successfully'];
        return redirect()->back()->with($notification);
    }

    public function edit(SubSubCategory $subsubcategory)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();

        return view('backend.category.subcategory.subcategory.edit', compact('subsubcategory', 'categories', 'subcategories'));
    }

    public function update(UpdateSubSubCategoryRequest $request, SubSubCategory $subsubcategory)
    {
        $data = $request->all();

        $data['subsubcategory_slug_en'] = Str::slug($data['subsubcategory_name_en']);
        $data['subsubcategory_slug_pt'] = Str::slug($data['subsubcategory_name_pt']);

        $subsubcategory->update($data);

        $notification = ['alert-type' => 'info', 'message' => 'Sub-SubCategory Update Successfully'];
        return redirect()->route('admin.categories.subcategories.subsubcategories.index')->with($notification);
    }

    public function destroy(SubSubCategory $subsubcategory)
    {
        $subsubcategory->delete();
        $notification = ['alert-type' => 'info', 'message' => 'Sub-SubCategory Deleted Successfully'];
        return redirect()->back()->with($notification);
    }
}
