<?php

namespace App\Http\Controllers\Admin;

use App\JobType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobTypesController extends Controller
{
    public function addJobType(){
        return view('admin.jobTypes.addJobType');
    }

    public function saveJobType(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ],
        [
            'title.required' => 'Job type Name is required!'
        ]);

        $jobType = new JobType();
        $jobType->title = $request->title;
        $jobType->unique_id = rand(1,300);
        $jobType->description = $request->description;
        $jobType->created_by = Auth::user()->id;
        $jobType->updated_by = Auth::user()->id;
        $jobType->save();

        return redirect()->back()->with('success','Job type added successfully!');
    }

    public function jobTypeList(){
        $jobTypes = JobType::all();
        return view('admin.jobTypes.JobTypeList')->with('jobTypes',$jobTypes);
    }

    public function editJobType($id){
        $jobType = JobType::findOrFail($id);
        return view('admin.jobTypes.addJobType')->with('jobType',$jobType);
    }

    public function updateJobType(Request $request){
        $request->validate([
            'title' => 'required'
        ],
            [
                'title.required' => 'Job type Name is required!'
            ]);

        $jobType = JobType::findOrFail($request->id);
        $jobType->title = $request->title;
        $jobType->unique_id = rand(1,300);
        $jobType->description = $request->description;
        $jobType->created_by = Auth::user()->id;
        $jobType->updated_by = Auth::user()->id;
        $jobType->save();

        return redirect('jobTypeList')->with('success','Job type updated successfully!');
    }

    public function deleteJobType($id){
        $jobType = JobType::findOrFail($id);
        $jobType->delete();
        return redirect()->back()->with('delete','Job type deleted successfully!');
    }

}
