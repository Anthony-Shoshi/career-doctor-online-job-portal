<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobSkill;
use App\ViewJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->user_type == 'admin') {
            $most_views_jobs = ViewJob::select('*', \DB::raw('COUNT(view_jobs.id) AS views'))
                                        ->join('jobs', 'jobs.id', 'job')
                                        ->groupBy('job')
                                        ->orderBy('views', 'DESC')
                                        ->get();
            $top_companies = Job::select('*', \DB::raw('COUNT(jobs.id) as jobs'))
                                    ->join('company_general_infos', 'company_general_infos.user_id', 'jobs.company')
                                    ->groupBy('company')
                                    ->orderBy('jobs', 'DESC')
                                    ->get();
            $monthly_jobs_views = $this->monthly_jobs_views();
            $monthly_candidate = $this->monthly_candidate();
            $monthly_company = $this->monthly_company();
            return view('admin.home')->with('most_views_jobs', $most_views_jobs)
                                        ->with('top_companies', $top_companies)
                                        ->with('monthly_jobs_views', $monthly_jobs_views)
                                        ->with('monthly_candidate', $monthly_candidate)
                                        ->with('monthly_company', $monthly_company);
        }
        if (Auth::user()->user_type == 'candidate') {
            $jobs = DB::table('jobs')->where('is_published','1')->orderBy('created_at','DESC')->limit('4')->get();
            return view('candidate.home')->with('jobs',$jobs);
        }
        if (Auth::user()->user_type == 'company') {
            $jobs = DB::table('jobs')->where('is_published','1')->orderBy('created_at','DESC')->limit('4')->get();
            return view('company.home')->with('jobs',$jobs);
        }
        //return view('home');
    }

    public function dashboard()
    {
        if (Auth::user()->user_type == 'candidate') {
            $perMonthApplication = $this->monthly_application();
            return view('candidate.dashboard')->with('perMonthApplication', $perMonthApplication);
        }
        if (Auth::user()->user_type == 'company') {
            $perMonthJob = $this->monthly_jobs();
            $most_views_jobs = ViewJob::select('*', \DB::raw('COUNT(view_jobs.id) AS views'))
                                        ->join('jobs', 'jobs.id', 'job')
                                        ->where('company', Auth::user()->id)
                                        ->groupBy('job')
                                        ->orderBy('views', 'DESC')
                                        ->limit(5)
                                        ->get();
            return view('company.dashboard')->with('perMonthJob', $perMonthJob)->with('most_views_jobs', $most_views_jobs);
        }
    }

    private function monthly_jobs_views(){
        $year = date("Y");
        $company_id = Auth::user()->id;
        $job = "[";
        $jobPerMonth = \DB::select("SELECT m.month, IFNULL(COUNT(id),0) as total_job 
        FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH 
        UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH 
        UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH 
        UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
        LEFT JOIN view_jobs ON m.month = MONTH(view_jobs.created_at) AND YEAR(view_jobs.created_at) = $year 
        GROUP BY m.month");
        foreach($jobPerMonth as $row){
            $job .= $row->total_job . ",";
        }
        return $job."]";
    }

    private function monthly_candidate(){
        $year = date("Y");
        $candidate = "[";
        $candidatePerMonth = \DB::select("SELECT m.month, IFNULL(COUNT(id),0) as total_candidate 
        FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH 
        UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH 
        UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH 
        UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
        LEFT JOIN users ON m.month = MONTH(users.created_at) AND YEAR(users.created_at) = $year
        AND users.user_type = 'candidate' 
        GROUP BY m.month");
        foreach($candidatePerMonth as $row){
            $candidate .= $row->total_candidate . ",";
        }
        return $candidate."]";
    }

    private function monthly_company(){
        $year = date("Y");
        $company = "[";
        $companyPerMonth = \DB::select("SELECT m.month, IFNULL(COUNT(id),0) as total_company 
        FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH 
        UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH 
        UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH 
        UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
        LEFT JOIN users ON m.month = MONTH(users.created_at) AND YEAR(users.created_at) = $year
        AND users.user_type = 'company' 
        GROUP BY m.month");
        foreach($companyPerMonth as $row){
            $company .= $row->total_company . ",";
        }
        return $company."]";
    }

    private function monthly_jobs(){
        $year = date("Y");
        $company_id = Auth::user()->id;
        $job = "[";
        $jobPerMonth = \DB::select("SELECT m.month, IFNULL(COUNT(id),0) as total_job 
        FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH 
        UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH 
        UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH 
        UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
        LEFT JOIN jobs ON m.month = MONTH(jobs.created_at) AND YEAR(jobs.created_at) = $year 
        AND company = $company_id
        GROUP BY m.month");
        foreach($jobPerMonth as $row){
            $job .= $row->total_job . ",";
        }
        return $job."]";
    }

    private function monthly_application(){
        $year = date("Y");
        $candidate_id = Auth::user()->id;
        $application = "[";
        $applicationPerMonth = \DB::select("SELECT m.month, IFNULL(COUNT(id),0) as total_application 
        FROM ( SELECT 1 AS MONTH UNION SELECT 2 AS MONTH UNION SELECT 3 AS MONTH 
        UNION SELECT 4 AS MONTH UNION SELECT 5 AS MONTH UNION SELECT 6 AS MONTH 
        UNION SELECT 7 AS MONTH UNION SELECT 8 AS MONTH UNION SELECT 9 AS MONTH 
        UNION SELECT 10 AS MONTH UNION SELECT 11 AS MONTH UNION SELECT 12 AS MONTH ) AS m
        LEFT JOIN candidate_job_application_statuses ON m.month = MONTH(candidate_job_application_statuses.created_at) AND YEAR(candidate_job_application_statuses.created_at) = $year 
        AND user = $candidate_id
        GROUP BY m.month");
        foreach($applicationPerMonth as $row){
            $application .= $row->total_application . ",";
        }
        return $application."]";
    }
}
