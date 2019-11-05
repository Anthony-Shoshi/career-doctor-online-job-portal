<?php

namespace App\Http\Controllers;

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
            return view('admin.home');
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
            return view('candidate.dashboard');
        }
        if (Auth::user()->user_type == 'company') {
            $perMonthJob = $this->monthly_jobs();
            return view('company.dashboard')->with('perMonthJob', $perMonthJob);
        }
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
}
