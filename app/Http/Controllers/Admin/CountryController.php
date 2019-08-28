<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function addCountry(){
        return view('admin.country.addCountry');
    }

    public function saveCountry(Request $request){
        $request->validate([
            'name' => 'required',
            'iso3' => 'max:3',
            'iso2' => 'max:2'
        ],
            [
                'name.required' => 'The country name field is required!',
                'iso3.max' => 'The iso3 cannot be more than 3 character!',
                'iso2.max' => 'The iso2 cannot be more than 2 character!'
            ]);

        $country = new Country();
        $country->name = $request->name;
        $country->iso3 = $request->iso3;
        $country->iso2 = $request->iso2;
        $country->currency = $request->currency;
        $country->capital = $request->capital;

        $country->save();

        return redirect()->back()->with('success','Country added successfully!');
    }

    public function countryList(){
        $countries = Country::all();
        return view('admin.country.countryList')->with('countries',$countries);
    }

    public function editCountry($id){
        $country = Country::findOrFail($id);
        return view('admin.country.addCountry')->with('country',$country);
    }

    public function updateCountry(Request $request){
        $request->validate([
            'name' => 'required',
            'iso3' => 'max:3',
            'iso2' => 'max:2'
        ],
            [
                'name.required' => 'The country name field is required!',
                'iso3.max' => 'The iso3 cannot be more than 3 character!',
                'iso2.max' => 'The iso2 cannot be more than 2 character!'
            ]);

            $country = Country::findOrFail($request->id);
            $country->name = $request->name;
            $country->iso3 = $request->iso3;
            $country->iso2 = $request->iso2;
            $country->currency = $request->currency;
            $country->capital = $request->capital;

            $country->save();

        return redirect('/countryList')->with('success','Country updated successfully!');

    }

    public function deleteCountry($id){
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect('/countryList')->with('delete','Country deleted successfully!');
    }
}
