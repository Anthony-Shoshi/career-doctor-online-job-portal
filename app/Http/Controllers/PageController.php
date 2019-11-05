<?php

namespace App\Http\Controllers;

use App\ContactMailLog;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class PageController extends Controller
{
    public function welcomePage(){
        $jobs = DB::table('jobs')->where('is_published','1')->orderBy('created_at','DESC')->limit('4')->get();
        return view('welcome')->with('jobs',$jobs);
    }

    public function aboutUs()
    {
        return view('pages.aboutUs');
    }

    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function termsAndConditions() {
        return view('pages.termsAndConditions');
    }

    public function privacyAndPolicy() {
        return view('pages.privacyAndPolicy');
    }

    public function allBlog()
    {
        return view();
    }

    public function sendContactEmail(Request $request) {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        //create message
        $message = new ContactMailLog();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();

        $data = array('name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
        );

        Mail::to('probal@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Your email has been successfully sent!');
    }
}
