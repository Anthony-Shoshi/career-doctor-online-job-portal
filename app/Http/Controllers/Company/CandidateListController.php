<?php

namespace App\Http\Controllers\Company;

use App\CandidateAchievement;
use App\CandidateEducation;
use App\CandidateExperience;
use App\CandidateGeneralInfo;
use App\CandidateRating;
use App\City;
use App\Country;
use App\ExperienceSkillRecord;
use App\JobIndustry;
use App\User;
use App\ViewCandidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CandidateListController extends Controller
{
    public function candidateListView(Request $request) {
        $candidates = CandidateGeneralInfo::whereIn('current_status', [1, 2]);
        $data['jobIndustries'] = JobIndustry::orderBy('industry_name', 'ASC')->where('is_deleted', 0)->get();

        if ($request->candidate != '') {
            $candidates = $candidates->select('*', 'candidate_general_infos.id AS id')
                ->join('users', 'users.id', 'candidate_general_infos.user_id')
                ->where('users.name', 'LIKE', '%'.$request->candidate.'%');
        }

        if ($request->candidate_location != '') {
            $candidates = $candidates->select('*', 'candidate_general_infos.id AS id')
                ->join('cities', 'cities.id', 'candidate_general_infos.current_city_id')
                ->where('cities.name', 'LIKE', '%'.$request->candidate_location.'%');
        }

        if ($request->ajax()) {
            if ($request->keyword != '') {
                $candidates = $candidates->select('*', 'candidate_general_infos.id AS id')
                                        ->join('users', 'users.id', 'candidate_general_infos.user_id')
                                        ->where('users.name', 'LIKE', '%'.$request->keyword.'%');
            }
            if ($request->location != '') {
                $candidates = $candidates->select('*', 'candidate_general_infos.id AS id')
                                        ->join('cities', 'cities.id', 'candidate_general_infos.current_city_id')
                                        ->where('cities.name', 'LIKE', '%'.$request->location.'%');
            }
            if($request->position != '') {
                $candidates = $candidates->where('current_position', $request->position);
            }
            if($request->sort != '') {
                $candidates = $candidates->orderBy('candidate_general_infos.created_at', $request->sort);
            }
            if($request->skill != '') {
                $candidates = $candidates->join('experience_skill_records', 'experience_skill_records.user', 'candidate_general_infos.user_id')
                ->where('experience_skill_records.job_skill', $request->skill);
            }
            if ($request->gender != '') {
                $candidates = $candidates->where('gender', $request->gender);
            }
            if($request->industry != '') {
                $candidates = $candidates->where('industry_id', $request->industry);
            }
            $candidates = $candidates->paginate('3');
            return view('searches.searchCandidates', $data)->with('candidates', $candidates);
        }
        $candidates = $candidates->orderBy('candidate_general_infos.created_at','DESC')->paginate('3');
        return view('company.candidate.candidateListView', $data)->with('candidates', $candidates);
    }

    public function candidateProfileView($id) {
        $ip = \Request::ip();
        $now = Carbon::today();
        $viewCandidates = ViewCandidate::where('from_ip',$ip)->where('candidate',$id)->whereDate('created_at', $now)->exists();

        if (!$viewCandidates){
            $viewCandidate = new ViewCandidate();
            $viewCandidate->from_ip = $ip;
            $viewCandidate->candidate = $id;
            $viewCandidate->save();
        }

        $candidateGeneralInfo = CandidateGeneralInfo::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        $data['candidateEducations'] = CandidateEducation::orderBy('created_at', 'DESC')->where('user_id', $id)->get();
        $data['candidateExperiences'] = CandidateExperience::orderBy('created_at', 'DESC')->where('user_id', $id)->get();
        $data['candidateAchievements'] = CandidateAchievement::orderBy('created_at', 'DESC')->where('user', $id)->get();
        $data['city'] = City::where('id', $candidateGeneralInfo->current_city_id)->first();
        $data['country'] = Country::where('id', $candidateGeneralInfo->current_country_id)->first();
        $data['perDayViewer'] = ViewCandidate::where('candidate',$id)->whereDate('created_at', $now)->count();
        $data['totalViewer'] = ViewCandidate::where('candidate',$id)->count();
        $data['skills'] = ExperienceSkillRecord::select('*', 'experience_skill_records.id AS id')
            ->join('job_skills', 'job_skills.id', 'experience_skill_records.job_skill')
            ->where('experience_skill_records.user', $user->id)
            ->get();
        $data['candidateRatings'] = array();
        $data['candidateRating'] = array();
        $candidateRatings = CandidateRating::select('*', 'candidate_ratings.id AS id', 'candidate_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'candidate_ratings.company_id')
            ->orderBy('candidate_ratings.created_at', 'DESC')
            ->where('candidate_id', $id)
            ->where('candidate_ratings.is_deleted', 0)
            ->get();

        foreach ($candidateRatings as $candidateRating){
            $data['candidateRatings'][$candidateRating->company_id] = $candidateRating;
        }

        if (Auth::check()) {
            if (isset($data['candidateRatings'][Auth::user()->id])){
                $data['candidateRating'] = $data['candidateRatings'][Auth::user()->id];
            }
        }

        $totalRaters = CandidateRating::where('candidate_id', $id)->where('candidate_ratings.is_deleted', 0)->count();
        $totalRating = CandidateRating::where('candidate_id', $id)->where('candidate_ratings.is_deleted', 0)->sum('rating');
        $data['avgRating'] = 0;
        if ($totalRaters > 0) {
            $data['avgRating'] = round($totalRating / $totalRaters, 1);
        }

        return view('candidate.profile.candidateProfileView', $data)->with('user', $user)->with('candidateGeneralInfo', $candidateGeneralInfo);
    }

    public function autocompleteCandidate(Request $request) {
        $search = $request->get('term');

        $result = CandidateGeneralInfo::whereIn('current_status', [1, 2])
                                        ->join('users', 'users.id', 'candidate_general_infos.user_id')
                                        ->where('users.name', 'LIKE', '%'.$search.'%')
                                        ->get();

        return response()->json($result);
    }
}
