<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return view('backend.category.index', compact('category'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        $data['category_slug_en'] = Str::slug($data['category_name_en']);
        $data['category_slug_pt'] = Str::slug($data['category_name_pt']);

        Category::create($data);

        $notification = ['alert-type' => 'success', 'message' => 'Category Inserted Successfully'];
        return redirect()->back()->with($notification);

    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->all();

        $data['category_slug_en'] = Str::slug($data['category_name_en']);
        $data['category_slug_pt'] = Str::slug($data['category_name_pt']);

        $category->update($data);

        $notification = ['alert-type' => 'success', 'message' => 'Category Updated Successfully'];
        return redirect()->route('admin.categories.index')->with($notification);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notification = ['alert-type' => 'success', 'message' => 'Category Deleted Successfully'];
        return redirect()->back()->with($notification);
    }
}
