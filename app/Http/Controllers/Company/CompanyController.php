<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\JobIndustry;
use App\CompanyGeneralInfo;
use App\User;
use auth;
use Hash;

class CompanyController extends Controller
{
    public function companyProfile()
    {
        $currentCompany = User::where('id', auth::user()->id)->first();
        $companyImage = $currentCompany->image;
        $companyGeneralInfo = CompanyGeneralInfo::where('user_id', auth::user()->id)->first();
        $jobIndustries = JobIndustry::orderBy('industry_name', 'asc')->get();
        $countries = Country::all();
        return view('company.profile.addProfile')->with(compact('jobIndustries', 'countries', 'companyGeneralInfo', 'companyImage'));
    }

    public function updateCompanyProfile(Request $request)
    {
        $request->validate(
            [
                'company_name' => 'required',
                'industry_id' => 'required',
                'company_default_address' => 'required',
                'company_default_country_id' => 'required',
                'company_default_city_id' => 'required',
                'company_default_postcode' => 'required',
                'contact_person_name' => ['required', 'string', 'max:255'],
                'contact_person_email' => ['required', 'string', 'email', 'max:255'],
                'contact_person_position' => 'required',
            ],
            [
                'industry_id.required' => 'The industry type field is required.',
                'company_default_address.required' => 'The company address field is required.',
                'company_default_country_id.required' => 'The company country field is required.',
                'company_default_city_id.required' => 'The company city field is required.',
                'company_default_postcode.required' => 'The company postal code field is required.',
            ]
        );

        $companyGeneralInfo = CompanyGeneralInfo::findOrFail($request->id);
        $companyGeneralInfo->user_id = auth::user()->id;
        $companyGeneralInfo->industry_id = $request->industry_id;
        $companyGeneralInfo->company_name = $request->company_name;
        $companyGeneralInfo->company_default_address = $request->company_default_address;
        $companyGeneralInfo->company_default_country_id = $request->company_default_country_id;
        $companyGeneralInfo->company_default_city_id = $request->company_default_city_id;
        $companyGeneralInfo->company_default_postcode = $request->company_default_postcode;

        if ($request->file('company_banner')) {
            $companyBannerImage = $request->file('company_banner');
            $imageOrigirnalName = $companyBannerImage->getClientOriginalName();
            $imageName = rand(time(), 1000) . '_' . $imageOrigirnalName;
            $uploadPath = 'upload/company/banner/';
            $companyBannerImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
            $companyGeneralInfo->company_banner = $imageUrl;
        }
        //$companyGeneralInfo->company_banner = $request->company_banner;

        $companyGeneralInfo->company_description = $request->company_description;
        $companyGeneralInfo->contact_person_name = $request->contact_person_name;
        $companyGeneralInfo->contact_person_email = $request->contact_person_email;
        $companyGeneralInfo->contact_person_position = $request->contact_person_position;
        $companyGeneralInfo->contact_person_phone = $request->contact_person_phone;

        $companyGeneralInfo->save();

        // Company profile image
        // $userImage = User::findOrFail(auth::user()->id);
        // if ($request->file('image')) {
        //     $companyImage = $request->file('image');
        //     $imageOrigirnalName = $companyImage->getClientOriginalName();
        //     $imageName = rand(time(), 1000) . '_' . $imageOrigirnalName;
        //     $uploadPath = 'upload/company/profile/';
        //     $companyImage->move($uploadPath, $imageName);
        //     $imageUrl = $uploadPath . $imageName;
        //     $userImage->image = $imageUrl;
        // }

        // $userImage->save();

        return redirect()->back()->with('success', 'Company Profile Updated Successfully!');
    }

    public function changePassword()
    {
        return view('company.changePassword.changePassword');
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
