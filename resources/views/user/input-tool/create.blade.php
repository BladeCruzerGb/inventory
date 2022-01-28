@extends('templates-user.main')

@section('title', 'INPUT')
@section('bread')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ $hal }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('intool.index') }}">{{ $halaman }}</a></li>
        <li class="breadcrumb-item active"> {{ $hal }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md">
    <form action="../intool" method="POST">
      @csrf
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ $hal }}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="section">Section</label>
                <select name="section" id="section" class="form-control custom-select @error('section') is-invalid @enderror">
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
            <div class="col-md-8">
              <div class="form-group">
                <label for="no_spb">No SPB</label>
                <input type="text" id="no_spb" name="no_spb" class="form-control @error('no_spb') is-invalid @enderror" value="{{ old('no_spb') }}">
                @error('no_spb')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="part_no">Part No</label>
            <select name="part_no" id="part_no" class="form-control custom-select @error('part_no') is-invalid @enderror">
              <option selected disabled>Select one</option>
              @foreach ($tools as $input)
                 <option value="{{ $input->part_no }}">{{ $input->part_no }}</option> 
              @endforeach
            </select>
            @error('part_no')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tool_spec">Tool Specification</label>
            <textarea id="spec" name="spec" class="form-control @error('spec') is-invalid @enderror" rows="4" value="{{ old('spec') }}"></textarea>
            @error('spec')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
              <label for="qty">Quantity</label>
              <input type="text" id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}">
              @error('qty')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-2">
      <a href="../intool" class="btn btn-secondary">Back</a>
      <input type="submit" value="Create new Data" class="btn btn-success float-right">
    </div>
  </div>
</form>
@endsection