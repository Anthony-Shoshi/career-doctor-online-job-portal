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
                    <h1 class="m-0 text-dark">Manage Jobs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Manage Jobs</a></li>
                        <li class="breadcrumb-item active">Job List</li>
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
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Posted Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>
                                {{ $job->company_name }}
                            </td>
                            <td>
                            @if($job->is_published == 1)
                                <span class="badge badge-success h5 text-white">Published</span>
                            @else
                                <span class="badge badge-danger h5 text-white">Not Published</span>
                            @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-danger" onclick="return confirm('Are you sure to delete this industry?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Posted Date</th>
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