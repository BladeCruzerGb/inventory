@extends('templates.main')

@section('title', 'TOOL')
@section('bread')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>List Tool</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item active"> {{ $hal }}</li>
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
          <a href="tool/create" class="btn btn-primary">Add Data</a>
        </div>
        <div class="card-body">
          <table id="tool-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Part Name</th>
              <th>Part No</th>
              <th>Tool Specification</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tools as $tool)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $tool->kode }}</td>
              <td>{{ $tool->tool_name }}</td>
              <td>{{ $tool->part_no }}</td>
              <td>{{ $tool->tool_spec }}</td>
              <td>{{ $tool->stock }}</td>
              <td class="text-center">
                <a href="{{ route('tool.show',$tool->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="nav-icon fas fa-info"></i></a>
                <a href="{{ route('tool.edit', $tool->id) }}" class="ml-2" data-bs-toggle="tooltip" title="Edit"><i class="nav-icon fas fa-edit"></i></a>
                <form action="{{ route('tool.destroy',$tool->id) }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="border-0" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="nav-icon fas fa-trash" style="color: red"></i></button>
                </form>
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
    $("#tool-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tool-table_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush