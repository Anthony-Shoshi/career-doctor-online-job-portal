<?php

namespace App\Console\Commands;

use App\CompanyFollower;
use App\Job;
use App\JobType;
use Illuminate\Console\Command;

class CheckDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Check:Deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check deadline expired or not.';

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
        $jobs = Job::where('is_published',1)->get();
        $today = \Carbon\Carbon::now()->toDateString();
        foreach ($jobs as $job){
            if ($today > $job->deadline){
                $job->is_published = 0;
                $job->save();
            }
        }
    }
}
