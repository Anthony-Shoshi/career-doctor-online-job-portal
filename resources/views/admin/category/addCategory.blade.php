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