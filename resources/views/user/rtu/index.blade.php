@extends('templates-user.main')

@section('bread')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0"> {{ $halaman }}</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">{{ $halaman }}</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-header">
                <h3>Tool Ready To Use</h3>
              </div> 
            <div class="card-body">
                <table id="datastock" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Part No</th>
                        <th>Tool Specification</th>
                        <th>Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tools as $tool)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $tool->created_at->format('d-m-Y') }}</td>
                          <td>{{ $tool->kode }}</td>
                          <td>{{ $tool->part_no }}</td>
                          <td>{{ $tool->tool_spec }}</td>
                          <td>{{ $tool->stock }}</td>
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
        $("#datastock").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datastock_wrapper .col-md-6:eq(0)');
      });
    </script>
    @endpush