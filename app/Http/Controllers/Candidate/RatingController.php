<?php

namespace App\Http\Controllers\Candidate;

use App\CandidateGeneralInfo;
use App\CandidateRating;
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

    public function companyReviewListForAdmin() {
        $companyRatings = CompanyRating::select('*', 'company_ratings.id AS id')
                                                ->join('users', 'users.id', 'company_ratings.candidate_id')
                                                ->join('company_general_infos', 'company_general_infos.user_id', 'company_ratings.company_id')
                                                ->where('company_ratings.is_deleted', 0)
                                                ->orderBy('company_ratings.created_at', 'DESC')
                                                ->get();
        return view('admin.review.companyReviewList')->with('companyRatings', $companyRatings);
    }

    public function candidateReviewListForAdmin() {
        $candidateRatings = CandidateRating::select('*', 'candidate_ratings.id AS id')
                                                ->join('users', 'users.id', 'candidate_ratings.candidate_id')
                                                ->join('company_general_infos', 'company_general_infos.user_id', 'candidate_ratings.company_id')
                                                ->where('candidate_ratings.is_deleted', 0)
                                                ->orderBy('candidate_ratings.created_at', 'DESC')
                                                ->get();
        return view('admin.review.candidateReviewList')->with('candidateRatings', $candidateRatings);
    }

    public function deleteCompanyReview($id){
        $companyRating = CompanyRating::findOrFail($id);
        $companyRating->is_deleted = 1;
        $companyRating->save();

        return redirect()->back()->with('delete', 'Review deleted successfully!');
    }

    public function deleteCandidateReview($id){
        $candidateRating = CandidateRating::findOrFail($id);
        $candidateRating->is_deleted = 1;
        $candidateRating->save();

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

    public function candidateReviewList() {
        $reviews = CandidateRating::select('*', 'candidate_ratings.id AS id')
                                    ->join('company_general_infos', 'company_general_infos.user_id', 'candidate_ratings.company_id')
                                    ->where('candidate_ratings.is_deleted', 0)
                                    ->where('candidate_id', Auth::user()->id)
                                    ->orderBy('candidate_ratings.created_at', 'DESC')
                                    ->paginate(8);
        return view('reviews.candidateReviewList')->with('reviews', $reviews);
    }

    public function companyReviewList() {
        $reviews = CompanyRating::select('*', 'company_ratings.id AS id')
            ->join('users', 'users.id', 'company_ratings.candidate_id')
            ->where('company_ratings.is_deleted', 0)
            ->where('company_id', Auth::user()->id)
            ->orderBy('company_ratings.created_at', 'DESC')
            ->paginate(8);
        return view('reviews.companyReviewList')->with('reviews', $reviews);
    }

    public function viewCandidateReview($id) {
        $review = CandidateRating::findOrFail($id);
        return view('reviews.modal.viewCandidateReview')->with('review', $review);
    }

    public function viewCompanyReview($id) {
        $review = CompanyRating::findOrFail($id);
        return view('reviews.modal.viewCompanyReview')->with('review', $review);
    }

//    public function updateCandidateReview(Request $request) {
//        $review = CompanyRating::findOrFail($request->id);
//
//        $review->rating = $request->rating;
//        $review->review_title = $request->review_title;
//        $review->review_content = $request->review_content;
//
//        $review->save();
//        return back()->with('success', 'Review updated successfully!');
//    }

    public function submitCandidateRating(Request $request) {
        $this->validate($request, [
            'rating' => 'required',
            'review_title' => 'required',
            'review_content' => 'required',
        ]);

        $candidateRating = new CandidateRating();
        $candidateRating->candidate_id = $request->candidate_id;
        $candidateRating->company_id = Auth::user()->id;
        $candidateRating->rating = $request->rating;
        $candidateRating->review_title = $request->review_title;
        $candidateRating->review_content = $request->review_content;

        $candidateRating->save();
        return redirect()->back()->with('success', 'Thank you for your Review!');
    }

    public function allCandidateReview($candidate_id) {
        $data['candidateRating'] = array();
        $candidateRatings = CandidateRating::select('*', 'candidate_ratings.id AS id', 'candidate_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'candidate_ratings.company_id')
            ->orderBy('candidate_ratings.created_at', 'DESC')
            ->where('candidate_id', $candidate_id)
            ->where('candidate_ratings.is_deleted', 0)
            ->get();

        foreach ($candidateRatings as $candidateRating){
            $data['candidateRatings'][$candidateRating->company_id] = $candidateRating;
        }

        if (Auth::check()) {
            if (isset($data['candidateRatings'][Auth::user()->id])){
                $data['candidateRating'] = $data['candidateRatings'][Auth::user()->id];
            }
        }

        return view('reviews.allCandidateReview', $data);
    }

    public function editCandidateRating($candidate_id) {

        $candidateRating = CandidateRating::select('*', 'candidate_ratings.id AS id', 'candidate_ratings.created_at AS rating_created')
            ->join('users', 'users.id', 'candidate_ratings.company_id')
            ->orderBy('candidate_ratings.created_at', 'DESC')
            ->where('candidate_id', $candidate_id)
            ->where('candidate_ratings.is_deleted', 0)
            ->where('candidate_ratings.company_id', Auth::user()->id)
            ->first();

        $candidate = CandidateGeneralInfo::where('user_id', $candidate_id)->first();
        return view('reviews.editCandidateReview')->with('candidateRating', $candidateRating)->with('candidate', $candidate);
    }

    public function updateCandidateRating(Request $request) {
        $this->validate($request, [
            'rating' => 'required',
            'review_title' => 'required',
            'review_content' => 'required',
        ]);

        $candidateRating = CandidateRating::where('candidate_id', $request->candidate_id)->where('company_id', Auth::user()->id)->first();
        $candidateRating->candidate_id = $request->candidate_id;
        $candidateRating->company_id = Auth::user()->id;
        $candidateRating->rating = $request->rating;
        $candidateRating->review_title = $request->review_title;
        $candidateRating->review_content = $request->review_content;

        $candidateRating->save();

        return redirect()->back()->with('success', 'Review updated successfully!');
    }
}
