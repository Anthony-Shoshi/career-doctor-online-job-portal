<?php

namespace App\Http\Controllers\Company;

use App\CompanyFollower;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Arr;

class FollowController extends Controller
{
    public function followCompany(Request $request){

        if ($request->company != ''){
            $companyFollower = new CompanyFollower();
            $companyFollower->candidate = Auth::user()->id;
            $companyFollower->company = $request->company;
            $companyFollower->created_by = Auth::user()->id;
            $companyFollower->updated_by = Auth::user()->id;

            $companyFollower->save();

            return redirect()->back();
        }
    }

    public function unFollowCompany(Request $request){
        if ($request->company != ''){

            $companyFollower = CompanyFollower::where('candidate', Auth::user()->id)->where('company',$request->company)->first();
            $companyFollower->delete();

            return redirect()->back();
        }
    }

    public function followedBy(){
        $companyFollowers = CompanyFollower::select('*','company_followers.id AS id')
                            ->join('users','users.id','company_followers.candidate')
                            ->leftJoin('candidate_general_infos', function ($join){
                                $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                            })
                            ->leftJoin('job_industries', function ($join){
                                $join->on('job_industries.id', '=', 'candidate_general_infos.industry_id');
                            })
                            ->orderBy('company_followers.created_at','DESC')
                            ->where('company', Auth::user()->id)
                            ->paginate(8);
        return view('company.profile.followedBy')->with('companyFollowers',$companyFollowers);
    }

    public function searchFollowers($search){
        if ($search != 'all'){
            $companyFollowers = CompanyFollower::select('*','company_followers.id AS id')
                ->join('users','users.id','company_followers.candidate')
                ->leftJoin('candidate_general_infos', function ($join){
                    $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                })
                ->leftJoin('job_industries', function ($join){
                    $join->on('job_industries.id', '=', 'candidate_general_infos.industry_id');
                })
                ->orderBy('company_followers.created_at','DESC')
                ->where('users.name','LIKE','%'.$search.'%')
                ->where('company', Auth::user()->id)
                ->get();
        } else {
            $companyFollowers = CompanyFollower::select('*','company_followers.id AS id')
                ->join('users','users.id','company_followers.candidate')
                ->leftJoin('candidate_general_infos', function ($join){
                    $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                })
                ->leftJoin('job_industries', function ($join){
                    $join->on('job_industries.id', '=', 'candidate_general_infos.industry_id');
                })
                ->orderBy('company_followers.created_at','DESC')
                ->where('company', Auth::user()->id)
                ->get();
        }
        $result = '';
        if($companyFollowers->count() < 1){
            return $result .= '<tr><td colspan="4" class="text-center">No result found</td></tr>';
        }
        foreach ($companyFollowers as $companyFollower){
            $result .= ' <tr>
                        <th scope="row">
                            '.$companyFollower->name.'
                        </th>
                        <td>
                            '.(($companyFollower->contact_email != '') ? $companyFollower->contact_email : $companyFollower->email).'
                        </td>
                        <td class="text-thm2">
                            '.$companyFollower->contact_phone.'
                        </td>
                        <td class="text-thm2">
                            '.$companyFollower->industry_name.'
                        </td>
                        <td>
                            <ul class="view_edit_delete_list">
                                <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                            </ul>
                        </td>
                    </tr>';
        }
        return $result;

    }

    public function followersSortBy($value){
        $result = '';
        if($value == 'newest'){
            $companyFollowers = CompanyFollower::select('*','company_followers.id AS id')
                ->join('users','users.id','company_followers.candidate')
                ->leftJoin('candidate_general_infos', function ($join){
                    $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                })
                ->leftJoin('job_industries', function ($join){
                    $join->on('job_industries.id', '=', 'candidate_general_infos.industry_id');
                })
                ->orderBy('company_followers.created_at','DESC')
                ->where('company', Auth::user()->id)
                ->paginate(8);
        } else if($value == 'oldest') {
            $companyFollowers = CompanyFollower::select('*','company_followers.id AS id')
                ->join('users','users.id','company_followers.candidate')
                ->leftJoin('candidate_general_infos', function ($join){
                    $join->on('candidate_general_infos.user_id', '=' , 'users.id');
                })
                ->leftJoin('job_industries', function ($join){
                    $join->on('job_industries.id', '=', 'candidate_general_infos.industry_id');
                })
                ->orderBy('company_followers.created_at','ASC')
                ->where('company', Auth::user()->id)
                ->paginate(8);
        }
        foreach ($companyFollowers as $companyFollower){
            $result .= ' <tr>
                        <th scope="row">
                            '.$companyFollower->name.'
                        </th>
                        <td>
                            '.(($companyFollower->contact_email != '') ? $companyFollower->contact_email : $companyFollower->email).'
                        </td>
                        <td class="text-thm2">
                            '.$companyFollower->contact_phone.'
                        </td>
                        <td class="text-thm2">
                            '.$companyFollower->industry_name.'
                        </td>
                        <td>
                            <ul class="view_edit_delete_list">
                                <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                            </ul>
                        </td>
                    </tr>';
        }

        return $result;
    }
}
