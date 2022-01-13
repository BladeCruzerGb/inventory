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
        <li class="breadcrumb-item"><a href="../tool">List Tool</a></li>
        <li class="breadcrumb-item active">{{ $hal }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center">
      @if ($datatool->image)
        <img class="profile-user-img img-fluid img-circle mb-3"
        src="{{ asset('storage/' . $datatool->image) }}"
        alt="User profile picture">
      @else
        <img class="profile-user-img img-fluid img-circle mb-3"
          src="{{ asset('storage/tool-image/default.png') }}"
          alt="User profile picture">
      @endif

    </div>

    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>Engineering No</b> <a class="float-right">{{ $datatool->kode }}</a>
      </li>
      <li class="list-group-item">
        <b>Tool Name</b> <a class="float-right">{{ $datatool->tool_name }}</a>
      </li>
      <li class="list-group-item">
        <b>Part No</b> <a class="float-right">{{ $datatool->part_no }}</a>
      </li>
      <li class="list-group-item">
        <b>Tool Specification</b> <a class="float-right">{{ $datatool->tool_spec }}</a>
      </li>
      <li class="list-group-item">
        <b>Tool Material</b> <a class="float-right">{{ $datatool->tool_material }}</a>
      </li>
      <li class="list-group-item">
        <b>Standard Using</b> <a class="float-right">{{ $datatool->standard_using }}</a>
      </li>
      <li class="list-group-item">
        <b>Stock</b> <a class="float-right">{{ $datatool->stock }}</a>
      </li>
      <li class="list-group-item">
        <b>Price</b> <a class="float-right">{{ $datatool->price }}</a>
      </li>
    </ul>

    <a href="../tool" class="btn btn-primary btn-block mt-3"><b>Back</b></a>
  </div>
  <!-- /.card-body -->
</div>
@endsection