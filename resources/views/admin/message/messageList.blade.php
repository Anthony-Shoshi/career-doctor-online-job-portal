@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Messages</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-controls">
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @if($contactMessages->count() != 0)
                            @php
                                $i = 1;
                            @endphp
                        @foreach($contactMessages as $contactMessage)
                        <tr>
                            <td class="mailbox-star">{{ $i }}</td>
                            <td class="mailbox-name" style="color: #137828;">{{ $contactMessage->name }}</td>
                            <td class="mailbox-subject"><b>{{ $contactMessage->subject }}</b> - {{ Str::words($contactMessage->message, 12, ' . . .') }}
                            </td>
                            <td class="mailbox-date">
                                <a class="btn btn-info btn-sm" href="#">View</a>
                                <a class="btn btn-danger btn-sm" href="#">Reply</a>
                            </td>
                        </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        @else
                            <div class="text-center">No Messages!</div>
                        @endif
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
                <div class="mailbox-controls">
                </div>
            </div>
        </div>
        <!-- /. box -->
    </div>
@endsection