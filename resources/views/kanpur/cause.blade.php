@extends("layout")
@section('content')
    <div class="job_hero_area event_detail_breadcrumb bgimage">
        <div class="bg_image_holder">
            <img src="{{asset('storage/'.$cause->image)}}" class="img-responsive" alt="{{$cause->title}}">
        </div>
        <div class="container  content_above">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="job_hero_content">
                        <div class="job_date">
                            <!--p><span class="lnr lnr-calendar-full"></span> Kanpur, India</p -->
                        </div>
                    </div><!-- end /.job_hero_content -->
                    <a href="#" class="btn btn--round btn--lg">Donate</a>
                </div>
            </div>
        </div>
        <div class="social social--color--filled content_above">
            <p>Share on:</p>
            <ul>
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u={{url('cause/'.$cause->url)}}"><span class="fa fa-facebook"></span></a></li>
                <li><a href="https://web.whatsapp.com/send?text={{url('cause/'.$cause->url)}}"><span class="fa fa-whatsapp fa-lg fb"></span></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url={{url('cause/'.$cause->url)}}"><span class="fa fa-google-plus"></span></a></li>
            </ul>
        </div>
    </div>
    <section class="event_details section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="event_module"  style="text-align:justify;">
                        <h4 class="event_module__title">{{$cause->title}} </h4>
                        <?php echo $cause->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
