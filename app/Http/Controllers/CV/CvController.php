<?php

namespace App\Http\Controllers\CV;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CvController extends Controller
{
    public function index()
    {
        return view('cv.home');
    }
}
