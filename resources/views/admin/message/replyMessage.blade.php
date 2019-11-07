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
                        <li class="breadcrumb-item active">Reply</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Reply</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('replyMessage') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $contactMessage->email }}" placeholder="To:" readonly>
                    <input type="hidden" class="form-control" name="name" value="{{ $contactMessage->name }}">
                    <input type="hidden" class="form-control" name="id" value="{{ $contactMessage->id }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" name="subject" placeholder="Subject:">
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control @error('message') is-invalid @enderror" style="height: 300px">{{ old('message') }}</textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
            </div>
            </form>
            <!-- /.card-footer -->
        </div>
        <!-- /. box -->
    </div>
@endsection