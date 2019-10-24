@extends('dashboard.layouts.master')
@section('myCss')
    <style>
        .myContact {
            background-color: white;
            width: 121%;
            margin-left: -30px;
            padding-left: 8px !important;
        }
        .activeContact {
            background-color: #f3f3f3;
        }
    </style>
@endsection
@section('content')
    <div class="col-lg-8 col-xl-9">
        <div class="row message_container">
            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 pr0 pl0">
                <div class="inbox_user_list">
                    <div class="iu_heading">
                        <div class="candidate_revew_search_box">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search">
                                <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
                            </form>
                        </div>
                    </div>
                    <ul style="list-style: none;">
                        @if($messageThreads != [])
                            @foreach($messageThreads as $data)
                                <li class="contact myContact {{ ($data->id == $messageThread->id) ? 'activeContact' : '' }}">
                                    <a href="{{ route('candidateMessages', $data->id) }}">
                                        <div class="wrap">
                                            <img class="img-fluid" src="{{ asset($data->image) }}" alt="s1.jpg"/>
                                            <div class="meta">
                                                <h5 class="name">{{ $data->name }}</h5>
                                                <p class="preview">{{$data->subject}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="contact myContact">
                                <div class="text-center">No Contact!</div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8 pr0 pl0">
                <div class="user_heading">
                    <div class="wrap">
                        <span class="contact-status online"></span>
                        @if($messageThread->image)
                        <img class="img-fluid" src="{{ asset($messageThread->image) }}" width="60px" alt="s5.jpg"/>
                        @endif
                        <div class="meta">
                            <h5 class="name">{{ $messageThread->name }}</h5>
                            <p class="preview" style="color: #0c5460;font-family: bold;">{{ $messageThread->user_type }}</p>
                        </div>
                    </div>
                </div>
                <div class="inbox_chatting_box">
                    <ul class="chatting_content">
                        @if($messageThreads != [])
                        @foreach($messages as $message)
                            <li class="media {{ ($message->user_to == Auth::user()->id) ? 'sent' : 'reply' }}">
                                <div class="media-body">
                                    <p>{!! $message->message !!}</p>
                                    <div class="date_time">
                                        {{ (date_format($message->created_at, 'Y-m-d') == \Carbon\Carbon::today()->toDateString()) ? 'Today '.date_format($message->created_at, 'h:i A')  : date_format($message->created_at, 'd M, Y h:i A') }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @else
                            <li class="contact myContact">
                                <div class="text-center">No Messages!</div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="message_input">
                    <form class="form-inline" method="POST" action="{{ route('sendMessageByCandidate') }}">
                        @csrf
                        <input type="hidden" name="thread_id" value="{{ $messageThread->id }}">
                        <input class="form-control" type="text" name="message" placeholder="Enter text here..." aria-label="Search" required>
                        <button class="btn" type="submit">Send <span class="flaticon-paper-plane"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection