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
@if(Route::is('editCategory'))
<!-- content header -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- end content header -->
<form action="{{route('updateCategory')}}" method="post">
@csrf
<input type="hidden" name="id" value="{{$jobCategory->id}}">
<div class="card card-success">
    <!-- <div class="card-header">
        <h3 class="card-title"></h3>
    </div> -->
    <div class="card-body">
        <label>Category Name</label>
        <input name="category_name" value="{{($jobCategory->category_name)}}" class="form-control form-control @error('category_name') is-invalid @enderror" type="text" placeholder="Industry Name">
         @error('category_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    <br>
        <label>Category Icon</label>
        <select name="category_icon" class="form-control @error('category_icon') is-invalid @enderror">
            <option value="">Select Icon</option>
            <option value="flaticon-pen"{{ ($jobCategory->category_icon == 'flaticon-pen' ? ' selected' : '') }}>Paper and Pen</option>
            <option value="flaticon-mortarboard"{{ ($jobCategory->category_icon == 'flaticon-mortarboard' ? ' selected' : '') }}>Graduation Cap</option>
            <option value="flaticon-bars"{{ ($jobCategory->category_icon == 'flaticon-bars') ? ' selected' : '' }}>Account</option>
            <option value="flaticon-interview"{{ ($jobCategory->category_icon == 'flaticon-interview' ? ' selected' : '') }}>HR</option>
            <option value="flaticon-antenna"{{ ($jobCategory->category_icon == 'flaticon-antenna' ? ' selected' : '') }}>Telecommunication</option>
            <option value="flaticon-food"{{ ($jobCategory->category_icon == 'flaticon-food' ? ' selected' : '') }}>Food</option>
            <option value="flaticon-customer-support"{{ ($jobCategory->category_icon == 'flaticon-customer-support' ? ' selected' : '') }}>Constructions</option>
            <option value="flaticon-care"{{ ($jobCategory->category_icon == 'flaticon-care' ? ' selected' : '') }}>Health</option>
            <option value="fa fa-money"{{ ($jobCategory->category_icon == 'fa fa-money' ? ' selected' : '') }}>Money</option>
            <option value="fa fa-briefcase"{{ ($jobCategory->category_icon == 'fa fa-art' ? ' selected' : '') }}>Briefcase</option>
            <option value="fa fa-industry"{{ ($jobCategory->category_icon == 'fa fa-industry' ? ' selected' : '') }}>Industry</option>
            <option value="fa fa-users"{{ ($jobCategory->category_icon == 'fa fa-users' ? ' selected' : '') }}>Users</option>
            <option value="fa fa-map-marker"{{ ($jobCategory->category_icon == 'fa fa-map-marker' ? ' selected' : '') }}>Map Point</option>
            <option value="fa fa-cog"{{ ($jobCategory->category_icon == 'fa fa-cog' ? ' selected' : '') }}>Cog</option>
            <option value="fa fa-line-chart"{{ ($jobCategory->category_icon == 'fa fa-line-chart' ? ' selected' : '') }}>Line Chart</option>
            <option value="fa fa-phone-square"{{ ($jobCategory->category_icon == 'fa fa-phone-square' ? ' selected' : '') }}>Telephone</option>
            <option value="fa fa-video-camera"{{ ($jobCategory->category_icon == 'fa fa-video-camera' ? ' selected' : '') }}>Video Camera</option>
            <option value="fa fa-leaf"{{ ($jobCategory->category_icon == 'fa fa-leaf' ? ' selected' : '') }}>Leaf</option>
            <option value="fa fa-hospital-o"{{ ($jobCategory->category_icon == 'fa fa-hospital-o' ? ' selected' : '') }}>Hospital</option>
            <option value="fa fa-building-o"{{ ($jobCategory->category_icon == 'fa fa-building-o' ? ' selected' : '') }}>Building</option>
            <option value="fa fa-search-plus"{{ ($jobCategory->category_icon == 'fa fa-search-plus' ? ' selected' : '') }}>Search</option>
            <option value="fa fa-key"{{ ($jobCategory->category_icon == 'fa fa-key' ? ' selected' : '') }}>Key</option>
            <option value="fa fa-laptop"{{ ($jobCategory->category_icon == 'fa fa-laptop' ? ' selected' : '') }}>Laptop</option>
            <option value="fa fa-car"{{ ($jobCategory->category_icon == 'fa fa-car' ? ' selected' : '') }}>Car</option>
            <option value="fa fa-lock"{{ ($jobCategory->category_icon == 'fa fa-lock' ? ' selected' : '') }}>Lock</option>
        </select>
        @error('category_icon')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <label for="exampleInputEmail1">Category Description</label>
        <textarea name="category_description" class="form-control" rows="3" placeholder="Industry Description ...">{{($jobCategory->category_description)}}</textarea>
    </div>
    <div class="card-footer">
        <a type="reset" href="{{route('categoryList')}}" class="btn btn-danger customA">Back</a>
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
            <h1 class="m-0 text-dark">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- end content header -->
<form action="{{route('saveCategory')}}" method="post">
@csrf
<div class="card card-success">
    <!-- <div class="card-header">
        <h3 class="card-title"></h3>
    </div> -->
    <div class="card-body">
        <label>Category Name</label>
        <input name="category_name" value="{{old('category_name')}}" class="form-control form-control @error('category_name') is-invalid @enderror" type="text" placeholder="Industry Name">
         @error('category_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    <br>
        <label>Category Icon</label>
        <select name="category_icon" class="form-control @error('category_icon') is-invalid @enderror">
            <option value="">Select Icon</option>
            <option value="flaticon-pen"{{ (old('category_icon') == 'flaticon-pen' ? ' selected' : '') }}>Paper and Pen</option>
            <option value="flaticon-mortarboard"{{ (old('category_icon') == 'flaticon-mortarboard' ? ' selected' : '') }}>Graduation Cap</option>
            <option value="flaticon-bars"{{ (old('category_icon') == 'flaticon-bars' ? ' selected' : '') }}>Account</option>
            <option value="flaticon-interview"{{ (old('category_icon') == 'flaticon-interview' ? ' selected' : '') }}>HR</option>
            <option value="flaticon-antenna"{{ (old('category_icon') == 'flaticon-antenna' ? ' selected' : '') }}>Telecommunication</option>
            <option value="flaticon-food"{{ (old('category_icon') == 'flaticon-food' ? ' selected' : '') }}>Food</option>
            <option value="flaticon-customer-support"{{ (old('category_icon') == 'flaticon-customer-support' ? ' selected' : '') }}>Constructions</option>
            <option value="flaticon-care"{{ (old('category_icon') == 'flaticon-care' ? ' selected' : '') }}>Health</option>
            <option value="fa fa-money"{{ (old('category_icon') == 'fa fa-money' ? ' selected' : '') }}>Money</option>
            <option value="fa fa-briefcase"{{ (old('category_icon') == 'fa fa-art' ? ' selected' : '') }}>Briefcase</option>
            <option value="fa fa-industry"{{ (old('category_icon') == 'fa fa-industry' ? ' selected' : '') }}>Industry</option>
            <option value="fa fa-users"{{ (old('category_icon') == 'fa fa-users' ? ' selected' : '') }}>Users</option>
            <option value="fa fa-map-marker"{{ (old('category_icon') == 'fa fa-map-marker' ? ' selected' : '') }}>Map Point</option>
            <option value="fa fa-cog"{{ (old('category_icon') == 'fa fa-cog' ? ' selected' : '') }}>Cog</option>
            <option value="fa fa-line-chart"{{ (old('category_icon') == 'fa fa-line-chart' ? ' selected' : '') }}>Line Chart</option>
            <option value="fa fa-phone-square"{{ (old('category_icon') == 'fa fa-phone-square' ? ' selected' : '') }}>Telephone</option>
            <option value="fa fa-video-camera"{{ (old('category_icon') == 'fa fa-video-camera' ? ' selected' : '') }}>Video Camera</option>
            <option value="fa fa-leaf"{{ (old('category_icon') == 'fa fa-leaf' ? ' selected' : '') }}>Leaf</option>
            <option value="fa fa-hospital-o"{{ (old('category_icon') == 'fa fa-hospital-o' ? ' selected' : '') }}>Hospital</option>
            <option value="fa fa-building-o"{{ (old('category_icon') == 'fa fa-building-o' ? ' selected' : '') }}>Building</option>
            <option value="fa fa-search-plus"{{ (old('category_icon') == 'fa fa-search-plus' ? ' selected' : '') }}>Search</option>
            <option value="fa fa-key"{{ (old('category_icon') == 'fa fa-key' ? ' selected' : '') }}>Key</option>
            <option value="fa fa-laptop"{{ (old('category_icon') == 'fa fa-laptop' ? ' selected' : '') }}>Laptop</option>
            <option value="fa fa-car"{{ (old('category_icon') == 'fa fa-car' ? ' selected' : '') }}>Car</option>
            <option value="fa fa-lock"{{ (old('category_icon') == 'fa fa-lock' ? ' selected' : '') }}>Lock</option>
        </select>
        @error('category_icon')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    <br>
        <label for="exampleInputEmail1">Category Description</label>
        <textarea name="category_description" class="form-control" rows="3" placeholder="Industry Description ..."></textarea>
    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    <!-- /.card-body -->
</div>
</form>
@endif
@endsection