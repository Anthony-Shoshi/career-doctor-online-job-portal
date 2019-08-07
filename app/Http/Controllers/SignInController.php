<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function registerCompany()
    {
        return view('auth.registerCompany');
    }
}
