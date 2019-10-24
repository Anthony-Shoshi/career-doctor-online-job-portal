<?php

namespace App\Http\Controllers\Admin;

use App\EducationDegree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EducationDegreeController extends Controller
{
    public function addEducationDegree(){
        return view('admin.educationDegree.addEducationDegree');
    }

    public function saveEducationDegree(Request $request){
        $request->validate(
            [
                'degree_name' => 'required'
            ],
            [
                'degree_name.required' => 'Degree Name is required!'
            ]
        );

        $educationDegree = new EducationDegree();
        $educationDegree->degree_name = $request->degree_name;
        $educationDegree->degree_code = rand(1, 1000000);
        $educationDegree->degree_description = $request->degree_description;
        $educationDegree->created_by = auth::user()->id;
        $educationDegree->updated_by = auth::user()->id;
        $educationDegree->save();

        return redirect()->back()->with('success', 'Degree added successfully!');
    }

    public function educationDegreeList(){
        $educationDegrees = EducationDegree::where('is_deleted', 0)->get();
        return view('admin.educationDegree.educationDegreeList')->with('educationDegrees', $educationDegrees);
    }

    public function editEducationDegree($id){
        $educationDegree = EducationDegree::findOrFail($id);
        return view('admin.educationDegree.addEducationDegree')->with('educationDegree', $educationDegree);
    }

    public function updateEducationDegree(Request $request){
        $request->validate(
            [
                'degree_name' => 'required'
            ],
            [
                'degree_name.required' => 'Degree Name is required!'
            ]
        );

        $educationDegree = EducationDegree::findOrFail($request->id);
        $educationDegree->degree_name = $request->degree_name;
        $educationDegree->degree_code = rand(1, 1000000);
        $educationDegree->degree_description = $request->degree_description;
        $educationDegree->created_by = auth::user()->id;
        $educationDegree->updated_by = auth::user()->id;
        $educationDegree->save();

        return redirect('/educationDegreeList')->with('success', 'Degree updated successfully!');
    }

    public function deleteEducationDegree($id){
        $educationDegree = EducationDegree::findOrFail($id);
        $educationDegree->is_deleted = 1;
        $educationDegree->save();
        return redirect('/educationDegreeList')->with('delete', 'Degree deleted successfully!');
    }
}
