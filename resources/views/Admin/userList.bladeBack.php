<?php
//echo"<pre>";
//print_r($questionList);exit;
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
      	 <div class="col-sm-12">
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
                  <td>Name</td>
                  <td>Email</td>
                  <td>Password</td>
                  <td>Pin Code</td>
                  <td>Mobile</td>
                  <td>Join Date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach( $users as $data ): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data->name; ?></td>
                  <td><?php echo $data->email; ?></td>
                  <td><?php echo $data->password; ?></td>
                  <td><?php echo $data->pincode; ?></td>
                  <td><?php echo $data->mobileNumber; ?></td>
                  <td><?php echo date("d-M-Y h:ia",$data->created_at); ?></td>
                  <td colspan="3"><a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;</td>
                </tr>
                <?php $i++; endforeach; ?>
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