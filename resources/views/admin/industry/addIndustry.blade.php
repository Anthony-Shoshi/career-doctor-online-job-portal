@extends('admin.layouts.master')
@section('myCss')
<style>
  .customA {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
</style>
@endsection
@section('content')
@if(Route::is('editIndustry'))
<!-- content header -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Industry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Industry</a></li>
              <li class="breadcrumb-item active">Edit Industry</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- end content header -->
<form action="{{route('updateIndustry')}}" method="post">
<input type="hidden" value="{{$jobIndustry->id}}" name="id">
@csrf
<div class="card card-success">
    <!-- <div class="card-header">
        <h3 class="card-title"></h3>
    </div> -->
    <div class="card-body">
        <label>Industry Name</label>
        <input name="industry_name" value="{{$jobIndustry->industry_name}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Industry Name">
         @error('industry_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    <br>
        <label for="exampleInputEmail1">Industry Description</label>
        <textarea name="industry_description" class="form-control" rows="3" placeholder="Industry Description ...">{{$jobIndustry->industry_description}}</textarea>
    </div>
    <div class="card-footer">
        <a type="reset" href="{{route('industryList')}}" class="btn btn-danger customA">Back</a>
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
            <h1 class="m-0 text-dark">Add Industry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Industry</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- end content header -->
<form action="{{route('saveIndustry')}}" method="post">
@csrf
<div class="card card-success">
    <!-- <div class="card-header">
        <h3 class="card-title"></h3>
    </div> -->
    <div class="card-body">
        <label>Industry Name</label>
        <input name="industry_name" value="{{old('industry_name')}}" class="form-control form-control @error('industry_name') is-invalid @enderror" type="text" placeholder="Industry Name">
         @error('industry_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    <br>
        <label for="exampleInputEmail1">Industry Description</label>
        <textarea name="industry_description" class="form-control" rows="3" placeholder="Industry Description ..."></textarea>
    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-primary">Add Industry</button>
    </div>
    <!-- /.card-body -->
</div>
</form>
@endif
@endsection