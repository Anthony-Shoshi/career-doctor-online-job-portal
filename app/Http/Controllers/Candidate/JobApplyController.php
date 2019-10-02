<?php

namespace App\Http\Controllers\Candidate;

use App\CandidateCoverLetter;
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
        $job = Job::where('id', $id)->first();
        $messageThread = MessageThread::where('user_from', Auth::user()->id)->where('user_to', $job->company)->first();
        if ($messageThread) {
            return redirect()->back()->with('delete', 'You have already applied for this job!');
        } else {
            $coverLetters = CandidateCoverLetter::where('user', Auth::user()->id)->where('status', 'PUBLISHED')->get();
            return view('candidate.job.applyJob')->with('job', $job)->with('coverLetters', $coverLetters);
        }
    }

    public function saveApplyJob(Request $request) {
        $jobDetails = Job::where('id', $request->job_id)->first();
        $coverLetterDetails = CandidateCoverLetter::where('id', $request->coverLetter)->first();

        $this->validate($request, [
            'coverLetter' => 'required',
        ],
        [
            'coverLetter.required' => 'The cover letter field is required.',
        ]);

        $messageThread = new MessageThread();
        $messageThread->user_from = Auth::user()->id;
        $messageThread->user_to = $jobDetails->company;
        $messageThread->subject = 'Application for the position '.$jobDetails->title;
        $messageThread->created_by = Auth::user()->id;
        $messageThread->updated_by = Auth::user()->id;

        $messageThread->save();

        $message = new Message();
        $message->thread = $messageThread->id;
        $message->user_from = Auth::user()->id;
        $message->user_to = $jobDetails->company;
        $message->message = $coverLetterDetails->description;;
        $message->created_by = Auth::user()->id;
        $message->updated_by = Auth::user()->id;

        $message->save();

        return redirect('/dashboard')->with('success', 'Job applied successfully!');

    }
}
