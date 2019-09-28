<?php

namespace App\Http\Controllers\Admin;

use App\JobQualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;

class JobQualificationController extends Controller
{
    public function addJobQualification(){
        return view('admin.jobQualification.addJobQualification');
    }

    public function saveJobQualification(Request $request){
        $request->validate(
            [
                'qualification_name' => 'required'
            ],
            [
                'qualification_name.required' => 'Qualification Name is required!'
            ]
        );

        $jobQualification = new JobQualification();
        $jobQualification->qualification_name = $request->qualification_name;
        $jobQualification->qualification_code = rand(1, 1000000);
        $jobQualification->qualification_description = $request->qualification_description;
        $jobQualification->created_by = auth::user()->id;
        $jobQualification->updated_by = auth::user()->id;
        $jobQualification->save();

        return redirect()->back()->with('success', 'Qualification added successfully!');
    }

    public function jobQualificationList(){
        $jobQualifications = JobQualification::where('is_deleted', 0)->get();
        return view('admin.jobQualification.jobQualificationList')->with('jobQualifications', $jobQualifications);
    }

    public function editJobQualification($id){
        $jobQualification = JobQualification::findOrFail($id);
        return view('admin.jobQualification.addJobQualification')->with('jobQualification', $jobQualification);
    }

    public function updateJobQualification(Request $request){
        $request->validate(
            [
                'qualification_name' => 'required'
            ],
            [
                'qualification_name.required' => 'Qualification Name is required!'
            ]
        );

        $jobQualification = JobQualification::findOrFail($request->id);
        $jobQualification->qualification_name = $request->qualification_name;
        $jobQualification->qualification_code = rand(1, 1000000);
        $jobQualification->qualification_description = $request->qualification_description;
        $jobQualification->created_by = auth::user()->id;
        $jobQualification->updated_by = auth::user()->id;
        $jobQualification->save();

        return redirect('/jobQualificationList')->with('success', 'Qualification updated successfully!');
    }

    public function deleteJobQualification($id){
        $jobQualification = JobQualification::findOrFail($id);
        $jobQualification->is_deleted = 1;
        $jobQualification->save();
        return redirect('/jobQualificationList')->with('delete', 'Qualification deleted successfully!');
    }
}
