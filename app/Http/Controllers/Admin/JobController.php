<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function jobListForAdmin() {
        $jobs = Job::select('*', 'jobs.id AS id')
                    ->join('company_general_infos', 'company_general_infos.user_id', 'jobs.company')
                    ->get();
        return view('admin.job.jobListForAdmin')->with('jobs', $jobs);
    }

    public function candidateListForAdmin() {
        $candidates = User::select('*','users.id AS id')
                                            ->leftJoin('candidate_general_infos', function ($join){
                                                $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                                            })
                                            ->where('users.user_type', 'candidate')
                                            ->get();
        return view('admin.users.candidateListForAdmin')->with('candidates', $candidates);
    }

    public function companyListForAdmin() {
        $companies = User::select('*','users.id AS id')
            ->leftJoin('company_general_infos', function ($join){
                $join->on('company_general_infos.user_id', '=' , 'users.id');
            })
            ->where('users.user_type', 'company')
            ->get();
        return view('admin.users.companyListForAdmin')->with('companies', $companies);
    }
}
