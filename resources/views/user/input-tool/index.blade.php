@extends('templates-user.main')

@section('bread')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Layout</a></li>
      <li class="breadcrumb-item active">Top Navigation</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="container">

  @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('success') }}</h5>
      </div>
    @endif
    
  <div class="row">
    <div class="col-lg">
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