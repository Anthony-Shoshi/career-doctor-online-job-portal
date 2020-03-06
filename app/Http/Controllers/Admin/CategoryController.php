<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobCategory;
use Illuminate\Support\Facades\View;
use Auth;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required',
                'category_icon' => 'required'
            ],
            [
                'category_name.required' => 'Category Name is required!',
                'category_icon.required' => 'Category Icon is required!'
            ]
        );

        $jobCategories = new JobCategory();
        $jobCategories->category_name = $request->category_name;
        $jobCategories->category_icon = $request->category_icon;
        $jobCategories->category_code = rand(1, 1000000);
        $jobCategories->category_description = $request->category_description;
        $jobCategories->created_by = auth::user()->id;
        $jobCategories->updated_by = auth::user()->id;
        $jobCategories->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function categoryList()
    {
        $jobCategories = JobCategory::where('is_deleted',0)->get();
        return view('admin.category.categoryList')->with('jobCategories', $jobCategories);
    }

    public function editCategory($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        return view('admin.category.addCategory')->with('jobCategory', $jobCategory);
    }

    public function updateCategory(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required',
                'category_icon' => 'required'
            ],
            [
                'category_name.required' => 'Category Name is required!',
                'category_icon.required' => 'Category Icon is required!'
            ]
        );

        $jobCategories = JobCategory::findOrFail($request->id);
        $jobCategories->category_name = $request->category_name;
        $jobCategories->category_icon = $request->category_icon;
        $jobCategories->category_code = rand(1, 1000000);
        $jobCategories->category_description = $request->category_description;
        $jobCategories->created_by = auth::user()->id;
        $jobCategories->updated_by = auth::user()->id;
        $jobCategories->save();

        return redirect('/categoryList')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->is_deleted = 1;
        $jobCategory->save();
        return redirect('/categoryList')->with('delete', 'Category deleted successfully!');
    }
}
