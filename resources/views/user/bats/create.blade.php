@extends('templates-user.main')

@section('bread')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('bat.index') }}">{{ $halaman }}</a></li>
      <li class="breadcrumb-item active">Create Data</li>
    </ol>
  </div>
</div>
@endsection 

@section('content')
<div class="row">
  <div class="col-md">
    <form action="../bat" method="POST">
      @csrf
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ $next_hal }}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="no">No</label>
            <input type="text" id="no" name="no" class="form-control @error('no') is-invalid @enderror" value="{{ old('no') }}" required>
            @error('no')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="section">Section</label>
                <select name="section" id="section" class="form-control custom-select @error('section') is-invalid @enderror" required>
                  <option selected disabled>Select one</option>
                  @foreach ($sections as $input)
                     <option value="{{ $input->section }}">{{ $input->section }}</option> 
                  @endforeach
                </select>
                @error('section')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="line">Line</label>
                <input type="text" id="line" name="line" class="form-control @error('line') is-invalid @enderror" value="{{ old('line') }}" required>
                @error('line')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_machine">Machine No</label>
                <input type="text" id="no_machine" name="no_machine" class="form-control @error('no_machine') is-invalid @enderror" value="{{ old('no_machine') }}" required>
                @error('no_machine')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_process">Process No</label>
                <input type="text" id="no_process" name="no_process" class="form-control @error('no_process') is-invalid @enderror" value="{{ old('no_process') }}" required>
                @error('no_process')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                  <th class="text-center" style="width: 30%">Kode</th>
                  <th class="text-center" style="width: 10%">Quantity</th>
                  <th class="text-center">Note</th>
                  <th class="text-center" style="width: 10%">Action</th>
                </tr>
                <tr>  
                  <td>
                    <select name="kode[]" id="kode[]" class="form-control">
                      <option selected disabled>Select one</option>
                      @foreach ($tools as $tool)
                          <option value="{{ $tool->kode }}">{{ $tool->kode }}</option>
                      @endforeach
                    </select>
                    {{-- <input type="text" name="kode[]" class="form-control @error('kode[]') is-invalid @enderror" required /> --}}
                  </td>  
                  <td><input type="text" name="qty[]" class="form-control" required/></td>
                  <td><input type="text" name="note[]" class="form-control" required/></td>  
                  <td class="text-center"><button type="button" name="addRow" id="addRow" class="btn btn-success ">Add</button></td>  
                </tr>  
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-2">
      <a href="../bat" class="btn btn-secondary">Back</a>
      <input type="submit" value="Create new Data" class="btn btn-success float-right">
    </div>
  </div>
</form>
@endsection

@push('scripts')
  <script>
    $('#addRow').on('click', function() {
      addRow();
    });
    function addRow()
    {
      var tr='<tr>'+
      // '<td><input type="text" name="kode[]" class="form-control" /></td>'+
      '<td style="width: 30%"><select name="kode[]" id="kode[]" class="form-control"><option selected disabled>Select one</option>@foreach ($tools as $tool)<option value="{{ $tool->kode }}">{{ $tool->kode }}</option>@endforeach</select></td>'+
      '<td style="width: 10%"><input type="text" name="qty[]" class="form-control" /></td>'+
      '<td><input type="text" name="note[]" class="form-control" /></td>'+
      '<td class="text-center" style="width: 10%"><button type="button" class="btn btn-danger remove-tr">Remove</button></td>'+
      '</tr>';
      $('tbody').append(tr);
    };

    $(document).on('click', '.remove-tr', function(){  
      $(this).parents('tr').remove();
    });  
  </script>
@endpush