<?php

namespace App\Http\Controllers\Company;

use App\City;
use App\CompanyFollower;
use App\CompanyRating;
use App\Job;
use App\ViewCompany;
use Carbon\Carbon;
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
        $cities = City::where('country_id',$companyGeneralInfo->company_default_country_id)->get();
        return view('company.profile.addProfile')->with(compact('jobIndustries', 'countries', 'companyGeneralInfo', 'companyImage','cities'));
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
                'contact_person_phone' => 'nullable|numeric',
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
        if ($request->hasFile('company_banner')){
            $image = $request->file('company_banner');
            $imageName = rand(time(), 1000) . '.' . $image->getClientOriginalExtension();
            $uploadPath = 'upload/company/banner/';
            \Image::make($image)->resize(150,130)->save(public_path('upload/company/banner/') . $imageName);
            $companyGeneralInfo->company_banner = $uploadPath . $imageName;
        }
        $companyGeneralInfo->company_description = $request->company_description;
        $companyGeneralInfo->contact_person_name = $request->contact_person_name;
        $companyGeneralInfo->contact_person_email = $request->contact_person_email;
        $companyGeneralInfo->contact_person_position = $request->contact_person_position;
        $companyGeneralInfo->contact_person_phone = $request->contact_person_phone;
        $companyGeneralInfo->created_by = auth::user()->id;
        $companyGeneralInfo->updated_by = auth::user()->id;
        $companyGeneralInfo->save();

        // Company profile image
        $user = User::findOrFail(auth::user()->id);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = rand(time(), 1000) . '.' . $image->getClientOriginalExtension();
            $uploadPath = 'upload/company/profile/';
            \Image::make($image)->resize(150,130)->save(public_path('upload/company/profile/') . $imageName);
            $user->image = $uploadPath . $imageName;
        }
        $user->save();

        return redirect()->back()->with('success', 'Company Profile Updated Successfully!');
    }

    public function companyProfileView($id){

        $ip = \Request::ip();
        $now = date('Y-m-d');
        $viewcompanies = ViewCompany::where('from_ip',$ip)->where('company',$id)->whereDate('created_at', $now)->exists();

        if (!$viewcompanies){
            $viewcompany = new ViewCompany();
            $viewcompany->from_ip = $ip;
            $viewcompany->company = $id;
            $viewcompany->save();
        }

        $data = array();
        $data['jobsPostedByThisCompany'] = Job::where('company', $id)->orderBy('created_at','DESC')->where('is_published', 1)->limit(3)->get();
        $data['company'] = CompanyGeneralInfo::where('user_id',$id)->first();
        $data['jobsPosted'] = Job::where('company', $id)->count();
        $data['industry'] = \App\JobIndustry::where('id', $data['company']->industry_id)->first();
        $data['country'] = Country::where('id', $data['company']->company_default_country_id)->first();
        $data['city'] = City::where('id', $data['company']->company_default_city_id)->first();
        $data['companyFollower'] = CompanyFollower::where('company',$data['company']->user_id)->count();
        $data['companyImage'] = User::where('id',$data['company']->user_id)->first()->image;
        $data['perDayViewer'] = ViewCompany::where('company',$id)->whereDate('created_at', $now)->count();
        $data['totalViewer'] = ViewCompany::where('company',$id)->count();
        $data['companyRating'] = array();
        $data['companyRatings'] = array();
        $companyRatings = CompanyRating::select('*', 'company_ratings.id AS id', 'company_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'company_ratings.candidate_id')
            ->orderBy('company_ratings.created_at', 'DESC')
            ->where('company_id', $id)
            ->where('company_ratings.is_deleted', 0)
            ->get();

        foreach ($companyRatings as $companyRating){
            $data['companyRatings'][$companyRating->candidate_id] = $companyRating;
        }
        if (Auth::check()) {
            if (isset($data['companyRatings'][Auth::user()->id])){
                $data['companyRating'] = $data['companyRatings'][Auth::user()->id];
            }
        }
        $totalRaters = CompanyRating::where('company_id', $id)->where('company_ratings.is_deleted', 0)->count();
        $totalRating = CompanyRating::where('company_id', $id)->where('company_ratings.is_deleted', 0)->sum('rating');
        $data['avgRating'] = 0;
        if ($totalRaters > 0) {
            $data['avgRating'] = round($totalRating / $totalRaters, 1);
        }
        return view('company.profile.companyProfileView', $data);
    }

}
