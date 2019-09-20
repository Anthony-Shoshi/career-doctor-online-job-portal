@extends('admin.layouts.master')
@section('myCss')
    <!-- datatable -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New Job Skills List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Job Skills</a></li>
                        <li class="breadcrumb-item active">New Job Skills List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- end content header -->
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Job Skill Name</th>
                    <th>Job Skill Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobSkillsTemps as $jobSkillsTemp)
                    <tr>
                        <td>{{$jobSkillsTemp->skill_name}}</td>
                        <td>{{$jobSkillsTemp->skill_description}}</td>
                        <td>{{$jobSkillsTemp->status}}</td>
                        <td>
                            @if($jobSkillsTemp->status != 'ACCEPTED')
                            <a title="Accept" href="{{route('acceptNewJobSkill',[$jobSkillsTemp->id])}}" class="btn btn-success"><i class="fa fa-check"></i></a>
                            <a title="Reject" href="{{route('rejectNewJobSkill',[$jobSkillsTemp->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this skill?');"><i class="fa fa-times"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Job Skill Name</th>
                    <th>Job Skill Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('myJs')
    <!-- DataTables -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection