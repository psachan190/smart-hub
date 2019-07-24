<?php
$bTypearr = array("1"=>"Goods","2"=>"Services","3"=>"Goods & Services Both");
?>
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
      	 <div class="row">
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>
         <div class="col-sm-12">
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered table-responsive userTbl" id="">
                <thead>
                <tr class="danger">
                  <td>Shop ID</td>
                  <td>Shop Name</td>
                  <td>uName</td>
                  <td>uEmail</td>
                  <td>bType</td>
                  <td>Sale Category</td>
                  <th>Mobile</th>
                  <td>Join Date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
              <?php
                if(!empty($vendorList)){
				     	?>
						<?php $i=1; foreach($vendorList as $data): ?>
                        <tr>
                          <td><?php if(!empty($data->id))echo "knprVendot100".$data->id; ?></td>
                          <td><?php if(!empty($data->vName))echo $data->vName; ?></td>
                          <td><?php if(!empty($data->name))echo $data->name; ?></td>
                          <td><?php if(!empty($data->email))echo $data->email; ?></td>
                          <td><?php if(!empty($data->businesscategoryType))print_r($bTypearr[$data->businesscategoryType]); ?></td>
                          <td><?php 
						   if(!empty($data->categoryType)){
						   $resultShop = $obj->getShoplist($data->categoryType); 
						  if($resultShop != FALSE){
						      $cate  =[];
						      $n = 1;
						     foreach($resultShop as $listArr){
							 $cate[$n] = $listArr->cname;
							   $n++;
							}
						    print_r(implode(" , " , $cate));
						    //print_r($cate); 
							  }
			                      
						   }
							?></td>
                          
                            <td><?php if(!empty($data->vMobile))echo $data->vMobile; ?></td>
                          <td><?php if(!empty($data->crvDate))echo date("d-M-y h:s:a",$data->crvDate); ?></td>
                          <td colspan="3"><a href="<?php $id = base64_encode($data->id); echo url("viewVendorDetails/$id"); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>&nbsp;</td>
                </tr>
                       <?php $i++; endforeach; ?>
                       <?php
				  }
				else{
				  ?>
				  <tr>
                  <td colspan="6">No Record Founds...</td>
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