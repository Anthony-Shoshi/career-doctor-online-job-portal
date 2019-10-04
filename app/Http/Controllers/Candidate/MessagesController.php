<?php

namespace App\Http\Controllers\Candidate;

use App\Message;
use App\MessageThread;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function candidateMessages($id = null) {
        $data['messageThreads'] = MessageThread::select('*', 'message_threads.id AS id')
                                                        ->join('users', 'users.id', 'message_threads.user_to')
                                                        ->where('user_from', Auth::user()->id)
                                                        ->orderBy('message_threads.updated_at', 'DESC')
                                                        ->get();

        if ($data['messageThreads']->count() > 0) {
            $thread_id = $data['messageThreads'][0]->id;
            if ($id != null) {
                $thread_id = $id;
                $messages = DB::table('messages')->where('thread', '=', $thread_id)->where('user_to', '=', Auth::user()->id)->update(array('is_seen' => 1));
                $data['messages'] = Message::where('thread', $thread_id)->get();
            } else {
                $data['messages'] = Message::where('thread', $data['messageThreads'][0]->id)->get();
            }
            $data['messageThread'] = MessageThread::select('*', 'message_threads.id AS id')
                ->join('users', 'users.id', 'message_threads.user_to')
                ->where('message_threads.user_from', Auth::user()->id)
                ->where('message_threads.id', $thread_id)
                ->first();
        } else {
            $data['messageThreads'] = array();
            $data['messageThread'] = new MessageThread();
            ($data['messageThreads']);
            $data['messages'] = array();
        }
        return view('candidate.messages.messages', $data);
    }

    public function sendMessageByCandidate(Request $request) {
        $messageThread = MessageThread::find($request->thread_id);
        if (Auth::user()->user_type == 'candidate') {
            $user_to = $messageThread->user_to;
        } else {
            $user_to = $messageThread->user_from;
        }
        $message = new Message();
        $message->thread = $request->thread_id;
        $message->user_from = Auth::user()->id;
        $message->user_to = $user_to;
        $message->message = $request->message;
        $message->created_by = Auth::user()->id;
        $message->updated_by = Auth::user()->id;
        $message->save();

        return back();
    }
}
