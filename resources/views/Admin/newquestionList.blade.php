@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Question List</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Question List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
               <div class="row">
                   <div class="col-sm-3"></div>
                   <div class="col-sm-6">
                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                      @foreach($errors->all() as $error)
                       <li class='' style='color:red;'>{{ $error }}</li>
                      @endforeach  
                   </div>
                   <div class="col-sm-3"></div> 
                  
             </div>
             <div class="row">      
                <div class="col-sm-12">
                	<table class="table table-bordered"  id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Question</td>
                  <td>action</td>
                </tr>
                </thead>
                <tbody>
              @if($listArr != false)
            
              <?php $i=1; foreach( $listArr as $data ): ?>
              @php $id = $data->id;
              @endphp
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data->question; ?></td>
                  <td colspan="3"><a href='{{ url("admin_editquestion/$id") }}' class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a id="{{ $data->id }}" class="deletequestion btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                <?php $i++; endforeach; ?>
              @endif  
                </tbody>
              </table>
                </div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
    <script>
$(document).ready(function(e) {
	//alert("fdsdfgfdg");
    $(document).on('click','.deletequestion',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id;
	  //alert(id);
	  $.ajax({
      url: "<?php echo url("deletequestion"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		 window.location.reload();
 	   }	
     });
	 }
	});   			
});
</script>
@endsection 
