@extends('layouts.template')
@section('title')
Settings
@endsection
@section('content')
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h6 class="page-title">Panel Settings</h6>
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">{{Settings()->portal_name}}</li>
        <li class="breadcrumb-item">Panel Settings</li>
        <li class="breadcrumb-item active">Panel Settings</li>
      </ol>
    </div>
  </div>
</div>
@php
$sett=$data['settings'];
$logo=url('public/img/images.png');
$favicon=url('public/img/images.png');
if($sett->portal_logo!='' AND file_exists(public_path('img/settings/'.$sett->portal_logo))){
$logo=url('public/img/settings/'.$sett->portal_logo);
}
if($sett->portal_favicon!='' AND file_exists(public_path('img/settings/'.$sett->portal_favicon))){
$favicon=url('public/img/settings/'.$sett->portal_favicon);
}
@endphp
<form action="{{url('settings/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-12 col-md-12">
      <div class="card card-primary">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <div class="list-group nav-tabs penal-settings" role="tablist">
                <a class="list-group-item text-center rounded-0 active" data-bs-toggle="tab" href="#main-settings" role="tab">
                 Main Settings
                </a>
              </div>
            </div>
            <!-- Tab panes -->
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <div class="tab-content">
                <div class="tab-pane active p-3" id="main-settings" role="tabpanel">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Panel Name</label>
                      <input type="text" class="form-control" name="panel_name" value="{{$sett->portal_name}}" placeholder="Panel Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Panel Email</label>
                      <input type="email" class="form-control" name="panel_email" value="{{$sett->portal_email}}" placeholder="Panel Email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Panel Logo</label>
                      <input type="file" class="form-control" name="panel_logo" id="panel_logo">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Panel Favicon</label>
                      <input type="file" class="form-control" name="panel_favicon" id="panel_favicon">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-end">
          <button class="btn btn-primary mr-1" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('js')
@endsection