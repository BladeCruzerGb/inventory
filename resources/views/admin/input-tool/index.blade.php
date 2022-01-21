@extends('templates.main')

@section('title', 'INPUT')
@section('bread')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ $halaman }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item active"> {{ $halaman }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('success') }}</h5>
      </div>
    @endif
  
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="intool/create" class="btn btn-primary">Add Data</a>
          </div>   
          <div class="card-body">
            <table id="inputTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Section</th>
                  <th>Part No</th>
                  <th>Tool Specification</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($inputs as $input)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $input->created_at->format('d-m-Y') }}</td>
                  <td>{{ $input->section }}</td>
                  <td>{{ $input->part_no }}</td>
                  <td>{{ $input->spec }}</td>
                  <td>{{ $input->qty }}</td>
                  <td class="text-center">
                    <a href=""><i class="nav-icon fas fa-info"></i></a>
                    <a href=""><i class="nav-icon fas fa-edit ml-2"></i></a>
                    <a href=""><i class="nav-icon fas fa-trash ml-2" style="color: red"></i></a>
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  $(function () {
    $("#inputTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#inputTable_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush