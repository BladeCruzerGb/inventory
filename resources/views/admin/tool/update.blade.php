@extends('templates.main')

@section('title', 'ADD Data')
@section('bread')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ $hal }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tool.index') }}">List Tool</a></li>
        <li class="breadcrumb-item active">{{ $hal }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md">
    <form action="{{ route('tool.update', $tools->id) }}" method="POST" enctype="multipart/form-data">
      @method('put')
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
                <label for="kode">Kode</label>
                <input type="text" id="kode" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $tools->kode) }}" autofocus>
                @error('kode')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="tool_name">Part Name</label>
                <input type="text" id="tool_name" name="tool_name" class="form-control @error('tool_name') is-invalid @enderror" value="{{ old('tool_name', $tools->tool_name) }}">
                @error('tool_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="part_no">Part No</label>
            <input type="text" id="part_no" name="part_no" class="form-control @error('part_no') is-invalid @enderror" value="{{ old('part_no', $tools->part_no) }}">
            @error('part_no')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tool_spec">Tool Specification</label>
            <textarea id="tool_spec" name="tool_spec" class="form-control @error('tool_spec') is-invalid @enderror" rows="4" >{{ old('tool_spec', $tools->tool_spec) }}</textarea>
            @error('tool_spec')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
              <label for="tool_material">Tool Material</label>
              <input type="text" id="tool_material" name="tool_material" class="form-control @error('tool_material') is-invalid @enderror" value="{{ old('tool_material', $tools->tool_material) }}">
              @error('tool_material')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Tool Image</label>
            <input type="hidden" name="oldImage" value="{{ $tools->image }}">
            @if ($tools->image)
              <img src="{{ asset('storage/' . $tools->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else 
              <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="standard_using">Standard Using</label>
                <input type="text" id="standard_using" name="standard_using" class="form-control @error('standard_using') is-invalid @enderror" value="{{ old('standard_using', $tools->standard_using) }}">
                @error('standard_using')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $tools->price) }}">
                @error('price')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-2">
      <a href="../tool" class="btn btn-secondary">Back</a>
      <input type="submit" value="Update Data" class="btn btn-success float-right">
    </div>
  </div>
</form>
@endsection
    
@push('scripts')
<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
  }
</script>
@endpush