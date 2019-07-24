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
                 <a href="<?php echo url("addPackage"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp; Add Package</a> 
                 </div>
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>
            <div class="row" style="margin-top:10px;">
              <div class="col-sm-12"> 
              <div id="resultRecord"></div>
			  <?php
                if(isset($_GET['msg'])){
				    if($_GET['msg']==1){
					   ?>
					   <p class="alert alert-danger">Remove successfully....</p>
					   <?php
					 }
					if($_GET['msg']==2){
					   ?>
					   <p class="alert alert-danger">Unexpected Try again....</p>
					   <?php
					 } 
				 }
			  ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
                <div id="resultRecord"></div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>
           <div id="listGroup"> 
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered"  id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Title</td>
                  <td>Number Of Ads</td>
                  <td>Package Amount</td>
                  <td>Duration</td>
                  <td>Description</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @if($packageList != FALSE)
				  @php  $i=1; @endphp
                  @foreach($packageList as $list)
                   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->title; ?></td>
                  <td><?php echo $list->numberOfAds; ?></td>
                  <td><?php echo $list->packageAmount; ?></td>
                  <td><?php echo $list->duration; ?></td>
                  <td><?php echo $list->description; ?></td>
                  <td colspan="3"><button class="delPackageData btn btn-danger" name="delPackageData" id="<?php if(!empty($list->id))echo $list->id; ?>" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i>
</button>&nbsp;&nbsp;&nbsp;<a href='{{ url("editpackageList/$list->id")}}' class="edit btn btn-info" name="edit" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i>
</a></td>
                </tr>
                 @php  $i++; @endphp
                   @endforeach
                @else
                 <tr>
                  <td>No Records founds...</td>
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
$(document).ready(function(e) {
    $(document).on('click','.delPackageData',function(){
	  var con = confirm("Are you Sure want to Delete this Package List");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("delPackageList"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
       $('#resultRecord').html(data);
	   location.reload();
 	   }	
     });
	 }
	});   			
});
</script>
@endsection 