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
                    <h1 class="m-0 text-dark">City List of {{$countryName}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">City</a></li>
                        <li class="breadcrumb-item active">City List</li>
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
                    <th style="width: 70%;">City Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->name}}</td>
                        <td>
                            <a href="{{route('editCity',[$city->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="{{route('deleteCity',[$city->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this city?');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>City Name</th>
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