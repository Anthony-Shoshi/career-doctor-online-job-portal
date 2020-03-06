<?php

namespace App\Http\Controllers\Resume;

use App\CandidateAchievement;
use App\CandidateEducation;
use App\CandidateExperience;
use App\CandidateGeneralInfo;
use App\City;
use App\Country;
use App\EducationDegree;
use App\ExperienceSkillRecord;
use App\JobIndustry;
use App\JobSkill;
use App\JobSkillsTemp;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class ResumeController extends Controller
{
    public function createResume(){
        $candidate = CandidateGeneralInfo::where('user_id', Auth::user()->id)->exists();
        if(!$candidate){
            $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->where('is_deleted', 0)->get();
            $countries = Country::all();
            $educationDegrees = EducationDegree::orderBy('degree_name', 'asc')->where('is_deleted', 0)->get();
            return view('resume.createResume')->with('countries', $countries)->with('jobIndustries', $jobIndustries)->with('educationDegrees', $educationDegrees);
        }else{
            return redirect('/edit/resume');
        }
    }

    public function saveCandidateResume(Request $request)
    {
        // candidate general info
        $candidateGeneralInfo = new CandidateGeneralInfo();
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = $request->industry_id;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->gender = $request->gender;
        $candidateGeneralInfo->date_of_birth = $request->date_of_birth;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = $request->current_city_id;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = $request->current_country_id;
        $candidateGeneralInfo->current_status = $request->current_status;
        $candidateGeneralInfo->created_by = auth::user()->id;
        $candidateGeneralInfo->updated_by = auth::user()->id;
        $candidateGeneralInfo->save();

        // candidate image save in User table
        $user = User::findOrFail(auth::user()->id);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = rand(time(), 1000) . '.' . $image->getClientOriginalExtension();
            $uploadPath = 'upload/candidate/profile/';
            \Image::make($image)->resize(150,130)->save(public_path('upload/candidate/profile/') . $imageName);
            $user->image = $uploadPath . $imageName;
        }

        $user->save();

        // candidate education
        if (count($request->degree) != 0) {
            for ($i = 0; $i < count($request->degree); $i++) {
                if ($request->degree[$i] != '' && $request->degree_title[$i] != '' && $request->institute_name[$i] != '' && $request->location[$i] != '' && $request->grade[$i] != '') {
                    $candidateEducation = new CandidateEducation();
                    $candidateEducation->user_id = auth::user()->id;
                    $candidateEducation->degree = $request->degree[$i];
                    $candidateEducation->degree_title = $request->degree_title[$i];
                    $candidateEducation->institute_name = $request->institute_name[$i];
                    $candidateEducation->location = $request->location[$i];
                    $candidateEducation->grade = $request->grade[$i];
                    $candidateEducation->passing_year = isset($request->passing_year[$i]) ? $request->passing_year[$i] : null;
                    $candidateEducation->is_running = $request->is_running[$i];
                    $candidateEducation->created_by = auth::user()->id;
                    $candidateEducation->updated_by = auth::user()->id;
                    $candidateEducation->save();
                }
            }
        }

        // candidate experience
        if (count($request->position) != 0) {
            for ($i = 0; $i < count($request->position); $i++){
                if ($request->position[$i] != '' && $request->company_name[$i] != '' && $request->city[$i] != '' && $request->country[$i] != '' && $request->start_date[$i] != ''){
                    $candidateExperience = new CandidateExperience();
                    $candidateExperience->position = $request->position[$i];
                    $candidateExperience->company_name = $request->company_name[$i];
                    $candidateExperience->city = $request->city[$i];
                    $candidateExperience->country = $request->country[$i];
                    $candidateExperience->start_date = $request->start_date[$i];
                    $candidateExperience->end_date = isset($request->end_date[$i]) ? $request->end_date[$i] : null;
                    $candidateExperience->is_current = $request->is_current[$i];
                    $candidateExperience->experience_summary = $request->experience_summary[$i];
                    $candidateExperience->user_id = auth::user()->id;
                    $candidateExperience->created_by = auth::user()->id;
                    $candidateExperience->updated_by = auth::user()->id;
                    $candidateExperience->save();

                    //Job skills
                    $skills = explode(',', $request->skill_name[$i]);
                    foreach ($skills as $skill){
                        if (! JobSkill::where('skill_name', ucwords($skill))->exists() && $skill != ''){
                            $jobSkillsTemp = new JobSkillsTemp();
                            $jobSkillsTemp->user = auth::user()->id;
                            $jobSkillsTemp->experience_id = $candidateExperience->id;
                            $jobSkillsTemp->skill_name = ucwords($skill);
                            $jobSkillsTemp->status = 'PENDING';
                            $jobSkillsTemp->created_by = auth::user()->id;
                            $jobSkillsTemp->updated_by = auth::user()->id;
                            $jobSkillsTemp->save();
                        }
                    }

                    foreach (JobSkill::whereIn('skill_name', $skills)->get() as $skill) {
                        $experienceSkills = new ExperienceSkillRecord();
                        $experienceSkills->user = Auth::user()->id;
                        $experienceSkills->candidate_experience = $candidateExperience->id;
                        $experienceSkills->job_skill = $skill->id;
                        $experienceSkills->created_by = Auth::user()->id;
                        $experienceSkills->updated_by = Auth::user()->id;
                        $experienceSkills->save();

                    }
                }
            }
        }

        // candidate extracurricular
        if (count($request->title) != 0) {
            for ($i = 0; $i < count($request->title); $i++) {
                if ($request->title[$i] != '' && $request->type[$i] != '' && $request->date[$i] != '') {
                    $candidateAchievement = new CandidateAchievement();
                    $candidateAchievement->user = auth::user()->id;
                    $candidateAchievement->type = $request->type[$i];
                    $candidateAchievement->title = $request->title[$i];
                    $candidateAchievement->date = $request->date[$i];
                    $candidateAchievement->description = $request->description[$i];
                    $candidateAchievement->created_by = auth::user()->id;
                    $candidateAchievement->updated_by = auth::user()->id;
                    $candidateAchievement->save();
                }
            }
        }

        return redirect('/dashboard')->with('success', 'Resume created Successfully!');

    }

    public function editResume(){
        $data = array();
        $data['candidateGeneralInfo'] = CandidateGeneralInfo::where('user_id', Auth::user()->id)->first();
        $data['candidateEducations'] = CandidateEducation::where('user_id', Auth::user()->id)->get();
        $data['candidateExperiences'] = CandidateExperience::where('user_id', Auth::user()->id)->get();
        $data['candidateAchievements'] = CandidateAchievement::where('user', Auth::user()->id)->get();
        $data['jobIndustries'] = JobIndustry::orderBy('industry_name', 'asc')->where('is_deleted', 0)->get();
        $data['educationDegrees'] = EducationDegree::orderBy('degree_name', 'asc')->where('is_deleted', 0)->get();
        $data['countries'] = Country::where('row_delete', 0)->get();
        $data['cities'] = City::where('country_id',$data['candidateGeneralInfo']->current_country_id)->orderBy('name','asc')->get();
        return view('resume.editResume',$data);
    }

    public function updateCandidateResume(Request $request){
        // candidate general info
        $candidateGeneralInfo = CandidateGeneralInfo::findOrFail($request->id);
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = $request->industry_id;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->gender = $request->gender;
        $candidateGeneralInfo->date_of_birth = $request->date_of_birth;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = $request->current_city_id;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = $request->current_country_id;
        $candidateGeneralInfo->current_status = $request->current_status;
        $candidateGeneralInfo->created_by = auth::user()->id;
        $candidateGeneralInfo->updated_by = auth::user()->id;
        $candidateGeneralInfo->updated_at = Carbon::now();
        $candidateGeneralInfo->save();

        // candidate image save in User table
        $user = User::findOrFail(auth::user()->id);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = rand(time(), 1000) . '.' . $image->getClientOriginalExtension();
            $uploadPath = 'upload/candidate/profile/';
            \Image::make($image)->resize(150,130)->save(public_path('upload/candidate/profile/') . $imageName);
            $user->image = $uploadPath . $imageName;
        }
        $user->save();

        // candidate education
        if (count($request->degree) != 0) {
            for ($i = 0; $i < count($request->degree); $i++) {
                if ($request->degree[$i] != '' && $request->degree_title[$i] != '' && $request->institute_name[$i] != '' && $request->location[$i] != '' && $request->grade[$i] != '') {
                    if ($request->education_id[$i] != '') {
                        $candidateEducation = CandidateEducation::findOrFail($request->education_id[$i]);
                        $candidateEducation->user_id = auth::user()->id;
                        $candidateEducation->degree = $request->degree[$i];
                        $candidateEducation->degree_title = $request->degree_title[$i];
                        $candidateEducation->institute_name = $request->institute_name[$i];
                        $candidateEducation->location = $request->location[$i];
                        $candidateEducation->grade = $request->grade[$i];
                        $candidateEducation->passing_year = (($request->is_running[$i] == 0) ? $request->passing_year[$i] : null);
                        $candidateEducation->is_running = $request->is_running[$i];
                        $candidateEducation->created_by = auth::user()->id;
                        $candidateEducation->updated_by = auth::user()->id;
                        $candidateEducation->save();
                    } else {
                        $candidateEducation = new CandidateEducation();
                        $candidateEducation->user_id = auth::user()->id;
                        $candidateEducation->degree = $request->degree[$i];
                        $candidateEducation->degree_title = $request->degree_title[$i];
                        $candidateEducation->institute_name = $request->institute_name[$i];
                        $candidateEducation->location = $request->location[$i];
                        $candidateEducation->grade = $request->grade[$i];
                        $candidateEducation->passing_year = $request->passing_year[$i];
                        $candidateEducation->is_running = $request->is_running[$i];
                        $candidateEducation->created_by = auth::user()->id;
                        $candidateEducation->updated_by = auth::user()->id;
                        $candidateEducation->save();
                    }

                }
            }
        }

        // candidate experience
        if (count($request->position) != 0) {
            for ($i = 0; $i < count($request->position); $i++){
                if ($request->position[$i] != '' && $request->company_name[$i] != '' && $request->city[$i] != '' && $request->country[$i] != '' && $request->start_date[$i] != ''){
                    if ($request->experience_id[$i] != ''){
                        $candidateExperience = CandidateExperience::findOrFail($request->experience_id[$i]);
                        $candidateExperience->position = $request->position[$i];
                        $candidateExperience->company_name = $request->company_name[$i];
                        $candidateExperience->city = $request->city[$i];
                        $candidateExperience->country = $request->country[$i];
                        $candidateExperience->start_date = $request->start_date[$i];
                        $candidateExperience->end_date = $request->end_date[$i];
                        $candidateExperience->is_current = isset($request->is_current[$i]) ? $request->is_current[$i] : null;
                        $candidateExperience->experience_summary = $request->experience_summary[$i];
                        $candidateExperience->user_id = auth::user()->id;
                        $candidateExperience->created_by = auth::user()->id;
                        $candidateExperience->updated_by = auth::user()->id;
                        $candidateExperience->save();

                    } else {
                        $candidateExperience = new CandidateExperience();
                        $candidateExperience->position = $request->position[$i];
                        $candidateExperience->company_name = $request->company_name[$i];
                        $candidateExperience->city = $request->city[$i];
                        $candidateExperience->country = $request->country[$i];
                        $candidateExperience->start_date = $request->start_date[$i];
                        $candidateExperience->end_date = $request->end_date[$i];
                        $candidateExperience->is_current = $request->is_current[$i];
                        $candidateExperience->experience_summary = $request->experience_summary[$i];
                        $candidateExperience->user_id = auth::user()->id;
                        $candidateExperience->created_by = auth::user()->id;
                        $candidateExperience->updated_by = auth::user()->id;
                        $candidateExperience->save();
                    }

                    //Job skills
                    $skills = explode(',', str_replace(' ', '', $request->skill_name[$i]));
                    //dd($skills);
                    foreach ($skills as $skill){
                        if (! JobSkill::where('skill_name', ucwords($skill))->exists() && $skill != ''){
                            $jobSkillsTemp = new JobSkillsTemp();
                            $jobSkillsTemp->user = auth::user()->id;
                            $jobSkillsTemp->experience_id = $candidateExperience->id;
                            $jobSkillsTemp->skill_name = ucwords($skill);
                            $jobSkillsTemp->status = 'PENDING';
                            $jobSkillsTemp->created_by = auth::user()->id;
                            $jobSkillsTemp->updated_by = auth::user()->id;
                            $jobSkillsTemp->save();
                        }
                    }

                    foreach (JobSkill::whereIn('skill_name', $skills)->get() as $skill) {
                        $checkSkills = ExperienceSkillRecord::where('candidate_experience', $candidateExperience->id)->where('job_skill', $skill->id)->exists();
                        if ($checkSkills) {
                            continue;
                        }
                        $experienceSkills = new ExperienceSkillRecord();
                        $experienceSkills->user = Auth::user()->id;
                        $experienceSkills->candidate_experience = $candidateExperience->id;
                        $experienceSkills->job_skill = $skill->id;
                        $experienceSkills->created_by = Auth::user()->id;
                        $experienceSkills->updated_by = Auth::user()->id;
                        $experienceSkills->save();
                    }
                }
            }
        }

        // candidate extracurricular
        if (count($request->title) != 0) {
            for ($i = 0; $i < count($request->title); $i++) {
                if ($request->title[$i] != '' && $request->type[$i] != '' && $request->date[$i] != '') {
                    if ($request->extracurricular_id[$i] != ''){
                        $candidateAchievement = CandidateAchievement::findOrFail($request->extracurricular_id[$i]);
                        $candidateAchievement->user = auth::user()->id;
                        $candidateAchievement->type = $request->type[$i];
                        $candidateAchievement->title = $request->title[$i];
                        $candidateAchievement->date = $request->date[$i];
                        $candidateAchievement->description = $request->description[$i];
                        $candidateAchievement->created_by = auth::user()->id;
                        $candidateAchievement->updated_by = auth::user()->id;
                        $candidateAchievement->save();
                    } else {
                        $candidateAchievement = new CandidateAchievement();
                        $candidateAchievement->user = auth::user()->id;
                        $candidateAchievement->type = $request->type[$i];
                        $candidateAchievement->title = $request->title[$i];
                        $candidateAchievement->date = $request->date[$i];
                        $candidateAchievement->description = $request->description[$i];
                        $candidateAchievement->created_by = auth::user()->id;
                        $candidateAchievement->updated_by = auth::user()->id;
                        $candidateAchievement->save();
                    }
                }
            }
        }

        return redirect('/dashboard')->with('success', 'Resume updated Successfully!');
    }

    public function remove($type, $id){
        if ($type == 'edu'){
            $candidateEducation = CandidateEducation::findOrFail($id);
            $candidateEducation->delete();
        } else if($type == 'extra'){
            $candidateAchievement = CandidateAchievement::findOrFail($id);
            $candidateAchievement->delete();
        } else {
            $experienceSkill = ExperienceSkillRecord::where('candidate_experience', $id);
            $experienceSkill->delete();
            $candidateExperience = CandidateExperience::findOrFail($id);
            $candidateExperience->delete();

        }
        return 'success';
    }

    public function getSkillsTag(){
        $skills = JobSkill::all()->pluck('skill_name')->toArray();
        return response($skills);
    }

    public function viewResume(){
        $candidateGeneralInfo = CandidateGeneralInfo::where('user_id', Auth::user()->id)->first();
        $skills = ExperienceSkillRecord::select('*', 'experience_skill_records.id AS id')
                                        ->join('job_skills', 'job_skills.id', 'experience_skill_records.job_skill')
                                        ->where('experience_skill_records.user', Auth::user()->id)
                                        ->pluck('skill_name')
                                        ->toArray();
        $skill_name = implode(', ', $skills);
        $data['candidateEducations'] = CandidateEducation::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get();
        $data['candidateExperiences'] = CandidateExperience::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get();
        $data['candidateAchievements'] = CandidateAchievement::orderBy('created_at', 'DESC')->where('user', Auth::user()->id)->get();
        $data['city'] = City::where('id', $candidateGeneralInfo->current_city_id)->first();
        $data['country'] = Country::where('id', $candidateGeneralInfo->current_country_id)->first();
        return view('resume.viewResume', $data)->with('candidateGeneralInfo', $candidateGeneralInfo)->with('skill_name', $skill_name);
    }

    public function remove_skill($skill = '', $experience_id = '')
    {
        $skill = JobSkill::where('skill_name', str_replace(' ', '', $skill))->first();
        $experience_skill = ExperienceSkillRecord::where('job_skill', $skill->id)->where('candidate_experience', $experience_id)->first();
        $experience_skill->delete();
        return 'success';
    }

}
