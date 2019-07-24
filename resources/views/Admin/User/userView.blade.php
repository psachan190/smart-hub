@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Module</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
              <a href="{{ url('uservipAdd') }}" class="btn btn-info">
                <i class="fa fa-list" aria-hidden="true"></i>
                &nbsp; Add VIP User </a> 
            </div>
           @if(session()->has('status'))
            <div class="alert alert-success" role="alert" style="margin-top:18px;">
                  {{ session('status') }}
            </div>
            @endif
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered">
                <thead>
                <tr class="danger">
                  <td>Sn</td>
                  <td>User name</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @php 
                  $i=1;
                @endphp 
                @if(count($moduleList)>0) 
                @foreach($moduleList as $listitem )
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $listitem->name }}</td>
                  <td colspan="3">
                    <a href="{{  url('uservipAdd', ['id' => $listitem->id]) }} " class="btn btn-info">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>&nbsp;
                    <a href="{{ url('uservipDelete', ['id' => $listitem->id])}}" onclick="return confirm('Are you sure to delete this module?');" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                @php  
                  $i++;
                @endphp
                @endforeach 
                @else
                  <tr>
                    <td colspan="5">No Record found</td>
                  </tr>
                @endif
                </tbody>
               </table>
               <table class="table table-bordered">
                <thead>
                <tr class="danger">
                  
                 </tr>
                </thead>
               </table>   
              </div>
         </div>
     </div>
   
      <!-- Main row --> 
    </section>

<script>
$(document).ready(function(e) {
   $(document).on('click','#done',function(){
      //alert("yes");
	  var quiz = $('#quizTitle').val();
	  //alert(quiz);
	  var url = "<?php echo url("addQuestion?quizCode="); ?>"+quiz;
	  window.location.href = url;
   });
});
</script>
@endsection 