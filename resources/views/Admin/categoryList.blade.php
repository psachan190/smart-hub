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
                 <a href="<?php echo url("addCategory"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp; Add Shop Category</a> 
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
                <?php
                if(isset($_GET['success'])){
				    ?>
					   <p class="alert alert-success">Record Update successfully....</p>
					<?php
				 }  
				 if(isset($_GET['failed'])){
				    ?>
					   <p class="alert alert-danger">Record Delete successfully....</p>
					<?php
				 }  
				 
				 ?>
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
                  <td>Shop Category Name</td>
                  <td>Description</td>
                  <td>Date</td>
                  <td>Total Marks</td>
                  <td>Date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @if($listArr != FALSE)
				  @php 
                     $i=1;
                     $arr = array("1"=>"Goods","2"=>"Services","3"=>"Both")
                   @endphp
                  @foreach($listArr as $list )
                   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $arr[$list->bType]." <strong>>></strong> ".$list->cname; ?></td>
                  <td><?php echo $list->cDesc; ?></td>
                   <td><?php echo date("d/m/Y",$list->crDate); ?></td>
                  <td><?php echo $list->cSataus; ?></td>
                  <td colspan="3"><a href="<?php echo url("editShopCategory/$list->cid")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a href="#" id="<?php if(!empty($list->cid))echo $list->cid; ?>" class="btn btn-danger deleteShopCat"><i class="fa fa-trash" aria-hidden="true"></i>
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
    $(document).on('click','.deleteShopCat',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("delShopCat"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		  //alert(data);
          $('#resultRecord').html(data);
		  $('#listGroup').load(document.URL + ' #listGroup');  
 	   }	
     });
	 }
	});   			
});
</script>
@endsection 