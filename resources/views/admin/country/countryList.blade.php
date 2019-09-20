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
                    <h1 class="m-0 text-dark">Country List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Country</a></li>
                        <li class="breadcrumb-item active">Country List</li>
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
                        <th>Country Name</th>
                        <th>ISO 3</th>
                        <th>ISO 2</th>
                        <th>Currency</th>
                        <th>Capital City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{$country->name}}</td>
                            <td>{{$country->iso3}}</td>
                            <td>{{$country->iso2}}</td>
                            <td>{{$country->currency}}</td>
                            <td>{{$country->capital}}</td>
                            <td>
                                <a href="{{route('editCountry',[$country->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('deleteCountry',[$country->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this country?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Country Name</th>
                        <th>ISO 3</th>
                        <th>ISO 2</th>
                        <th>Currency</th>
                        <th>Capital City</th>
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