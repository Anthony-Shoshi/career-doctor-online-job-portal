<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobIndustry;
use auth;

class IndustryController extends Controller
{
    public function addIndustry()
    {
        return view('admin.industry.addIndustry');
    }

    public function saveIndustry(Request $request)
    {
        $request->validate(
            [
                'industry_name' => 'required'
            ],
            [
                'industry_name.required' => 'Industry Name is required!'
            ]
        );

        $jobIndustry = new JobIndustry();
        $jobIndustry->industry_name = $request->industry_name;
        $jobIndustry->industry_code = rand(1, 1000000);
        $jobIndustry->industry_description = $request->industry_description;
        $jobIndustry->created_by = auth::user()->id;
        $jobIndustry->updated_by = auth::user()->id;
        $jobIndustry->save();

        return redirect()->back()->with('success', 'Industry added successfully!');
    }

    public function industryList()
    {
        $jobIndustries = JobIndustry::where('is_deleted',0)->get();
        return view('admin.industry.industryList')->with('jobIndustries', $jobIndustries);
    }

    public function editIndustry($id)
    {
        $jobIndustry = JobIndustry::findOrFail($id);
        return view('admin.industry.addIndustry')->with('jobIndustry', $jobIndustry);
    }

    public function updateIndustry(Request $request)
    {
        $request->validate(
            [
                'industry_name' => 'required'
            ],
            [
                'industry_name.required' => 'Industry Name is required!'
            ]
        );

        $jobIndustry = JobIndustry::findOrFail($request->id);
        $jobIndustry->industry_name = $request->industry_name;
        $jobIndustry->industry_code = rand(1, 1000000);
        $jobIndustry->industry_description = $request->industry_description;
        $jobIndustry->created_by = auth::user()->id;
        $jobIndustry->updated_by = auth::user()->id;
        $jobIndustry->save();

        return redirect('/industryList')->with('success', 'Industry updated successfully!');
    }

    public function deleteIndustry($id)
    {
        $jobIndustry = JobIndustry::findOrFail($id);
        $jobIndustry->is_deleted = 1;
        $jobIndustry->save();
        return redirect('/industryList')->with('delete', 'Industry deleted successfully!');
    }
}
