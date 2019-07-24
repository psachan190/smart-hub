@extends('layout')

@section('title', $title)
@section('content')
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
            </div>
        </div>
    </section>
<section class="term_condition_area">
   <div class="container">
      <div class="row">
      	@foreach ($causes as $row)
         <div class="col-md-4">
            <div class="card_style1">
               <figure class="card_style1__info card_style1__info1">
                  <div class="cours2" style="overflow:hidden;">
                     <img class="hoverimgevent img-responsive" src=" {{ asset('storage/'.$row->image) }}">
                     <div class="cours4 text-center">
                        <a href="#" class="cou btn btn-md btn--round" >View More</a>
                     </div>
                  </div>
                  <figcaption class="upeventtop">
                     <a href="#">
                        <h3 class="upevent">{{$row->title}}</h3>
                     </a>
                     <p align="justify"><?php echo $row->short_desc; ?></p>
                     <div align="center"><a href="#" class="btn btn--round btn--bordered btn-md">Donate now </a></div>
                  </figcaption>
               </figure>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>

@stop