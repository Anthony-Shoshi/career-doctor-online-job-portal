<?php

namespace App\Http\Controllers\Admin;

use App\JobSkill;
use App\JobSkillsTemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobSkillsController extends Controller
{
    public function addJobSkills(){
        return view('admin.jobSkills.addJobSkills');
    }

    public function saveJobSkill(Request $request){
        $request->validate(
            [
                'skill_name' => 'required'
            ],
            [
                'skill_name.required' => 'Skill Name is required!'
            ]
        );

        $jobSkill = new JobSkill();
        $jobSkill->skill_name = ucwords($request->skill_name);
        $jobSkill->skill_code = rand(1, 1000000);
        $jobSkill->skill_description = $request->skill_description;
        $jobSkill->created_by = Auth::user()->id;
        $jobSkill->updated_by = Auth::user()->id;
        $jobSkill->save();

        return redirect()->back()->with('success', 'Job Skill added successfully!');
    }

    public function editJobSkill($id){
        $jobSkill = JobSkill::findOrFail($id);
        return view('admin.jobSkills.addJobSkills')->with('jobSkill',$jobSkill);
    }

    public function updateJobSkill(Request $request){
        $request->validate(
            [
                'skill_name' => 'required'
            ],
            [
                'skill_name.required' => 'Skill Name is required!'
            ]
        );

        $jobSkill = JobSkill::findOrFail($request->id);
        $jobSkill->skill_name = ucwords($request->skill_name);
        $jobSkill->skill_code = rand(1, 1000000);
        $jobSkill->skill_description = $request->skill_description;
        $jobSkill->created_by = Auth::user()->id;
        $jobSkill->updated_by = Auth::user()->id;
        $jobSkill->save();

        return redirect('jobSkillsList')->with('success', 'Job Skill updated successfully!');
    }

    public function deleteJobSkill($id){
        $jobSkill = JobSkill::findOrFail($id);
        $jobSkill->delete();
        return redirect()->back()->with('delete', 'Job Skill deleted successfully!');
    }

    public function jobSkillsList(){
        $jobSkills = JobSkill::all();
        return view('admin.jobSkills.jobSkillsList')->with('jobSkills',$jobSkills);
    }

    public function newJobSkillsList(){
        $jobSkillsTemps = JobSkillsTemp::all();
        return view('admin.jobSkills.newJobSkillsList')->with('jobSkillsTemps',$jobSkillsTemps);
    }

    public function acceptNewJobSkill($id){
        $jobSkillsTemp = JobSkillsTemp::findOrFail($id);
        $jobSkillsTemp->status = 'ACCEPTED';
        $jobSkillsTemp->save();
        $jobSkill = new JobSkill();
        $jobSkill->skill_name = ucwords($jobSkillsTemp->skill_name);
        $jobSkill->skill_code = rand(1, 1000000);
        $jobSkill->skill_description = $jobSkillsTemp->skill_description;
        $jobSkill->created_by = Auth::user()->id;
        $jobSkill->updated_by = Auth::user()->id;
        $jobSkill->save();
        return redirect()->back()->with('success','New skill accepted!');
    }

    public function rejectNewJobSkill($id){
        $jobSkillsTemp = JobSkillsTemp::findOrFail($id);
        $jobSkillsTemp->status = 'REJECTED';
        $jobSkillsTemp->is_deleted = 1;
        $jobSkillsTemp->save();
        return redirect()->back()->with('delete','New skill rejected!');
    }
}
