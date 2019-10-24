<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function welcomePage(){
        $jobs = DB::table('jobs')->where('is_published','1')->orderBy('created_at','DESC')->limit('4')->get();
        return view('welcome')->with('jobs',$jobs);
    }

    public function aboutUs()
    {
        return view('pages.aboutUs');
    }

    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function termsAndConditions() {
        return view('pages.termsAndConditions');
    }

    public function privacyAndPolicy() {
        return view('pages.privacyAndPolicy');
    }

    public function allBlog()
    {
        return view();
    }
}
