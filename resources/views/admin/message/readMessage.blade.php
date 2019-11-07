@extends('admin.layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Messages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Messages</a></li>
                    <li class="breadcrumb-item active">Read</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="col-md-12">
    <div class="card card-primary card-outline">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>{{ $contactMessage->subject }}</h5>
                <h6>From: {{ $contactMessage->name }} ({{ $contactMessage->email }})
                    <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span></h6>
            </div>

            <div class="mailbox-read-message">
                <p>{!! $contactMessage->message !!}</p>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="float-right">
                @if($contactMessage->message_type != 'reply')
                    <a type="button" href="{{ route('replyContactMessage', $contactMessage->id) }}" class="btn btn-default"><i class="fa fa-reply"></i> Reply</a>
                @endif
            </div>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /. box -->
</div>
@endsection