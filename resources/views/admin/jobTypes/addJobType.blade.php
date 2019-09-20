@extends('admin.layouts.master')

@section('content')
    @if(Route::is('editJobType'))
        <!-- content header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Job Type</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Types</a></li>
                            <li class="breadcrumb-item active">Edit Job Type</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('updateJobType')}}" method="post">
            <input type="hidden" value="{{$jobType->id}}" name="id">
            @csrf
            <div class="card card-success">
                <!-- <div class="card-header">
                    <h3 class="card-title"></h3>
                </div> -->
                <div class="card-body">
                    <label>Job Type Name</label>
                    <input name="title" value="{{$jobType->title}}" class="form-control form-control @error('title') is-invalid @enderror" type="text" placeholder="Industry Name">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Job Type Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Job Type Description ...">{{$jobType->description}}</textarea>
                </div>
                <div class="card-footer">
                    <a type="reset" href="{{route('jobTypeList')}}" class="btn btn-danger customA">Back</a>
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
                        <h1 class="m-0 text-dark">Add Job Type</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Types</a></li>
                            <li class="breadcrumb-item active">Add Job Type</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('saveJobType')}}" method="post">
            @csrf
            <div class="card card-success">
                <div class="card-body">
                    <label>Job Type Name</label>
                    <input name="title" value="{{old('title')}}" class="form-control form-control @error('title') is-invalid @enderror" type="text" placeholder="Job Type Name">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Job Type Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Job Type Description ..."></textarea>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Add Job Type</button>
                </div>
                <!-- /.card-body -->
            </div>
        </form>
    @endif
@endsection