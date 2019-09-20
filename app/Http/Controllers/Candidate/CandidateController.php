<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateGeneralInfo;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\JobIndustry;
use App\User;
use Illuminate\Support\Facades\View;
use Hash;

class CandidateController extends Controller
{
    public function candidateProfile()
    {
        return 'Currently not available';
    }
}
