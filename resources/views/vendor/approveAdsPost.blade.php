@extends("layout")
@section('content')
  @include('vendor.template.marketPlacenavigation')
   <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li class="active"><a href="#">Approve Post</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Approve Post</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="widget-sidebar" id="sidebarRef">
        <h2 class="title-widget-sidebar">Approve POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              @if($vAdsPostList != FALSE)
				   @foreach($vAdsPostList as $list)
					  @php
                       $image = $list->image;
					   $editID = base64_encode($list->id); 
					  @endphp
					  <li class="recent-post">
                        <a href='{{ url("vendor/$vendorData->username/approveAdsPost/$editID") }}'>
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
    @if($resultAdsData != FALSE) 
     <div class="post">
        <div class="content">
         	    <h2 class="headingMain">View Advertisement Details</h2>
                 <hr />
                  <div id="showAdsImg">
                     <p>Banner Image</p>
                     <img id="img-upload1" src="<?php if(!empty($resultAdsData->image)) $image = $resultAdsData->image; else $image=""; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive" />
                  </div>
                  <div style="margin-top:10px;">
                     <p><strong>Start Date :</strong>  <span>@if(!empty($resultAdsData->startDate)) {{ date('d-M-Y h:i:s' , $resultAdsData->startDate) }} @endif</span></p>
                  </div>
                  <div style="margin-top:10px;">
                     <p><strong>End Date :</strong>  <span>@if(!empty($resultAdsData->endDate)) {{ date('d-M-Y h:i:s' , $resultAdsData->endDate) }} @endif</span></p>
                  </div>
                    @if(!empty($resultAdsData->applyFilteration))
                  <div style="margin-top:10px;">
                     <p><strong>Age :</strong>  <span>@if(!empty($resultAdsData->ageFrom)) {{ $resultAdsData->ageFrom }} @endif </span> <span> @if(!empty($resultAdsData->ageTo)) {{  " , ".$resultAdsData->ageTo }} @endif </span></p>
                  </div>
                  <div style="margin-top:10px;">
                    @php 
                     $genderArr = [ 1 => "Male" , 2=>"Female" , 3=>"Both"];
                    @endphp
                    <p><strong>Gender :</strong>  <span>@if(!empty($resultAdsData->gender)) {{ $genderArr[$resultAdsData->gender] }} @endif </span></p>
                  </div>
                  <div style="margin-top:10px;">
                   <p><strong>Apply Professional :</strong>  <span>@if(!empty($resultAdsData->student)) {{ "Student" }} @endif</span> <span>@if(!empty($resultAdsData->business)) {{ " , "."Business" }} @endif</span> <span>@if(!empty($resultAdsData->salaried)) {{ " , "."Salaried" }} @endif</span> <span>@if(!empty($resultAdsData->housewife)) {{ " , "."House-Wife" }} @endif</span> <span>@if(!empty($resultAdsData->looking_opportunity)) {{ " , "."Looking Opportunity" }} @endif</span></p>
                  </div>
                    @endif
                  <div style="margin-top:10px;">
                     <p><strong>Description :</strong>  <span><?php if(!empty($resultAdsData->description)) echo $resultAdsData->description; ?></span></p>
                  </div>
                  <div style="margin-top:10px;">
                     @php $timeDate = strtotime($resultAdsData->created_at) @endphp 
                     <p><strong>Created Date :</strong>  <span>@if(!empty($resultAdsData->created_at)) {{ date('d-M-Y H:i:s' , $timeDate) }} @endif</span></p>
                  </div> 
        </div>
     </div>
    @endif 
  </div>
 </div>
</div>
@stop
@section('footer')
  @parent
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>        
@endsection 