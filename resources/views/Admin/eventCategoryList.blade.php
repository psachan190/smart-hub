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
                 <a href="<?php echo url("addEventCategory"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp; Add Event Category</a> 
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
                <div id="response"></div>
              </div>
              <div class="col-sm-2"></div>
              
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
               <table class="table table-bordered table-hover userTbl"  id="example2">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Event Category Name</td>
                  <td>Description</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @if($result != FALSE)
				  @php $i=1; @endphp
                  @foreach($result as $list )
                   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->categoryName; ?></td>
                  <td><?php echo $list->categoryDescription; ?></td>
                  <td colspan="3"><a href="<?php echo url("editEventCategory/$list->id")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a href="#" id="<?php if(!empty($list->id))echo $list->id; ?>" class="btn btn-danger deleteEventCat"><i class="fa fa-trash" aria-hidden="true"></i>
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
@endsection 