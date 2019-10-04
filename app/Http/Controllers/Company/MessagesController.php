<?php

namespace App\Http\Controllers\Company;

use App\Message;
use App\MessageThread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function companyMessages($id = null) {
        $data['messageThreads'] = MessageThread::select('*', 'message_threads.id')
                                ->join('users', 'users.id', 'message_threads.user_from')
                                ->where('message_threads.user_to', Auth::user()->id)
                                ->orderBy('message_threads.updated_at', 'DESC')
                                ->get();

        if ($data['messageThreads']->count() > 0) {
            $thread_id = $data['messageThreads'][0]->id;
            if ($id != null) {
                $thread_id = $id;
                $messages = DB::table('messages')->where('thread', '=', $thread_id)->where('user_to', '=', Auth::user()->id)->update(array('is_seen' => 1));
                $data['messages'] = Message::where('thread', $id)->get();
            } else {
                $data['messages'] = Message::where('thread', $data['messageThreads'][0]->id)->get();
            }
            $data['messageThread'] = MessageThread::select('*', 'message_threads.id')
                ->join('users', 'users.id', 'message_threads.user_from')
                ->where('message_threads.user_to', Auth::user()->id)
                ->where('message_threads.id', $thread_id)
                ->first();
        } else {
            $data['messageThreads'] = array();
            $data['messages'] = array();
            $data['messageThread'] = new MessageThread();
        }

        return view('company.messages.messages', $data);
    }

    public function sendMessageByCompany(Request $request) {
        $thread_id = $request->thread_id;
        $thread = MessageThread::find($thread_id);
        if (Auth::user()->user_type == 'candidate'){
            $user_to = $thread->user_to;
        } else {
            $user_to = $thread->user_from;
        }
        $message = new Message();
        $message->thread = $thread_id;
        $message->user_from = Auth::user()->id;
        $message->user_to = $user_to;
        $message->message = $request->message;
        $message->created_by = Auth::user()->id;
        $message->updated_by = Auth::user()->id;
        $message->save();

        $thread->save();

        return back();
    }
}
