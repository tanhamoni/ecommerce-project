<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if (isset($request->image)) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/category', $imageName);

            $category->image = url('admin/category/' . $imageName);
        }

        $category->save();
        toastr()->success('Category create successfully.');
        return redirect('/owner/category-list');
    }

    public function list()
    {
        $categories = Category::get();
        return view('admin.category.list', compact('categories'));
    }




    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);


        if (isset($request->image)) {
            if ($category->image && file_exists('admin/category/' . basename($category->image))) {
                unlink('admin/category/' . basename($category->image));
            }

            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/category', $imageName);

            $category->image = url('admin/category/' . $imageName);
        }

        $category->save();

          toastr()->success('Category updated successfully.');
          return redirect('/owner/category-list');

    }

    public function delete($id)
{
    $category = Category::find($id);

    if (!$category) {
        toastr()->error('Category not found.');
        return redirect()->back();
    }

    // Delete image if exists
    if ($category->image && file_exists(public_path('admin/category/' . basename($category->image)))) {

        unlink(public_path('admin/category/' . basename($category->image)));
    }

    // Delete category
    $category->delete();

    toastr()->success('Category deleted successfully.');

    return redirect()->back();
}
}
