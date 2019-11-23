<?php

namespace App\Http\Controllers\Company;

use App\CandidateAchievement;
use App\CandidateEducation;
use App\CandidateExperience;
use App\CandidateGeneralInfo;
use App\CandidateJobApplicationStatus;
use App\City;
use App\Country;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Auth;
use PDF;
use App\Http\Controllers\Controller;

class JobApplicationController extends Controller
{
    public function jobApplication() {
        $companyID = Auth::user()->id;
        $jobApplicationStatuses = CandidateJobApplicationStatus::select('*', 'candidate_job_application_statuses.id AS id', 'candidate_job_application_statuses.created_at AS appliedDate')
                                                                ->join('users', 'users.id', 'candidate_job_application_statuses.user')
                                                                ->join('jobs', 'jobs.id', 'candidate_job_application_statuses.job')
                                                                ->where('jobs.company', $companyID)
                                                                ->orderBy('candidate_job_application_statuses.created_at', 'DESC')
                                                                ->paginate(8);
        return view('company.job.jobApplication')->with('jobApplicationStatuses', $jobApplicationStatuses);
    }

    public function viewResumePdf($id) {
        $data['candidateApplication'] = CandidateJobApplicationStatus::findOrFail($id);
        $data['user'] = User::where('id', $data['candidateApplication']->user)->first();
        $data['candidateGeneralInfo'] = CandidateGeneralInfo::where('user_id', $data['candidateApplication']->user)->first();
        $data['candidateEducations'] = CandidateEducation::orderBy('created_at', 'DESC')->where('user_id', $data['candidateApplication']->user)->get();
        $data['candidateExperiences'] = CandidateExperience::orderBy('created_at', 'DESC')->where('user_id', $data['candidateApplication']->user)->get();
        $data['candidateAchievements'] = CandidateAchievement::orderBy('created_at', 'DESC')->where('user',$data['candidateApplication']->user)->get();
        $data['city'] = City::where('id', $data['candidateGeneralInfo']->current_city_id)->first();
        $data['country'] = Country::where('id', $data['candidateGeneralInfo']->current_country_id)->first();

        $pdf = PDF::loadView('resume.templates.' . $data['candidateApplication']->template, $data);
        return $pdf->stream($data['user']->name);
    }

    public function downloadResume($id) {
        $data['candidateApplication'] = CandidateJobApplicationStatus::findOrFail($id);
        $data['user'] = User::where('id', $data['candidateApplication']->user)->first();
        $data['candidateGeneralInfo'] = CandidateGeneralInfo::where('user_id', $data['candidateApplication']->user)->first();
        $data['candidateEducations'] = CandidateEducation::orderBy('created_at', 'DESC')->where('user_id', $data['candidateApplication']->user)->get();
        $data['candidateExperiences'] = CandidateExperience::orderBy('created_at', 'DESC')->where('user_id', $data['candidateApplication']->user)->get();
        $data['candidateAchievements'] = CandidateAchievement::orderBy('created_at', 'DESC')->where('user',$data['candidateApplication']->user)->get();
        $data['city'] = City::where('id', $data['candidateGeneralInfo']->current_city_id)->first();
        $data['country'] = Country::where('id', $data['candidateGeneralInfo']->current_country_id)->first();

        $pdf = PDF::loadView('resume.templates.' . $data['candidateApplication']->template, $data);
        return $pdf->download( $data['user']->name.'.pdf');
    }

    public function editStatus(Request $request, $id) {
        $applicationStatus = CandidateJobApplicationStatus::findOrFail($id);
        return view('company.job.modal.editStatus')->with('applicationStatus', $applicationStatus);
    }

    public function updateStatus(Request $request) {
        $applicationStatus = CandidateJobApplicationStatus::findOrFail($request->id);
        $applicationStatus->status = $request->status;
        $applicationStatus->save();

        return back()->with('success', 'Status updated successfully!');
    }

}
