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
                 <a href="<?php echo url("addsCategory"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Add Category</a> 
               </div>
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
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
               <table class="table table-bordered" id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Shop Category</td>
                  <td>Category Name</td>
                  <td>Description</td>
                  <td>Date</td>
                     <td>Status</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php
                  $arr = array("1"=>"Goods","2"=>"Services","3"=>"Both");
				?>
                <?php $i=1; foreach($listArr as $list): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $arr[$list->bType]." <strong>>></strong> ".$list->cname; ?></td>
                  <td><?php echo $list->csname; ?></td>
                  <td><?php echo $list->cDesc; ?></td>
                   <td><?php echo date("d/m/Y",$list->ccrDate); ?></td>
                  <td><?php echo $list->cstatus; ?></td>
                  <td colspan="3"><a href="<?php echo url("editsCategory/$list->id")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a id="<?php if(!empty($list->id))echo $list->id; ?>" href="#" class="btn btn-danger deleteCategory"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                <?php $i++; endforeach; ?>
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
    $(document).on('click','.deleteCategory',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("delCat"); ?>",
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