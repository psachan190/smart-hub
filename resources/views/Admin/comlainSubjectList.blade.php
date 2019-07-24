@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Quiz List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
         <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6">
                 <a href="<?php echo url("addComplianSubject"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Add Complain Subject</a> 
               </div>
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div> 
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
               <div class="resultRecord"></div>
              </div>
              <div class="col-sm-2"></div> 
            </div>
            <div id="listGroup">
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered" id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Complain Subject</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                  @if($subjectlistArr != FALSE)
                    @php $i=1; @endphp
                    @foreach($subjectlistArr as $data)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $data->subject }}</td>
                      <td><a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" id="{{ $data->id }}" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></a></td> 
                    </tr>
                      @php $i++; @endphp
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="danger">No record Available...</td>
                    </tr>
                  @endif
                </tbody>
              </table>   
              </div>
            </div>  
         </div>
     </div>
      <!-- Main row --> 
    </section>
<style>
.signupbtn{
	background-color:#06F; padding:7px; font-size:18px; border:none !important; color:#FFF !important;
	}
	.form-control{
	border-radius:0px !important;
}
input{
	color:#000 !important;
}
</style>
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','.deletebtn',function(){
    var con =  confirm("are you sure want to delete ..");
     if(con==true){
	     var id = this.id; //alert(id);
		  $.ajax({
		  url: "<?php echo url("deleteSubject"); ?>",
		  type: "GET",        
		  data: {id:id},
		  success: function(data){
			  //alert(data);
			  $('.resultRecord').html(data);
			  $('#listGroup').load(document.URL + ' #listGroup');  
		   }	
		 });
	  }
  });
});
</script>
@endsection 