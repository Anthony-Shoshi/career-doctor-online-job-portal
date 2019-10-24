@extends('admin.layouts.master')
@section('myCss')
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
@endsection
@section('content')
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">General Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Website</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Social Media</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Logo</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form action="{{ route('updateGeneralSettings') }}" method="post">
                                @csrf
                                <div class="card card-success">
                                    <div class="card-body">
                                        <label>Website Name</label>
                                        <input name="website_name" value="" class="form-control form-control @error('website_name') is-invalid @enderror" type="text" placeholder="Website Name">
                                        @error('website_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <br>
                                        <label>Slogan</label>
                                        <input name="slogan" value="" class="form-control form-control @error('slogan') is-invalid @enderror" type="text" placeholder="Slogan">
                                        @error('slogan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <br>
                                        <label>Footer Text</label>
                                        <input name="footer_text" value="" class="form-control form-control @error('footer_text') is-invalid @enderror" type="text" placeholder="Footer Text">
                                        @error('footer_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <form action="{{ route('updateGeneralSettings') }}" method="post">
                                @csrf
                                <div class="card card-success">
                                    <div class="card-body">
                                        <label>Facebook Link</label>
                                        <input name="facebook_link" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Facebook Link">
                                        <br>
                                        <label>Linkedin Link</label>
                                        <input name="linkedin_link" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Linkedin Link">
                                        <br>
                                        <label>Tweeter Link</label>
                                        <input name="tweeter_link" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Tweeter Link">
                                        <br>
                                        <label>Instagram Link</label>
                                        <input name="instagram_link" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Instagram Link">
                                        <br>
                                        <label>Printerest Link</label>
                                        <input name="priterest_link" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Printerest Link">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <form method="post" action="{{ route('updateGeneralSettings') }}" id="#">
                                <div class="form-group files">
                                    <label>Upload Logo </label>
                                    <input type="file" name="logo" class="form-control" multiple="">
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
    </div>
@endsection