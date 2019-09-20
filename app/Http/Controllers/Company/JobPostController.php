<?php

namespace App\Http\Controllers\Company;

use App\Country;
use App\Currency;
use App\Job;
use App\JobCategory;
use App\JobIndustry;
use App\JobQualification;
use App\JobType;
use App\Rules\ApplyMethod;
use App\Rules\IsNegotiable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class JobPostController extends Controller
{
    public function postJob(){
        $data =  array();
        $data['industries'] = JobIndustry::all();
        $data['categories'] = JobCategory::all();
        $data['countries'] = Country::all();
        $data['currencies'] = Currency::orderBy('name', 'ASC')->get();
        $data['jobTypes'] = JobType::all();
        $data['jobQualifications'] = JobQualification::all();
        return view('company.job.postJob',$data);
    }

    public function savePostJob(Request $request){
        $request->validate([

            'job_category' => 'required',
            'job_industry' => 'required',
            'title' => 'required',
            'position_count' => 'required',
            'job_type' => 'required',
            'description' => 'required',
            'min_exp_year' => 'required',
            'max_exp_year' => 'required',
            'salary_terms' => [new IsNegotiable($request->is_negotiable, $request->salary_terms)],
            'min_salary' => [new IsNegotiable($request->is_negotiable, $request->min_salary)],
            'max_salary' => [new IsNegotiable($request->is_negotiable, $request->max_salary)],
            'currency' => [new IsNegotiable($request->is_negotiable, $request->currency)],
            'deadline' => 'required',
            'job_qualification' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'submission_type_value' => [new ApplyMethod($request->submission_type, $request->submission_type_value)],
        ],
            [
                'job_category.required' => 'The category field is required.',
                'job_industry.required' => 'The industry field is required.',
                'title.required' => 'The title field is required.',
                'position_count.required' => 'The vacancy field is required.',
                'job_type.required' => 'The job type field is required.',
                'job_qualification.required' => 'The qualification field is required.',
                'description.required' => 'The job description field is required.',
                'min_exp_year.required' => 'The minimum experience field is required.',
                'max_exp_year.required' => 'The maximum experience field is required.',
                'salary_terms.required' => 'The salary terms field is required.',
                'min_salary.required' => 'The minimum salary field is required.',
                'max_salary.required' => 'The maximum salary field is required.',
                'currency.required' => 'The currency field is required.',
                'deadline.required' => 'The application deadline date field is required.',
                'country_id.required' => 'The country field is required.',
                'city_id.required' => 'The city field is required.',
                'submission_type_value.required' => 'The apply method value field is required'
            ]);

        $job = new Job();
        $job->company = auth::user()->id;
        $job->job_category = $request->job_category;
        $job->job_industry = $request->job_industry;
        $job->title = $request->title;
        $job->unique_id = rand(1,500);
        $job->position_count = $request->position_count;
        $job->job_type = $request->job_type;
        $job->description = $request->description;
        $job->min_exp_year = $request->min_exp_year;
        $job->max_exp_year = $request->max_exp_year;
        $job->salary_terms = (($request->salary_terms == '') ? 'PER_YEAR' : $request->salary_terms);
        $job->min_salary = (($request->min_salary == '') ? '0' : $request->min_salary);
        $job->max_salary = (($request->max_salary == '') ? '0' : $request->max_salary);
        $job->currency = (($request->currency == '') ? '2' : $request->currency);
        $job->job_qualification = $request->job_qualification;
        $job->gender = $request->gender;
        $job->min_age = (($request->min_age == '') ? '0' : $request->min_age);
        $job->max_age = (($request->max_age == '') ? '0' : $request->max_age);
        $job->is_negotiable = $request->is_negotiable;
        $job->is_visa_sponsor = $request->is_visa_sponsor;
        $job->is_relocation = $request->is_relocation;
        $job->is_published = $request->is_published;
        $job->submission_type = $request->submission_type;
        $job->submission_type_value = $request->submission_type_value;
        $job->submission_instruction = $request->submission_instruction;
        $job->deadline = $request->deadline;
        $job->country_id = $request->country_id;
        $job->city_id = $request->city_id;
        $job->created_by = auth::user()->id;
        $job->updated_by = auth::user()->id;
        $job->save();

        return redirect()->back()->with('success','Job successfully posted!');
    }

    public function manageJob(){
        $jobs = Job::where('company',auth::user()->id)->orderBy('created_at','DESC')->where('is_deleted',0)->paginate('3');
        return view('company.job.manageJob')->with('jobs', $jobs);
    }

    public function editJobPost($id){
        $data =  array();
        $data['job'] = Job::where('company',auth::user()->id)->findOrFail($id);
        $data['industries'] = JobIndustry::all();
        $data['categories'] = JobCategory::all();
        $data['countries'] = Country::all();
        $data['currencies'] = Currency::orderBy('name', 'ASC')->get();
        $data['jobTypes'] = JobType::all();
        $data['jobQualifications'] = JobQualification::all();
        return view('company.job.editJobPost',$data);
    }

    public function updatePostJob(Request $request){
        $request->validate([

            'job_category' => 'required',
            'job_industry' => 'required',
            'title' => 'required',
            'position_count' => 'required',
            'job_type' => 'required',
            'description' => 'required',
            'min_exp_year' => 'required',
            'max_exp_year' => 'required',
            'salary_terms' => [new IsNegotiable($request->is_negotiable, $request->salary_terms)],
            'min_salary' => [new IsNegotiable($request->is_negotiable, $request->min_salary)],
            'max_salary' => [new IsNegotiable($request->is_negotiable, $request->max_salary)],
            'currency' => [new IsNegotiable($request->is_negotiable, $request->currency)],
            'deadline' => 'required',
            'job_qualification' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'submission_type_value' => [new ApplyMethod($request->submission_type, $request->submission_type_value)],
        ],
            [
                'job_category.required' => 'The category field is required.',
                'job_industry.required' => 'The industry field is required.',
                'title.required' => 'The title field is required.',
                'position_count.required' => 'The vacancy field is required.',
                'job_type.required' => 'The job type field is required.',
                'job_qualification.required' => 'The qualification field is required.',
                'description.required' => 'The job description field is required.',
                'min_exp_year.required' => 'The minimum experience field is required.',
                'max_exp_year.required' => 'The maximum experience field is required.',
                'salary_terms.required' => 'The salary terms field is required.',
                'min_salary.required' => 'The minimum salary field is required.',
                'max_salary.required' => 'The maximum salary field is required.',
                'currency.required' => 'The currency field is required.',
                'deadline.required' => 'The application deadline date field is required.',
                'country_id.required' => 'The country field is required.',
                'city_id.required' => 'The city field is required.',
                'submission_type_value.required' => 'The apply method value field is required'
            ]);

        $job = Job::findOrFail($request->id);
        $job->company = auth::user()->id;
        $job->job_category = $request->job_category;
        $job->job_industry = $request->job_industry;
        $job->title = $request->title;
        $job->unique_id = rand(1,500);
        $job->position_count = $request->position_count;
        $job->job_type = $request->job_type;
        $job->description = $request->description;
        $job->min_exp_year = $request->min_exp_year;
        $job->max_exp_year = $request->max_exp_year;
        $job->salary_terms = (($request->salary_terms == '') ? 'PER_YEAR' : $request->salary_terms);
        $job->min_salary = (($request->min_salary == '') ? '0' : $request->min_salary);
        $job->max_salary = (($request->max_salary == '') ? '0' : $request->max_salary);
        $job->currency = (($request->currency == '') ? '2' : $request->currency);
        $job->gender = $request->gender;
        $job->job_qualification = $request->job_qualification;
        $job->min_age = (($request->min_age == '') ? '0' : $request->min_age);
        $job->max_age = (($request->max_age == '') ? '0' : $request->max_age);
        $job->is_negotiable = $request->is_negotiable;
        $job->is_visa_sponsor = $request->is_visa_sponsor;
        $job->is_relocation = $request->is_relocation;
        $job->is_published = $request->is_published;
        $job->submission_type = $request->submission_type;
        $job->submission_type_value = $request->submission_type_value;
        $job->submission_instruction = $request->submission_instruction;
        $job->deadline = $request->deadline;
        $job->country_id = $request->country_id;
        $job->city_id = $request->city_id;
        $job->created_by = auth::user()->id;
        $job->updated_by = auth::user()->id;
        $job->save();

        return redirect('company/manage/job')->with('success','Job post updated successfully!');
    }

    public function viewJobPost($id){
        $job = Job::where('company',auth::user()->id)->findOrFail($id);
        return view('company.job.viewJobPost')->with('job',$job);
    }

    public function deleteJobPost($id){
        $job = Job::findOrFail($id);
        $job->is_deleted = 1;
        $job->save();

        return redirect()->back()->with('delete','Job post deleted successfully!');

    }

    public function manageJobSearch($search){
        if ($search != 'all'){
            $jobs = Job::where('company',auth::user()->id)->where('title','LIKE','%'.$search.'%')->get();
        } else {
            $jobs = Job::where('company',auth::user()->id)->orderBy('created_at','DESC')->where('is_deleted',0)->paginate('3');
        }
        $result = '';
        if (count($jobs) == 0) {
            $result .= '<tr><td colspan="4" class="text-center">No result found</td></tr>';
        }
        foreach ($jobs as $job){
            $result .= '<tr>
                            <th scope="row">
                                    <h4>'.$job->title.'</h4>
                                    <p><span class="flaticon-location-pin"></span>'.$job->city->name .', '. $job->country->name .'</p>
                                    <ul>
                                        <li class="list-inline-item"><span class="flaticon-event"> Created: </span></li>
                                        <li class="list-inline-item">'. $job->created_at.'</li>
                                        <li class="list-inline-item"><span class="flaticon-event"> Expiry: </span></li>
                                        <li class="list-inline-item">'.$job->deadline.'</li>
                                    </ul>
                                </th>
                                <td><span class="color-black22">17</span> Application(s)</td>
                                <td class="text-thm2">
                                '
                                .(($job->is_published == 1) ? '<span class="badge badge-success h5 text-white">Published</span>' :
                '<span class="badge badge-danger h5 text-white">Not Published</span>').
                                '
                                </td>
                                <td>
                                    <ul class="view_edit_delete_list">
                                        <li class="list-inline-item"><a href="'. route("viewJobPost",$job->id) .'" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                                        <li class="list-inline-item"><a href="'. route("editJobPost",$job->id) .'" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="flaticon-edit"></span></a></li>
                                        <li class="list-inline-item"><a href="'. route("deleteJobPost",$job->id) .'" onclick="return confirm(\'Are you sure to delete this job post?\');" data-toggle="tooltip" data-placement="bottom" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                    </ul>
                                </td>
                            </tr>';
        }
        return $result;
    }

    public function singleJobView($id){
        $job = Job::where('is_published','1')->findOrFail($id);
        $where = array();
        $where['job_industry'] = $job->job_industry;
        $where['job_category'] = $job->job_category;
        $where['is_published'] = 1;
        $recommendedJobs = Job::where($where)->where('id', '!=', $job->id)->inRandomOrder()->limit(3)->get();
        return view('candidate.job.singleJobView')->with('job',$job)->with('recommendedJobs',$recommendedJobs);
    }

    public function jobListView(){
        $jobs = Job::where('is_published','1')->orderBy('created_at','DESC')->paginate('8');
        return view('candidate.job.jobListView')->with('jobs',$jobs);
    }

    public function jobListOfThisCompany($id){
        $jobs = Job::where('is_published','1')->where('company',$id)->orderBy('created_at','DESC')->paginate('8');
        return view('candidate.job.jobListOfThisCompany')->with('jobs',$jobs);
    }

}
