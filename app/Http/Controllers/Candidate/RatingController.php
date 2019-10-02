<?php

namespace App\Http\Controllers\Candidate;

use App\CompanyGeneralInfo;
use App\CompanyRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RatingController extends Controller
{
    public function submitRating(Request $request) {

        $this->validate($request, [
           'rating' => 'required',
           'review_title' => 'required',
           'review_content' => 'required',
        ]);

        $companyRating = new CompanyRating();
        $companyRating->candidate_id = Auth::user()->id;
        $companyRating->company_id = $request->company_id;
        $companyRating->rating = $request->rating;
        $companyRating->review_title = $request->review_title;
        $companyRating->review_content = $request->review_content;

        $companyRating->save();
        return redirect()->back()->with('success', 'Thank you for your Review!');
    }

    public function reviewList() {
        $companyRatings = CompanyRating::select('*', 'company_ratings.id AS id')
                                                ->join('users', 'users.id', 'company_ratings.candidate_id')
                                                ->where('company_ratings.is_deleted', 0)
                                                ->orderBy('company_ratings.created_at', 'DESC')
                                                ->get();
        return view('admin.review.reviewList')->with('companyRatings', $companyRatings);
    }

    public function deleteRating($id){
        $companyRating = CompanyRating::findOrFail($id);
        $companyRating->is_deleted = 1;
        $companyRating->save();

        return redirect()->back()->with('delete', 'Review deleted successfully!');
    }

    public function editRating($company_id) {
        $companyRating = CompanyRating::select('*', 'company_ratings.id AS id', 'company_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'company_ratings.candidate_id')
            ->orderBy('company_ratings.created_at', 'DESC')
            ->where('company_id', $company_id)
            ->where('company_ratings.is_deleted', 0)
            ->where('company_ratings.candidate_id', Auth::user()->id)
            ->first();
        $company = CompanyGeneralInfo::where('user_id', $company_id)->first();
        return view('reviews.editReview')->with('companyRating', $companyRating)->with('company', $company);
    }

    public function updateRating(Request $request) {
        $this->validate($request, [
            'rating' => 'required',
            'review_title' => 'required',
            'review_content' => 'required',
        ]);

        $companyRating = CompanyRating::where('candidate_id', Auth::user()->id)->where('company_id', $request->company_id)->first();
        $companyRating->rating = $request->rating;
        $companyRating->review_title = $request->review_title;
        $companyRating->review_content = $request->review_content;

        $companyRating->save();

        return back()->with('success', 'Review updated successfully!');
    }

    public function allReview($company_id) {
        $data['companyRating'] = array();
        $companyRatings = CompanyRating::select('*', 'company_ratings.id AS id', 'company_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'company_ratings.candidate_id')
            ->orderBy('company_ratings.created_at', 'DESC')
            ->where('company_id', $company_id)
            ->where('company_ratings.is_deleted', 0)
            ->get();

        foreach ($companyRatings as $companyRating){
            $data['companyRatings'][$companyRating->candidate_id] = $companyRating;
        }

        if (Auth::check()) {
            if (isset($data['companyRatings'][Auth::user()->id])){
                $data['companyRating'] = $data['companyRatings'][Auth::user()->id];
            }
        }

        return view('reviews.allReview', $data);
    }
}
