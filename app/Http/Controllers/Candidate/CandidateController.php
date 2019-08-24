<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateGeneralInfo;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\JobIndustry;
use App\User;
use Illuminate\Support\Facades\View;
use Hash;

class CandidateController extends Controller
{
    public function candidateProfile()
    {
        $candidateProfileEmptyOrNot = CandidateGeneralInfo::all()->first();
        if (empty($candidateProfileEmptyOrNot)) {
            $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->get();
            $countries = Country::all();
            return view('candidate.profile.addProfile')->with('countries', $countries)->with('jobIndustries', $jobIndustries);
        } else {
            $countCandidateProfile = CandidateGeneralInfo::where('user_id', auth::user()->id)->count();
            if ($countCandidateProfile == 1) {
                $candidateGeneralInfo = CandidateGeneralInfo::where('user_id', auth::user()->id)->first();
                $currentCandidate = User::where('id', auth::user()->id)->first();
                $candidateImage = $currentCandidate->image;
                $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->get();
                $countries = Country::all();
                return view('candidate.profile.editProfile')->with(compact('countries', 'jobIndustries', 'candidateImage', 'candidateGeneralInfo'));
            } else {
                $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->get();
                $countries = Country::all();
                return view('candidate.profile.addProfile')->with('countries', $countries)->with('jobIndustries', $jobIndustries);
            }
        }
    }

    public function saveCandidateProfile(Request $request)
    {

        // $this->validate($request, [
        //     'contact_email' => 'required',
        //     'contact_phone' => 'required',
        //     'current_address' => 'required',
        //     'current_city_id' => 'required',
        //     'current_postcode' => 'required',
        //     'current_country_id' => 'required',
        //     'current_status' => 'required',
        // ]);
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

    public function changePassword()
    {
        return view('candidate.changePassword.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'required',
                'confirmPassword' => 'required'
            ],
            [
                'oldPassword.required' => 'The old password field is required!',
                'newPassword.required' => 'The new password field is required!',
                'confirmPassword.required' => 'The confirm password field is required!',
            ]
        );

        $user = User::findOrFail($request->id);
        if (Hash::check($request->oldPassword, $user->password)) {
            if ($request->oldPassword != $request->newPassword) {
                if ($request->newPassword == $request->confirmPassword) {
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    return redirect()->back()->with('success', 'Password changed successfully!');
                } else {
                    return redirect()->back()->with('delete', 'Confirm password not matched with new password!');
                }
            } else {
                return redirect()->back()->with('delete', 'New Password cannot be same as old password!');
            }
        } else {
            return redirect()->back()->with('delete', 'Old password not matched with stored password!');
        }

    }
}
