@extends('admin.layouts.master')

@section('content')
    @if(Route::is('editJobSkill'))
        <!-- content header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Job Skill</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Skill</a></li>
                            <li class="breadcrumb-item active">Edit Job Skill</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('updateJobSkill')}}" method="post">
            <input type="hidden" value="{{$jobSkill->id}}" name="id">
            @csrf
            <div class="card card-success">
                <!-- <div class="card-header">
                    <h3 class="card-title"></h3>
                </div> -->
                <div class="card-body">
                    <label>Skill Name</label>
                    <input name="skill_name" value="{{$jobSkill->skill_name}}" class="form-control form-control @error('skill_name') is-invalid @enderror" type="text" placeholder="Skill Name">
                    @error('skill_name')
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Skill Description</label>
                    <textarea name="skill_description" class="form-control" rows="3" placeholder="Skill Description ...">{{$jobSkill->skill_description}}</textarea>
                </div>
                <div class="card-footer">
                    <a type="reset" href="{{route('jobSkillsList')}}" class="btn btn-danger customA">Back</a>
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
                        <h1 class="m-0 text-dark">Add Job Skill</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Job Skills</a></li>
                            <li class="breadcrumb-item active">Add Job Skill</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- end content header -->
        <form action="{{route('saveJobSkill')}}" method="post">
            @csrf
            <div class="card card-success">
                <!-- <div class="card-header">
                    <h3 class="card-title"></h3>
                </div> -->
                <div class="card-body">
                    <label>Skill Name</label>
                    <input name="skill_name" value="{{old('skill_name')}}" class="form-control form-control @error('skill_name') is-invalid @enderror" type="text" placeholder="Skill Name">
                    @error('skill_name')
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
                    @enderror
                    <br>
                    <label for="exampleInputEmail1">Skill Description</label>
                    <textarea name="skill_description" class="form-control" rows="3" placeholder="Skill Description ..."></textarea>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Add Skill</button>
                </div>
                <!-- /.card-body -->
            </div>
        </form>
    @endif
@endsection