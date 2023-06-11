@extends('layouts.frontend-layout')
@section('content')
<div class="wrapper">
    <div class="bg-warning h-100 position-absolute justify-content-center align-items-center d-flex">
        <div class="row m-0 align-items-center justify-content-center p-3">
            <div class="col-4">
            <img src="{{url('public/img/settings/'.Settings()->portal_logo)}}" class="w-50 h-50">
            </div>

            <div class="col-4 text-center">
                <p>COLLABORATION MADE EASY</p>
                <p class="fw-bold text-white">STRATEGIC COLLABORATION DESIGN WORKSHEET</p>
                <input type="text" name="passcode" id="passcode" placeholder="Enter passcode" class="fw-bold border-0 text-center bg-warning project-name">
            </div>
            <div class="col-4 text-end">
                <button id="submit" class="btn btn-sm btn-outline-secondary text-white border-white">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click','#submit', function() {
        var pscode=$("#passcode").val();
        window.location.href="{{url('documents/show')}}?passcode="+pscode;
    });

});
</script>
@endsection