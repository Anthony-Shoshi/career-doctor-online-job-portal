@extends('admin.layouts.master')

@section('content')
    @if(Route::is('editJobQualification'))
        <!-- content header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Qualification</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Qualification</a></li>
                            <li class="breadcrumb-item active">Edit Qualification</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('updateJobQualification')}}" method="post">
            <input type="hidden" value="{{$jobQualification->id}}" name="id">
            @csrf
            <div class="card card-success">
                <!-- <div class="card-header">
                    <h3 class="card-title"></h3>
                </div> -->
                <div class="card-body">
                    <label>Qualification Name</label>
                    <input name="qualification_name" value="{{$jobQualification->qualification_name}}" class="form-control form-control @error('qualification_name') is-invalid @enderror" type="text" placeholder="Qualification Name">
                    @error('qualification_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Qualification Description</label>
                    <textarea name="qualification_description" class="form-control" rows="3" placeholder="Qualification Description ...">{{$jobQualification->qualification_description}}</textarea>
                </div>
                <div class="card-footer">
                    <a type="reset" href="{{route('jobQualificationList')}}" class="btn btn-danger customA">Back</a>
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
                        <h1 class="m-0 text-dark">Add Qualification</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Qualification</a></li>
                            <li class="breadcrumb-item active">Add Qualification</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('saveJobQualification')}}" method="post">
            @csrf
            <div class="card card-success">
                <div class="card-body">
                    <label>Qualification Name</label>
                    <input name="qualification_name" value="{{old('qualification_name')}}" class="form-control form-control @error('qualification_name') is-invalid @enderror" type="text" placeholder="Qualification Name">
                    @error('qualification_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Qualification Description</label>
                    <textarea name="qualification_description" class="form-control" rows="3" placeholder="Qualification Description ..."></textarea>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Add Qualification</button>
                </div>
                <!-- /.card-body -->
            </div>
        </form>
    @endif
@endsection