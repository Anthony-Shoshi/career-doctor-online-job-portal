<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\CompanyGeneralInfo;
use App\Country;
use App\City;
use App\JobIndustry;
use Illuminate\Support\Facades\Hash;
use auth;


class SignInController extends Controller
{
    public function registerCompany()
    {
        $jobIndustries = JobIndustry::all();
        $countries = Country::all();
        return view('auth.registerCompany')->with('countries', $countries)->with('jobIndustries', $jobIndustries);
    }

    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->orderBy('name', 'asc')->pluck("name", "id");
        return json_encode($cities);
    }

    public function saveRegisterCompany(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->image = 'upload/company/profile/default.jpg';
        // if ($request->file('image')) {
        //     $cvImage = $request->file('image');
        //     $imageOrigirnalName = $cvImage->getClientOriginalName();
        //     $imageName = rand(time(), 1000) . '_' . $imageOrigirnalName;
        //     $uploadPath = 'uploads/user/cvImage/';
        //     $cvImage->move($uploadPath, $imageName);
        //     $imageUrl = $uploadPath . $imageName;
        //     $personalInformation->image = $imageUrl;
        // } else {
        //     $mostWanted->image = 'upload/mostwanted/default.jgp';
        // }

        $user->hash_key = 'anything';
        $user->unique_id = rand(1, 100000);
        $user->password = hash::make($request->password);
        $user->save();

        $companyGeneralInfo = new CompanyGeneralInfo();
        $companyGeneralInfo->user_id = $user->id;
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

        $companyGeneralInfo->company_description = $request->company_description;
        $companyGeneralInfo->contact_person_name = $request->contact_person_name;
        $companyGeneralInfo->contact_person_email = $request->contact_person_email;
        $companyGeneralInfo->contact_person_position = $request->contact_person_position;
        $companyGeneralInfo->contact_person_phone = $request->contact_person_phone;

        $companyGeneralInfo->save();

        auth()->login($user);

        return redirect('/home');


    }
}
