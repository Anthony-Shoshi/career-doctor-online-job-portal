<?php

namespace App\Http\Controllers\Candidate;

use App\Country;
use App\City;
use App\ShortListedJob;
use App\ShortListedResume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ShortListController extends Controller
{
    public function shortListJob(Request $request){
        if ($request->job != ''){
            $shortListJob = new ShortListedJob();
            $shortListJob->candidate = Auth::user()->id;
            $shortListJob->job = $request->job;
            $shortListJob->created_by = Auth::user()->id;
            $shortListJob->updated_by = Auth::user()->id;

            $shortListJob->save();

            return redirect()->back();
        }
    }

    public function deListJob(Request $request){
        if ($request->job != ''){

            $shortListJob = ShortListedJob::where('candidate', Auth::user()->id)->where('job',$request->job)->first();
            $shortListJob->delete();

            return redirect()->back();
        }
    }

    public function viewShortListedJob(){
        $shortListedJobs = ShortListedJob::select('*','short_listed_jobs.id AS id')
                                            ->join('jobs','jobs.id','short_listed_jobs.job')
                                            ->orderBy('short_listed_jobs.created_at','DESC')
                                            ->where('candidate', Auth::user()->id)
                                            ->paginate(8);
        return view('candidate.job.viewShortListedJob')->with('shortListedJobs', $shortListedJobs);
    }

    public function shortListedJobSearch($search){
        if ($search != 'all'){
            $shortListedJobs = ShortListedJob::select('*','short_listed_jobs.id AS id')
                ->join('jobs','jobs.id','short_listed_jobs.job')
                ->orderBy('short_listed_jobs.created_at','DESC')
                ->where('jobs.title','LIKE','%'.$search.'%')
                ->where('candidate', Auth::user()->id)
                ->get();
        } else {
            $shortListedJobs = ShortListedJob::select('*','short_listed_jobs.id AS id')
                ->join('jobs','jobs.id','short_listed_jobs.job')
                ->orderBy('short_listed_jobs.created_at','DESC')
                ->where('candidate', Auth::user()->id)
                ->get();
        }
        $result = '';
        if ($shortListedJobs->count() < 1) {
            return $result .= '<tr><td colspan="4" class="text-center">No result found</td></tr>';
        } else {
            foreach ($shortListedJobs as $shortListedJob) {
                $country = Country::where('id', $shortListedJob->country_id)->first();
                $city = City::where('id', $shortListedJob->city_id)->first();
                $result .= '<tr>
                        <th scope="row">
                            '.$shortListedJob->title.'
                        </th>
                        <td>
                            '.$country->name.', '.$city->name.'
                        </td>
                        <td style="color: darkred;">
                            '.date('M d, Y', strtotime($shortListedJob->deadline)).'
                        </td>
                        <td>
                            '.$shortListedJob->created_at->format('M d, Y').'
                        </td>
                        <td>
                            <ul class="view_edit_delete_list">
                                <li class="list-inline-item"><a target="_blank" href="'.route('singleJobView',[$shortListedJob->job]).'" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                            </ul>
                        </td>
                    </tr>';
            }
        }

        return $result;

    }

    public function shortListedJobSortBy($value){
        if ($value == 'newest'){
            $shortListedJobs = ShortListedJob::select('*','short_listed_jobs.id AS id')
                ->join('jobs','jobs.id','short_listed_jobs.job')
                ->orderBy('short_listed_jobs.created_at','DESC')
                ->where('candidate', Auth::user()->id)
                ->paginate(8);
        } else if ($value == 'oldest') {
            $shortListedJobs = ShortListedJob::select('*','short_listed_jobs.id AS id')
                ->join('jobs','jobs.id','short_listed_jobs.job')
                ->orderBy('short_listed_jobs.created_at','ASC')
                ->where('candidate', Auth::user()->id)
                ->paginate(8);
        }

        $result = '';

        foreach ($shortListedJobs as $shortListedJob){
            $country = Country::where('id', $shortListedJob->country_id)->first();
            $city = City::where('id', $shortListedJob->city_id)->first();
            $result .= '<tr>
                        <th scope="row">
                            '.$shortListedJob->title.'
                        </th>
                        <td>
                            '.$country->name.', '.$city->name.'
                        </td>
                        <td style="color: darkred;">
                            '.date('M d, Y', strtotime($shortListedJob->deadline)).'
                        </td>
                        <td>
                            '.$shortListedJob->created_at->format('M d, Y').'
                        </td>
                        <td>
                            <ul class="view_edit_delete_list">
                                <li class="list-inline-item"><a target="_blank" href="'.route('singleJobView',[$shortListedJob->job]).'" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                            </ul>
                        </td>
                    </tr>';
        }

        return $result;
    }

    public function shortListResume(Request $request) {
        if ($request->candidate != ''){
            $shortListedResume = new ShortListedResume();
            $shortListedResume->company = Auth::user()->id;
            $shortListedResume->candidate = $request->candidate;
            $shortListedResume->created_by = Auth::user()->id;
            $shortListedResume->updated_by = Auth::user()->id;

            $shortListedResume->save();

            return redirect()->back();
        }
    }

    public function RemoveShortListedResume(Request $request){
        if ($request->candidate != ''){

            $shortListedResume = ShortListedResume::where('company', Auth::user()->id)->where('candidate',$request->candidate)->first();
            $shortListedResume->delete();

            return redirect()->back();
        }
    }

    public function shortListedResumes() {
        $shortListedResumes = ShortListedResume::select('*', 'short_listed_resumes.id AS id')
                                                ->join('candidate_general_infos', 'candidate_general_infos.user_id', 'short_listed_resumes.candidate')
                                                ->where('short_listed_resumes.company', Auth::user()->id)
                                                ->orderBy('short_listed_resumes.created_at', 'DESC')
                                                ->paginate(8);
        return view('company.candidate.shortListedResumes')->with('shortListedResumes', $shortListedResumes);
    }

}
