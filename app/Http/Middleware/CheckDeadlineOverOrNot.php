<?php

namespace App\Http\Middleware;

use App\Job;
use Carbon\Carbon;
use Closure;

class CheckDeadlineOverOrNot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $jobs = Job::where('is_published',1)->get();
        $today = \Carbon\Carbon::now()->toDateString();
        foreach ($jobs as $job){
            if ($today > $job->deadline){
                $job->is_published = 0;
                $job->save();
            }
        }
        return $next($request);
    }
}
