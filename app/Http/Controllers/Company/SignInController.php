<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SignInController extends Controller
{
    public function registerCompany()
    {
        return view('auth.registerCompany');
    }
}
