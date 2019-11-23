<?php

namespace App\Http\Controllers\Candidate;

use App\CandidateCoverLetter;
use App\CandidateGeneralInfo;
use App\CandidateJobApplicationStatus;
use App\Job;
use App\Message;
use App\MessageThread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class JobApplyController extends Controller
{
    public function getCoverLetter() {
        $coverLetters = CandidateCoverLetter::where('user', Auth::user()->id)->where('status', 'PUBLISHED')->get();
        $option = '<option value="">Select Cover Letter</option>';
        foreach ($coverLetters as $coverLetter){
            $option .= '<option value="' . $coverLetter->id . '">' . $coverLetter->title . '</option>';
        }
        return $option;
    }

    public function applyJob($id) {
        $checkResumeCreated = CandidateGeneralInfo::where('user_id', Auth::user()->id)->exists();
        if (!$checkResumeCreated) {
            return redirect('/create/resume')->with('delete', 'Create Resume to apply through internal system!');
        } else {
            $job = Job::where('id', $id)->first();
            $coverLetters = CandidateCoverLetter::where('user', Auth::user()->id)->where('status', 'PUBLISHED')->get();
            return view('candidate.job.applyJob')->with('job', $job)->with('coverLetters', $coverLetters);
        }
    }

    public function saveApplyJob(Request $request) {
        $jobDetails = Job::where('id', $request->job_id)->first();
        $coverLetterDetails = CandidateCoverLetter::where('id', $request->coverLetter)->first();

        $this->validate($request, [
            'coverLetter' => 'required',
            'template' => 'required',
        ],
        [
            'coverLetter.required' => 'The cover letter field is required.',
            'template.required' => 'The cv template field is required.',
        ]);

        $messageThread = new MessageThread();
        $messageThread->user_from = Auth::user()->id;
        $messageThread->user_to = $jobDetails->company;
        $messageThread->subject = 'Application for the position '.$jobDetails->title;
        $messageThread->created_by = Auth::user()->id;
        $messageThread->updated_by = Auth::user()->id;

        $messageThread->save();

        $jobApplicationStatus = new CandidateJobApplicationStatus();
        $jobApplicationStatus->user = Auth::user()->id;
        $jobApplicationStatus->job = $request->job_id;
        $jobApplicationStatus->message_thread = $messageThread->id;
        $jobApplicationStatus->template = $request->template;
        $jobApplicationStatus->created_by = Auth::user()->id;
        $jobApplicationStatus->updated_by = Auth::user()->id;

        $jobApplicationStatus->save();

        $message = new Message();
        $message->thread = $messageThread->id;
        $message->user_from = Auth::user()->id;
        $message->user_to = $jobDetails->company;
        $message->message = $coverLetterDetails->description;;
        $message->created_by = Auth::user()->id;
        $message->updated_by = Auth::user()->id;

        $message->save();

        return redirect('/candidate/applied/jobs')->with('success', 'Job applied successfully!');

    }

    public function appliedJobs() {
        $candidate = Auth::user()->id;
        $appliedJobs = CandidateJobApplicationStatus::select('*', 'candidate_job_application_statuses.id AS id')
            ->join('jobs', 'jobs.id', 'candidate_job_application_statuses.job')
            ->where('user', $candidate)
            ->orderBy('candidate_job_application_statuses.created_at', 'DESC')
            ->paginate(8);
        return view('candidate.job.appliedJobs')->with('appliedJobs', $appliedJobs);
    }

    public function withdrawApplication($id) {
        $candidateApplication = CandidateJobApplicationStatus::findOrFail($id);
        $candidateApplication->status = 'WITHDRAWN';
        $candidateApplication->save();
        return back()->with('delete', 'Application withdrawn successfully!');
    }
}
