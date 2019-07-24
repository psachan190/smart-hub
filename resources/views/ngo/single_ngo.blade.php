@extends('layout')

@section('title', $title)
@section('content')
<section class="event_area evetsection">
   <div class="row">
      <div class="col-sm-12">
      	@if (file_exists('storage/'.$ngo->image))
      	<img src="{{ asset('storage/'.$ngo->image) }}" style="width:100%;" class="ngo_backgroung img-responsive" />
      	@else
         <img src="{{ asset('cdn/images/ngo/ngoback.jpg') }}" height="200" class="img-responsive" />
         @endif
      </div>
   </div>
</section>
<section class=" normal-padding1 breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-title">{{$ngo->ngo_name}}</h1>
                </div>
                <div class="col-md-6">
                <ul class="navtab">
                     <li><a href="{{ url('ngo/'.$ngo->user_name.'/home') }}">Home </a> </li>
                     <li><a href="{{ url('ngo/'.$ngo->user_name.'/gallery') }}">Gallery </a> </li>
                     <li><a href="{{ url('ngo/'.$ngo->user_name.'/events') }}">Event </a> </li>
                     <li><a href="{{ url('ngo/'.$ngo->user_name.'/causes') }}">Causes</a> </li>
                      <li><a href="#">Donate</a> </li>
                    <!-- <li><a href="{{ url('ngo/'.$ngo->user_name.'/donate') }}">Donate</a> </li>  -->
                     <?php if (session()->get('knpuser') && $ngo->user == $user->id) { ?> 
                     	<li><a href="{{ url('ngo/'.$ngo->user_name.'/edit') }}">Edit</a> </li>
                    <?php } ?>
                  </ul>
                </div>
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<section class="bg_section normal-padding">
   <div class="container-fluid">
      <div class="row">
      		 <div class="col-md-1"></div>
            <div class="col-md-7">
               <div class="widgetngo__heading">
                  <h4 class="widgetngo__title">Some facts about <span class="base-color">{{$ngo->ngo_name}}</span>
               		<?php if (session()->get('knpuser') && $ngo->user == $user->id) { ?> 
                  		&nbsp;&nbsp;&nbsp;<a href="{{url('ngo/kanpurize/edit')}}"><i class="fa fa-edit"> </i><strong> Edit </strong></a>
                  	<?php } ?>
                  </h4>
               </div>
               <div align="justify"><?php echo $ngo->about_us; ?></div>
            </div>
            <div class="col-md-3">
               <div class="widgetngo">
                  <div class="widgetngo__heading">
                     <h4 class="widgetngo__title">Latest <span class="base-color">Causes</span></h4>
                  </div>
                  <div class="widgetngo__text-content">
                  	@foreach ($causes as $row)
                     	<div class="widgetngo-latest-causes">
                        	<div class="widgetngo-latest-causes__image-wrap">
                           		<a href="#"><img class="widgetngo-latest-causes__thubnail lazy" alt=""  src="{{ asset('public/storage/'.$row->image) }}" style="display: inline;"></a>
                        	</div>
                        	<div class="widgetngo-latest-causes__text-content">
                           		<h4 class="widgetngo-latest-causes__title"><a href="#">{{$row->title}}</a></h4>
                           		<div class="widgetngo-latest-causes__admin small-text">
                              			<i class="base-color fa fa-user widgetngo-latest-causes__admin-icon"></i>by <a href="#"></a>
                           		</div>
                           		<div class="widgetngo-latest-causes__time text-mute">{{date_format(date_create($row->created_at),"d M, Y")}}</div>
                        	</div>
                     	</div>
                     	@endforeach
                  </div>
               </div>
            </div>
            <div class="col-md-1 padding_div"></div>
      </div>
   </div>
</section>
@stop