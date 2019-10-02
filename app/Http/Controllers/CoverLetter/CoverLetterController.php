<?php

namespace App\Http\Controllers\CoverLetter;

use App\CandidateCoverLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CoverLetterController extends Controller
{
    public function createCoverLetter(){
        $coverLetters = CandidateCoverLetter::orderBy('created_at','DESC')->where('user', Auth::user()->id)->where('is_deleted',0)->paginate('6');
        return view('coverLetter.createCoverLetter')->with('coverLetters',$coverLetters);
    }

    public function createNewCoverLetter(){
        return view('coverLetter.createNewCoverLetter');
    }

    public function saveCoverLetter(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $coverLetter = new CandidateCoverLetter();
        $coverLetter->user = Auth::user()->id;
        $coverLetter->title = $request->title;
        $coverLetter->description = $request->description;
        $coverLetter->status = $request->status;
        $coverLetter->created_by = Auth::user()->id;
        $coverLetter->updated_by = Auth::user()->id;
        $coverLetter->save();

        return redirect('create/coverletter')->with('success','Cover Letter created successfully!');
    }

    public function editCoverLetter($id){
        $coverLetter = CandidateCoverLetter::findOrFail($id);
        return view('coverLetter.editCoverLetter')->with('coverLetter', $coverLetter);
    }

    public function updateCoverLetter(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $coverLetter = CandidateCoverLetter::findOrFail($request->id);
        $coverLetter->user = Auth::user()->id;
        $coverLetter->title = $request->title;
        $coverLetter->description = $request->description;
        $coverLetter->status = $request->status;
        $coverLetter->created_by = Auth::user()->id;
        $coverLetter->updated_by = Auth::user()->id;
        $coverLetter->save();

        return redirect('create/coverletter')->with('success','Cover Letter updated successfully!');
    }

    public function deleteCoverLetter($id){
        $coverLetter = CandidateCoverLetter::findOrFail($id);
        $coverLetter->is_deleted = 1;
        $coverLetter->save();

        return redirect('create/coverletter')->with('delete','Cover Letter deleted successfully!');
    }
}
