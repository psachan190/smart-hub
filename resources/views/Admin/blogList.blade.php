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
               <a href="<?php echo url("categoryList"); ?>" class="btn btn-info"><i class="fa fa-upload" aria-hidden="true"></i>

&nbsp;Post Blog</a> 
             </div>
            <div class="row">
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>

            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered" id="userTbl">
                <thead>
                <tr class="danger">
                  <td>Sn.</td>
                  <td>Image</td>
                  <td>Title</td>
                  <td>Description</td>
                  <td>date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                 <?php
                   if($blogListArr != FALSE ){
                      $i=1;
                      foreach($blogListArr as $list){
                           $image = $list->image;
                        ?>
                         <tr>
                            <td><?php echo $i; ?></td>
                            <td><img class="img img-responsive" style="width:50px; height:50px;" src="<?php echo url("uploadFiles/blogImage/$image"); ?>" /></td>
                            <td><?php echo $image; ?></td>
                            <td><?php echo $list->description; ?></td>
                            <td><?php echo $list->created_at; ?></td>
                            <td colspan="3"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                         </tr>
                        <?php 
                         $i++; 
                      }      
                    }
                   else{
                    ?>
                     <tr>
                       <td colspan="6">No blog Post Available</td>
                     </tr>
                    <?php
                   }
                 ?>  
                
                </tbody>
              </table>   
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
@endsection 