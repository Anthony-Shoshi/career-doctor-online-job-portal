<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;

class ApiController extends Controller
{
    public function getCountries()
    {
        $data = Country::get();

        return response()->json($data);
    }

    public function getStates(Request $request)
    {
        $data = City::where('country_id', $request->country_id)->get();

        return response()->json($data);
    }
}
