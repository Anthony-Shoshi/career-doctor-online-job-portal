<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobCategory;
use Illuminate\Support\Facades\View;

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
                'category_name' => 'required'
            ],
            [
                'category_name.required' => 'Category Name is required!'
            ]
        );

        $jobCategories = new JobCategory();
        $jobCategories->category_name = $request->category_name;
        $jobCategories->category_code = rand(1, 1000000);
        $jobCategories->category_description = $request->category_description;
        $jobCategories->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function categoryList()
    {
        $jobCategories = JobCategory::all();
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
                'category_name' => 'required'
            ],
            [
                'category_name.required' => 'Category Name is required!'
            ]
        );

        $jobCategories = JobCategory::findOrFail($request->id);
        $jobCategories->category_name = $request->category_name;
        $jobCategories->category_code = rand(1, 1000000);
        $jobCategories->category_description = $request->category_description;
        $jobCategories->save();

        return redirect('/categoryList')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->delete();
        return redirect('/categoryList')->with('delete', 'Category deleted successfully!');
    }
}
