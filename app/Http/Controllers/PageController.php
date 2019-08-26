<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('pages.aboutUs');
    }

    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function allBlog()
    {
        return view();
    }
}
