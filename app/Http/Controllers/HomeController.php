<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('candidate.home');
        }
        if (Auth::user()->user_type == 'company') {
            return view('company.home');
        }
        //return view('home');
    }
}
