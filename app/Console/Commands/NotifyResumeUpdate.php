<?php

namespace App\Console\Commands;

use App\CandidateExperience;
use App\CandidateGeneralInfo;
use App\Mail\ResumeNotificationMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyResumeUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resume:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify user to update resume.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $candidates = CandidateGeneralInfo::all();
        foreach ($candidates as $candidate) {
            $userEmail = User::where('id', $candidate->user_id)->first()->email;
            $now = date('Y-m-d', strtotime(Carbon::now()));
            $sixMonthAfter = date('Y-m-d', strtotime('+6 month', strtotime($candidate->updated_at)));
            if ($now >= $sixMonthAfter) {
                Mail::to($userEmail)->send(new ResumeNotificationMail());
                echo 'date over';
            }
        }
    }
}
