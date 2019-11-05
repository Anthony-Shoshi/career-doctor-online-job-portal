<?php

namespace App\Http\Controllers\Admin;

use App\ContactMailLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    public function getContactUsMessages() {
        $contactMessages = ContactMailLog::all();
        return view('admin.message.messageList')->with('contactMessages', $contactMessages);
    }
}
