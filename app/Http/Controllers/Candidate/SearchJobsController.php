<?php

namespace App\Http\Controllers\Candidate;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchJobsController extends Controller
{
    public function searchJobsBy(Request $request) {

        $jobs = Job::where('is_published','1');
        //keyword
        if ($request->keyword != '') {
            $jobs = $jobs->where('title', 'LIKE', '%'.$request->keyword.'%');
            session()->put('keyword', $request->keyword);
        }
        //location
        if ($request->location != '') {
            $jobs = Job::select('*')->join('cities', 'cities.id', $jobs.city_id)->where('cities.name', $request->location);
            session()->put('location', $request->location);
        }
        //job type
        if ($request->type != '') {
            $jobs = $jobs->where('job_type', $request->type);
            session()->put('type', $request->type);
        }
        //gender
        if ($request->gender != '') {
            $jobs = $jobs->where('gender', $request->gender);
            session()->put('gender', $request->gender);
        }
        //industry
        if($request->industry != '') {
            $jobs = $jobs->where('job_industry', $request->industry);
            session()->put('industry', $request->industry);
        }
        //qualification
        if($request->qualification != '') {
            $jobs = $jobs->where('job_qualification', $request->qualification);
            session()->put('qualification', $request->qualification);
        }
        //category
        if($request->category != '') {
            $jobs = $jobs->where('job_category', $request->category);
            session()->put('category', $request->category);
        }
        //less than 1year
        if ($request->experience == 'less than 1year') {
            $jobs = $jobs->where('min_exp_year', 0);
        }
        //1year to 2year
        if ($request->experience == '1year to 2year') {
            $jobs = $jobs->where('min_exp_year', 1)->where('max_exp_year', 2);
        }
        //2year to 3year
        if ($request->experience == '2year to 3year') {
            $jobs = $jobs->where('min_exp_year', 2)->where('max_exp_year', 3);
        }
        //3year to 4year
        if ($request->experience == '3year to 4year') {
            $jobs = $jobs->where('min_exp_year', 3)->where('max_exp_year', 4);
        }
        //4year to 5year
        if ($request->experience == '4year to 5year') {
            $jobs = $jobs->where('min_exp_year', 4)->where('max_exp_year', 5);
        }
        //more than 5year
        if ($request->experience == 'more than 5year') {
            $jobs = $jobs->where('max_exp_year', '>=', 5);
        }
        //last hour
        if ($request->datePosted == 'last hour') {
            $jobs = $jobs->where('created_at', '>', Carbon::now()->subHour(1));
        }
        //last 24 hour
        if ($request->datePosted == 'last 24 hour') {
            $jobs = $jobs->where('created_at', '>', Carbon::now()->subDay());
        }
        //last 7 days
        if ($request->datePosted == 'last 7 days') {
            $jobs = $jobs->where('created_at', '>', Carbon::now()->subDays(7));
        }
        //last 14 days
        if ($request->datePosted == 'last 14 days') {
            $jobs = $jobs->where('created_at', '>', Carbon::now()->subDays(14));
        }
        //last 30 days
        if ($request->datePosted == 'last 30 days') {
            $jobs = $jobs->where('created_at', '>', Carbon::now()->subDays(30));
        }
        //all
        if($request->all){
            $jobs;
            session()->put('all', $request->all);
        }
        $jobs = $jobs->orderBy('created_at','DESC')->paginate('8');

        return view('searches.searchByJobTypes')->with('jobs', $jobs);
    }

    public function autocomplete(Request $request) {
        $search = $request->get('term');

        $result = Job::where('title', 'LIKE', '%'. $search. '%')->where('is_published', 1)->get();

        return response()->json($result);
    }
}
