@extends('layouts.frontend-layout')
@section('title')
Documents
@endsection
@section('content')
<div class="wrapper">
    <form class="bg-warning" action="{{url('documents/store')}}" method="post" id="project-form">
       @csrf
        <div class="row m-0 align-items-center justify-content-center p-3">
            <div class="col-4">
            <img src="{{url('public/img/settings/'.Settings()->portal_logo)}}" class="w-50 h-50">
            </div>

            <div class="col-4 text-center heading-container">
                <p>COLLABORATION MADE EASY</p>
                <p class="fw-bold text-white">STRATEGIC COLLABORATION DESIGN WORKSHEET</p>
                <input type="" name="project_name" value="{{old('project_name')}}" placeholder="Name of Project" class="fw-bold border-0 text-center bg-warning project-name">
            </div>
            <div class="col-4 text-end">
                <button type="button" id="fake-submit" class="btn btn-sm btn-outline-secondary text-white border-white">Save</button>
                <button type="submit" hidden id="submit" class="btn btn-sm btn-outline-secondary text-white border-white">Save</button>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-25 pb-2 element">
                    <div class="bg-white h-100 overflow-hidden pb-2">
                        <h4 class="fw-bold fs-5 heading mt-2 ms-2">Topic:</h4>
                        <textarea rows="0" name="topic" class="w-100 h-100 border-0 overflow-auto p-2">{{old('topic')}}</textarea>
                    </div>
                </div>
                <div class="h-75 pt-2 element">
                    <div class="bg-white h-100 overflow-hidden pb-2">
                        <h4 class="fw-bold fs-5 heading mt-2 ms-2">Situation Summary:</h4>
                        <textarea rows="0" name="summery" class="w-100 h-100 border-0 overflow-auto p-2">{{old('summery')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-100 element bg-white overflow-hidden pb-2">
                <h4 class="fw-bold fs-5 heading mt-2 ms-2">3.Actions</h4>
                <textarea rows="0" name="action" class="w-100 h-100 border-0 overflow-auto p-2">{{old('action')}}</textarea>
                </div>
            </div>
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-100 element bg-white overflow-hidden pb-2">
                <h4 class="fw-bold fs-5 heading mt-2 ms-2"><span style="background-color: limegreen;" class="text-white fw-bold me-3 ps-2 pe-2">G</span>2.Required Outcomes</h4>
                <textarea rows="0" name="outcomes" class="w-100 h-100 border-0 overflow-auto p-2">{{old('outcomes')}}</textarea>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-100 element bg-white overflow-hidden pb-2">
                <h4 class="fw-bold fs-5 heading mt-2 ms-2"><span style="background-color: darkred;" class="text-white fw-bold me-3 ps-2 pe-2">A</span>1.Case for Action</h4>
                <textarea rows="0" name="case_for_action" class="w-100 h-100 border-0 overflow-auto p-2">{{old('case_for_action')}}</textarea>
                </div>
            </div>
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-100 element bg-white overflow-hidden pb-2">
                <h4 class="fw-bold fs-5 heading mt-2 ms-2"><span style="background-color: orange;" class="text-white fw-bold me-3 ps-2 pe-2">B</span>4.Barrier To Success</h4>
                <textarea rows="0" name="barrier_to_success" class="w-100 h-100 border-0 overflow-auto p-2">{{old('barrier_to_success')}}</textarea>

                </div>
            </div>
            <div class="col-4 p-2" style="height:50vh;">
                <div class="h-100 element bg-white overflow-hidden pb-2">
                <h4 class="fw-bold fs-5 heading mt-2 ms-2"><span style="background-color: blue;" class="text-white fw-bold me-3 ps-2 pe-2">4</span>5.Unintended Negative Consequences</h4>
                <textarea rows="0" name="consequences" class="w-100 h-100 border-0 overflow-auto p-2">{{old('consequences')}}</textarea>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '.element', function(){
        $('.element').removeClass('extends');
        $('.heading').show();
        $(this).addClass('extends');
        $(this).find('.heading').hide();

    });

   $(document).on('click', function(){
    console.log($('.element').length);
      if(!$(event.target).closest(".element").length){
        $('.element').removeClass('extends');
        $('.heading').show();
      }
   });




$(document).on('click','#fake-submit', function(e) {

    Swal.fire({
        title: "Enter Password",
        //text: "Enter Password",
        input: 'text',
    }).then((result) => {
        if(result.value==""){
            Swal.fire({
             icon: 'error',
              title: 'Oops...',
              text: "You haven't entered a password!",            
            });
        }else{
            $("#project-form").append('<input type="text" name="password" value="'+result.value+'">');
                $("#submit").click();
        }
    });

});



});
</script>

@endsection