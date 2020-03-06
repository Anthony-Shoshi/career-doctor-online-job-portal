<?php

namespace App\Http\Controllers\Admin;

use App\ContactMailLog;
use App\Mail\ReplyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactMessageController extends Controller
{
    public function getContactUsMessages() {
        $contactMessages = ContactMailLog::where('is_deleted', 0)->orderBy('created_at', 'DESC')->where('message_type', 'contact')->get();
        return view('admin.message.messageList')->with('contactMessages', $contactMessages);
    }

    public function sentItemMessages() {
        $replyMessages = ContactMailLog::where('is_deleted', 0)->where('message_type', 'reply')->get();
        return view('admin.message.sentItemList')->with('replyMessages', $replyMessages);
    }

    public function readContactMessage($id) {
        $contactMessage = ContactMailLog::findOrFail($id);
        $contactMessage->is_seen = 1;
        $contactMessage->save();
        return view('admin.message.readMessage')->with('contactMessage', $contactMessage);
    }

    public function replyContactMessage($id) {
        $contactMessage = ContactMailLog::findOrFail($id);
        return view('admin.message.replyMessage')->with('contactMessage', $contactMessage);
    }

    public function replyMessage(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        //create message
        $message = new ContactMailLog();;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->is_seen = 1;
        $message->message_type = 'reply';

        $message->save();

        $data = array('name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to($request->email)->send(new ReplyMail($data));

        return back()->with('success', 'Your email has been successfully sent!');
    }

    public function deleteMessage($id) {
        $message = ContactMailLog::findOrFail($id);
        $message->is_deleted = 1;
        $message->save();
        return back()->with('delete', 'Mail deleted successfully!');
    }
}
