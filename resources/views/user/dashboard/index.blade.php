@extends('templates-user.main')

@section('bread')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Home</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's
            content.
          </p>

          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection