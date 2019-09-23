<?php

namespace App\Http\Controllers\Resume;

use App\CandidateEducation;
use App\CandidateExperience;
use App\CandidateGeneralInfo;
use App\City;
use App\Country;
use App\JobIndustry;
use App\JobSkill;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class ResumeController extends Controller
{
    public function createResume(){
        $candidate = CandidateGeneralInfo::where('user_id', Auth::user()->id)->exists();
        if(!$candidate){
            $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->get();
            $countries = Country::all();
            return view('resume.createResume')->with('countries', $countries)->with('jobIndustries', $jobIndustries);
        }else{
            return redirect('/edit/resume');
        }
    }

    public function saveCandidateProfile(Request $request)
    {
        $request->validate(
            [
                'industry_id' => 'required',
                'contact_email' => 'required',
                'contact_phone' => 'required',
                'current_address' => 'required',
                'current_city_id' => 'required',
                'current_postcode' => 'required',
                'current_country_id' => 'required',
                'current_status' => 'required',
            ],
            [
                'industry_id.required' => 'The skill field is required',
                'contact_email.required' => 'The contact email field is required!',
                'contact_phone.required' => 'The contact phone number field is required!',
                'current_address.required' => 'The contact address field is required!',
                'current_city_id.required' => 'The current city field is required!',
                'current_postcode.required' => 'The current postal code field is required!',
                'current_country_id.required' => 'The current country field is required!',
                'current_status.required' => 'The current status field is required!'

            ]
        );

        $candidateGeneralInfo = new CandidateGeneralInfo();
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = $request->industry_id;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = $request->current_city_id;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = $request->current_country_id;
        $candidateGeneralInfo->current_status = $request->current_status;

        $candidateGeneralInfo->save();

        // candidate image save in User table
        $userImage = User::findOrFail(auth::user()->id);
        if ($request->file('image')) {
            $candidateImage = $request->file('image');
            $imageOrigirnalName = $candidateImage->getClientOriginalName();
            $imageName = rand(time(), 1000) . '_' . $imageOrigirnalName;
            $uploadPath = 'upload/candidate/profile/';
            $candidateImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
            $userImage->image = $imageUrl;
        } else {
            $userImage->image = 'upload/candidate/profile/default.jpg';
        }

        $userImage->save();

        return redirect()->back()->with('success', 'Profile Saved Successfully!');

    }

    public function updateCandidateProfile(Request $request)
    {
        $request->validate(
            [
                'industry_id' => 'required',
                'contact_email' => 'required',
                'contact_phone' => 'required',
                'current_address' => 'required',
                'current_city_id' => 'required',
                'current_postcode' => 'required',
                'current_country_id' => 'required',
                'current_status' => 'required',
            ],
            [
                'industry_id.required' => 'The skill field is required!',
                'contact_email.required' => 'The contact email field is required!',
                'contact_phone.required' => 'The contact phone number field is required!',
                'current_address.required' => 'The contact address field is required!',
                'current_city_id.required' => 'The current city field is required!',
                'current_postcode.required' => 'The current postal code field is required!',
                'current_country_id.required' => 'The current country field is required!',
                'current_status.required' => 'The current status field is required!'

            ]
        );


        $candidateGeneralInfo = CandidateGeneralInfo::findOrFail($request->id);
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = $request->industry_id;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = $request->current_city_id;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = $request->current_country_id;
        $candidateGeneralInfo->current_status = $request->current_status;

        $candidateGeneralInfo->save();

        // candidate image save in User table
        $userImage = User::findOrFail(auth::user()->id);
        if ($request->file('image')) {
            $candidateImage = $request->file('image');
            $imageOrigirnalName = $candidateImage->getClientOriginalName();
            $imageName = rand(time(), 1000) . '_' . $imageOrigirnalName;
            $uploadPath = 'upload/candidate/profile/';
            $candidateImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
            $userImage->image = $imageUrl;
        }

        $userImage->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
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
                    $candidateEducation->passing_year = $request->passing_year[$i];
                    $candidateEducation->is_running = $request->is_running[$i];
                    $candidateEducation->created_by = auth::user()->id;
                    $candidateEducation->updated_by = auth::user()->id;
                    $candidateEducation->save();
                }
            }
        }

//        $skills = explode(',', $request->skill_name[$i]);
//        foreach ($skills as $skill){
//            if (! JobSkill::where('skill_name', ucwords($skill))->exists() && $skill != ''){
//                $skills = new JobSkill();
//                $skills->skill_name = ucwords($skill);
//                $skills->skill_code = rand(1,90);
//                $skills->save();
//            }
//        }

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
                    $candidateExperience->end_date = $request->end_date[$i];
                    $candidateExperience->is_current = $request->is_current[$i];
                    $candidateExperience->experience_summary = $request->experience_summary[$i];
                    $candidateExperience->user_id = auth::user()->id;
                    $candidateExperience->created_by = auth::user()->id;
                    $candidateExperience->updated_by = auth::user()->id;
                    $candidateExperience->save();
                    //Job skills
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
        $data['jobIndustries'] = JobIndustry::orderBy('industry_name', 'asc')->get();
        $data['countries'] = Country::all();
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
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = $request->current_city_id;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = $request->current_country_id;
        $candidateGeneralInfo->current_status = $request->current_status;
        $candidateGeneralInfo->created_by = auth::user()->id;
        $candidateGeneralInfo->updated_by = auth::user()->id;
        //$candidateGeneralInfo->save();

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
                        $candidateExperience->is_current = $request->is_current[$i];
                        $candidateExperience->experience_summary = $request->experience_summary[$i];
                        $candidateExperience->user_id = auth::user()->id;
                        $candidateExperience->created_by = auth::user()->id;
                        $candidateExperience->updated_by = auth::user()->id;
                        $candidateExperience->save();
                        //Job skills
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
                        //Job skills
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
        } else {
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
        return view('resume.viewResume');
    }

}
