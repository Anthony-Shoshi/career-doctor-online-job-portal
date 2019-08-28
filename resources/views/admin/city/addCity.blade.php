@extends('admin.layouts.master')

@section('content')
@if(Route::is('editCity'))
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit City</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">City</a></li>
                        <li class="breadcrumb-item active">Edit City</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->
    <form action="{{route('updateCity')}}" method="post">
        <input type="hidden" name="id" value="{{$city->id}}">
        @csrf
        <div class="card card-success">
            <!-- <div class="card-header">
                <h3 class="card-title"></h3>
            </div> -->
            <div class="card-body">
                <label>Country Name</label>
                <select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
                    <option value="{{$city->country->id}}">{{$city->country->name}}</option>
                    @foreach($allCountry as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                @error('country_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>City Name</label>
                <input name="name" value="{{$city->name}}" class="form-control form-control @error('name') is-invalid @enderror" type="text" placeholder="City Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="card-footer">
                <a href="{{route('cityList',[$city->country->id])}}" class="btn btn-danger customA">Back</a>
                <button type="submit" class="btn btn-primary">Add City</button>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@else
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add City</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">City</a></li>
                        <li class="breadcrumb-item active">Add City</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->

    <form action="{{route('saveCity')}}" method="post">
        @csrf
        <div class="card card-success">
            <!-- <div class="card-header">
                <h3 class="card-title"></h3>
            </div> -->
            <div class="card-body">
                <label>Country Name</label>
                <select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
                    <option value="">Select Country</option>
                    @foreach($allCountry as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                @error('country_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>City Name</label>
                <input name="name" value="{{old('name')}}" class="form-control form-control @error('name') is-invalid @enderror" type="text" placeholder="City Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Add City</button>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endif
@endsection