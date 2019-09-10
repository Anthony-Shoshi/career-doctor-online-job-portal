<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function addCity(){
        $allCountry = Country::all();
        return view('admin.city.addCity')->with('allCountry',$allCountry);
    }

    public function saveCity(Request $request){
        $request->validate([
            'country_id' => 'required',
            'name' => 'required'
        ],
            [
                'country_id.required' => 'The country field is required!',
                'name.required' => 'The city name field is required!'
            ]);

        $city = new City();
        $city->country_id = $request->country_id;
        $city->name = $request->name;
        $city->save();

        return redirect()->back()->with('success','City added successfully!');
    }

    public function countryListToGetCities(){
        $countries = Country::all();
        return view('admin.city.countryListToGetCities')->with('countries',$countries);
    }

    public function cityList($id){
        $country = Country::where('id',$id)->first();
        $countryName = $country->name;
        $cities = City::where('country_id',$id)->get();
        return view('admin.city.cityList')->with('cities',$cities)->with('countryName',$countryName);
    }

    public function editCity($id)
    {
        $allCountry = Country::all();
        $city = City::findOrFail($id);
        return view('admin.city.addCity')->with('city',$city)->with('allCountry',$allCountry);
    }

    public function updateCity(Request $request){
        $request->validate([
            'country_id' => 'required',
            'name' => 'required'
        ],
            [
                'country_id.required' => 'The country field is required!',
                'name.required' => 'The city name field is required!'
            ]);

        $city = City::findOrFail($request->id);
        $city->country_id = $request->country_id;
        $city->name = $request->name;
        $city->save();

        return redirect()->back()->with('success','City updated successfully!');
    }

    public function deleteCity($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->back()->with('delete','City deleted successfully!');
    }

}
