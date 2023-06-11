@extends('layouts.template')
@section('title')
Dashboard
@endsection
@section('content')
<!-- start page title -->
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h6 class="page-title">Dashboard</h6>
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item active">Welcome to {{Settings()->portal_name}} Dashboard</li>
      </ol>
    </div>
  </div>
</div>
<!-- end page title -->
<div class="row justify-content-center">
  <div class="col-xl-6 col-md-6">
    <div class="card mini-stat text-dark" style="background:#E6F2FE; border-top: 4px solid #006BA6;">
      <div class="card-body">
        <div class="mb-4">
          <div class="float-start mini-stat-img me-4 text-white" style="background:#006BA6;">
            <i class="fas fa-file fa-lg"></i>
          </div>
          <h5 class="fw-bold font-size-16 text-uppercase">Total Documents</h5>
          <h4 class="fw-bold font-size-24">{{number_format($total)}}</h4>
        </div>
        <div class="pt-2">
          <div class="float-end">
            <a href="{{url('documents')}}" class="text-dark"><i class="mdi mdi-arrow-right h5"></i></a>
          </div>
          <p class="text-dark mb-0 mt-1">Total Documents</p>
        </div>
      </div>
    </div>
  </div>

<div class="col-md-6">
  <div class="card card-primary">
    <div class="card-header bg-white">
      <h4>Recent Documents</h4>
    </div>
    <div class="card-body">
        <table class="table table-sm table-bordered text-center">
          <thead class="bg-primary text-white">
              <th>Name</th>
              <th>Password</th>
              <th>Date</th>
          </thead>
          <tbody>
            @foreach($documents as $document)
            <tr>
              <td>{{$document->project_name}}</td>
              <td>{{$document->password}}</td>
              <td>{{Carbon\Carbon::parse($document->created_at)->format('d-m-Y')}}</td>              
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
@section('js')
<script>
$(document).ready(function() {

});
</script>
@endsection