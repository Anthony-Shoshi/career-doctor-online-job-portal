<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateGeneralInfo;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function candidateProfile()
    {
        $countCandidateProfile = CandidateGeneralInfo::where('user_id', auth::user()->id)->count();
        if ($countCandidateProfile == 0) {
            return view('candidate.addProfile');
        } else {
            $candidateGeneralInfo = CandidateGeneralInfo::where('user_id', auth::user()->id)->first();
            return view('candidate.editProfile')->with('candidateGeneralInfo', $candidateGeneralInfo);
        }
    }

    public function saveCandidateProfile(Request $request)
    {

        $this->validate($request, [
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'current_address' => 'required',
            'current_city_id' => 'required',
            'current_postcode' => 'required',
            'current_country_id' => 'required',
            'current_status' => 'required',
        ]);

        $candidateGeneralInfo = new CandidateGeneralInfo();
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = 1;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = 1;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = 1;
        $candidateGeneralInfo->current_status = 1;

        $candidateGeneralInfo->save();

        return redirect()->back()->with('success', 'Profile Saved Successfully!');

    }

    public function updateCandidateProfile(Request $request)
    {
        $this->validate($request, [
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'current_address' => 'required',
            'current_city_id' => 'required',
            'current_postcode' => 'required',
            'current_country_id' => 'required',
            'current_status' => 'required',
        ]);

        $candidateGeneralInfo = CandidateGeneralInfo::findOrFail($request->id);
        $candidateGeneralInfo->user_id = auth::user()->id;
        $candidateGeneralInfo->industry_id = 1;
        $candidateGeneralInfo->current_position = $request->current_position;
        $candidateGeneralInfo->current_employer = $request->current_employer;
        $candidateGeneralInfo->short_description = $request->short_description;
        $candidateGeneralInfo->contact_email = $request->contact_email;
        $candidateGeneralInfo->contact_phone = $request->contact_phone;
        $candidateGeneralInfo->current_address = $request->current_address;
        $candidateGeneralInfo->current_city_id = 1;
        $candidateGeneralInfo->current_postcode = $request->current_postcode;
        $candidateGeneralInfo->current_country_id = 1;
        $candidateGeneralInfo->current_status = $request->current_status;

        $candidateGeneralInfo->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
    }
}
