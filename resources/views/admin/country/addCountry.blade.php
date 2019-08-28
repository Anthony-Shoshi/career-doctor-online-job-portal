@extends('admin.layouts.master')

@section('content')
@if(Route::is('editCountry'))
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Country</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Country</a></li>
                        <li class="breadcrumb-item active">Edit Country</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->

    <form action="{{route('updateCountry')}}" method="post">
        <input type="hidden" name="id" value="{{$country->id}}">
        @csrf
        <div class="card card-success">
            <!-- <div class="card-header">
                <h3 class="card-title"></h3>
            </div> -->
            <div class="card-body">
                <label>Country Name</label>
                <input name="name" value="{{$country->name}}" class="form-control form-control @error('name') is-invalid @enderror" type="text" placeholder="Country Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>ISO 3</label>
                <input name="iso3" value="{{$country->iso3}}" class="form-control form-control @error('iso3') is-invalid @enderror" type="text" placeholder="ISO 3">
                @error('iso3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>ISO 2</label>
                <input name="iso2" value="{{$country->iso2}}" class="form-control form-control @error('iso2') is-invalid @enderror" type="text" placeholder="ISO 2">
                @error('iso2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Currency</label>
                <input name="currency" value="{{$country->currency}}" class="form-control form-control @error('currency') is-invalid @enderror" type="text" placeholder="Currency">
                <br><label>Capital City</label>
                <input name="capital" value="{{$country->capital}}" class="form-control form-control @error('capital') is-invalid @enderror" type="text" placeholder="Capital City">
            </div>
            <div class="card-footer">
                <a type="reset" href="{{route('countryList')}}" class="btn btn-danger customA">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
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
                    <h1 class="m-0 text-dark">Add Country</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Country</a></li>
                        <li class="breadcrumb-item active">Add Country</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->

    <form action="{{route('saveCountry')}}" method="post">
        @csrf
        <div class="card card-success">
            <!-- <div class="card-header">
                <h3 class="card-title"></h3>
            </div> -->
            <div class="card-body">
                <label>Country Name</label>
                <input name="name" value="{{old('name')}}" class="form-control form-control @error('name') is-invalid @enderror" type="text" placeholder="Country Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>ISO 3</label>
                <input name="iso3" value="{{old('iso3')}}" class="form-control form-control @error('iso3') is-invalid @enderror" type="text" placeholder="ISO 3">
                @error('iso3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>ISO 2</label>
                <input name="iso2" value="{{old('iso2')}}" class="form-control form-control @error('iso2') is-invalid @enderror" type="text" placeholder="ISO 2">
                @error('iso2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <label>Currency</label>
                <input name="currency" value="{{old('currency')}}" class="form-control form-control @error('currency') is-invalid @enderror" type="text" placeholder="Currency">
                <br><label>Capital City</label>
                <input name="capital" value="{{old('capital')}}" class="form-control form-control @error('capital') is-invalid @enderror" type="text" placeholder="Capital City">
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Add Country</button>
            </div>
            <!-- /.card-body -->
        </div>
    </form>

@endif
@endsection