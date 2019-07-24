<?php
$arr = array(1=>"Male",2=>"Female",3=>"Both")
?>
@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
<style>
.widget-sidebar { background-color: #fff; }
.title-widget-sidebar { font-size: 14pt; border-bottom: 2px solid #e5ebef; margin-bottom:15px; padding-bottom:10px;margin-top: 0px; }
.title-widget-sidebar:after {
    border-bottom: 2px solid #f1c40f;
    width: 150px;
    display: block;
    position: absolute;
    content: '';
    padding-bottom: 10px;
}

.recent-post{width: 100%;height: 80px;list-style-type: none;}
.post-img img {
    width: 100px;
    height: 70px;
    float: left;
    margin-right: 15px;
    border: 5px solid #16A085;
    transition: 0.5s;
}

.recent-post a {text-decoration: none;color:#34495E;transition: 0.5s;}
.post-img, .recent-post a:hover{color:#F39C12;}
.post-img img:hover{border: 5px solid #F39C12;}
.right-inner-addon {
    position: relative;
}
.left-inner-addon i, .form-group .left-inner-addon i{display: inline-block;
position:absolute;z-index:3;text-indent: -15px;bottom: -8px;font-size: 1.3em;}
.left-inner-addon { position: relative;}
.left-inner-addon input { padding-left: 30px;}
.left-inner-addon i {position: absolute;padding: 10px 20px; pointer-events: none;}
     </style>
     
      <div class="widget-sidebar" id="refSidebar">
        <h2 class="title-widget-sidebar">RECENT POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              @if($vAdsPostList != FALSE)
				   @foreach($vAdsPostList as $list)
					  @php
                       $image = $list->image;
					   $editID = base64_encode($list->id); 
					  @endphp
					  <li class="recent-post">
                        <a href='{{ url("viewApprovePostDetails/$editID") }}'>
                        <div class="post-img">
                        <img src='{{ url("uploadFiles/vthumbsAdspost/$image") }}' class="img-responsive" alt="<?php if(!empty($$list->description))echo $list->description; ?>">
                        </div>
                        <h5><small><?php if(strlen($list->description) < 25){ echo $list->description; }else{ echo substr($list->description,0,70)."..."; } ?></small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title=""></i>&nbsp;
					  {{ date('d-M-Y H:i:s A',strtotime($list->created_at)) }}</small></p>
                       </a>
                     </li>
                       <hr>
				   @endforeach
			  @else
				<li class="recent-post">
                <div class="post-img">
                  No Ads Post Available
                 </div>
                </li>
                <hr>
           	  @endif
            </ul>
           </div>
         <p><center>
        @if($vAdsPostList != FALSE)
        {{ $vAdsPostList->render() }}
        @endif
        </center></p>   
         </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
		    <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
          <h2 class="headingMain">View Advertisement Details<strong><small>(Post Date :- @php $timestamp = strtotime($resultAdsData->created_at); $dateTime = date('d-M-Y , h:i:s a', $timestamp); @endphp {{ $dateTime }} )</small></strong></h2>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <div id="showAdsImg">
             <img id="img-upload1" src="<?php $image = $resultAdsData->image; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive" />
          </div> 
          <div>
           <p><strong>Start Date :</strong> <span><?php if(!empty($resultAdsData->startDate))echo $resultAdsData->startDate;  ?></span></p>
           <p><strong>End Date :</strong> <span><?php if(!empty($resultAdsData->endDate))echo $resultAdsData->endDate;  ?></span></p>
           <div style="">
             <?php 
			 if(!empty($resultAdsData->description)){
				 ?>
				  <p><strong>Description :</strong></p>
                  <p class=""><?php echo $resultAdsData->description;   ?></p>
				 <?php
			  }
			 ?>
           </div>
           <div style="">
             <?php 
			 if($resultAdsData->applyFilteration=="yes"){
				?>
				 <p><strong>Apply Filteration :</strong></p>
                 <?php
                   if(!empty($resultAdsData->applyFilteration)){
					   ?>
					    <p class=""><strong>Gender :</strong></p>
                        <p class=""><?php echo $arr[$resultAdsData->gender]; ?></p>
					   <?php
					 }
				 ?>
                 <?php
                   if(!empty($resultAdsData->ageFrom)){
					   ?>
					    <p class=""><strong>Age Difference :</strong></p>
                        <p class="">From : <?php echo $resultAdsData->gender; ?></p>
                        <p class="">To : <?php echo $resultAdsData->ageTo; ?></p>
					   <?php
					 }
				 ?>
                  <?php
                   if($filtarationAdsData != FALSE){
					   ?>
					    <p class=""><strong>Profession :</strong></p>
					   <?php
					   $i=1;
					   foreach($filtarationAdsData as $dataArr){
						     ?>
							  <p class=""><?php echo $i." : "; ?>&nbsp;&nbsp;<?php echo $dataArr->profession; ?></p>
							 <?php
						   $i++;
						  }
					 }
				 ?>
				<?php
			  }
			 ?>
           </div>
          </div>
        </div>
     </div>
  </div>
 </div>
</div>
@endsection 