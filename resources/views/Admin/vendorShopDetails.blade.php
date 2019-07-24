<?php
//echo "<pre>";
//print_r($vendorList);exit;
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
               <table class="table table-bordered table-responsive" id="userTbl">
                <thead>
                <tr class="danger">
                  <th>Sn.</th>
                  <th>Vendor ID</th>
                  <th>Shop Name</th>
                  <th>uName</th>
                  <th>bType</th>
                  <th>Sale Category</th>
                  <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
                if($vendorList != FALSE){
				     	?>
						<?php $i=1; foreach($vendorList as $data): ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo "knprVendot100".$data->id; ?></td>
                          <td><?php echo $data->vName; ?></td>
                          <td><?php echo $data->name; ?></td>
                          <td><?php print_r($bTypearr[$data->businesscategoryType]); ?></td>
                          <td><?php $resultShop = $obj->getShoplist($data->categoryType); 
			             if($resultShop != FALSE){
			                $i=1;
					   foreach($resultShop as $shop){
						   $shopCat[$i] = $shop->cname;
						  $i++;
						 }
					   $shopsCategory =  implode(",",$shopCat);
					  print_r($shopsCategory);
			            }      
							?></td>
                          <td colspan="3"><a href="<?php $id = base64_encode($data->id); echo url("viewVendorShops/$id"); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
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