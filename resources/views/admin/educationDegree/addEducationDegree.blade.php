@extends('admin.layouts.master')

@section('content')
    @if(Route::is('editEducationDegree'))
        <!-- content header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Degree</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Education Degree</a></li>
                            <li class="breadcrumb-item active">Edit Degree</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('updateEducationDegree')}}" method="post">
            <input type="hidden" value="{{$educationDegree->id}}" name="id">
            @csrf
            <div class="card card-success">
                <!-- <div class="card-header">
                    <h3 class="card-title"></h3>
                </div> -->
                <div class="card-body">
                    <label>Degree Name</label>
                    <input name="degree_name" value="{{$educationDegree->degree_name}}" class="form-control form-control @error('degree_name') is-invalid @enderror" type="text" placeholder="Degree Name">
                    @error('degree_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Degree Description</label>
                    <textarea name="degree_description" class="form-control" rows="3" placeholder="Degree Description ...">{{$educationDegree->degree_description}}</textarea>
                </div>
                <div class="card-footer">
                    <a type="reset" href="{{route('educationDegreeList')}}" class="btn btn-danger customA">Back</a>
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
                        <h1 class="m-0 text-dark">Add Degree</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Education Degree</a></li>
                            <li class="breadcrumb-item active">Add Degree</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('saveEducationDegree')}}" method="post">
            @csrf
            <div class="card card-success">
                <div class="card-body">
                    <label>Degree Name</label>
                    <input name="degree_name" value="{{old('degree_name')}}" class="form-control form-control @error('degree_name') is-invalid @enderror" type="text" placeholder="Degree Name">
                    @error('degree_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Degree Description</label>
                    <textarea name="degree_description" class="form-control" rows="3" placeholder="Degree Description ...">{{old('degree_description')}}</textarea>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Add Degree</button>
                </div>
                <!-- /.card-body -->
            </div>
        </form>
    @endif
@endsection