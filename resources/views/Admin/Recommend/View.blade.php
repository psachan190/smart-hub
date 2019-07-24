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
               <a href="#" class="btn btn-info">
                <i class="fa fa-list" aria-hidden="true"></i>
                &nbsp; Recommend Shop List  </a>
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
                  <td>Shop name</td>
                  <td>Category</td>
                  <td>Shop Address</td>
                </tr>
                </thead>
                <tbody>
                @php 
                  $i=1;
                @endphp 
                @if(count($recommendshop)>0) 
                @foreach($recommendshop as $listitem )
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $listitem->shopname }}</td>
                   <td>{{ $listitem->category->cname }}</td>
                    <td>{{ $listitem->location }}</td>
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