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
            <h1 class="m-0 text-dark">Category List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Category List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- end content header -->
<div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Category Code</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobCategories as $jobCategory)
                <tr>
                  <td>{{$jobCategory->category_name}}</td>
                  <td>{{$jobCategory->category_code}}</td>
                  <td>{{$jobCategory->category_description}}</td>
                  <td>
                    <a href="{{route('editCategory',[$jobCategory->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{route('deleteCategory',[$jobCategory->id])}}" onclick="return confirm('Are you sure to delete this category?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Category Name</th>
                  <th>Category Code</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
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