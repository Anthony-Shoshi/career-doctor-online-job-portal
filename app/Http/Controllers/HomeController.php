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
            return view('company.dashboard');
        }
    }
}
