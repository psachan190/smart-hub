@extends("layout")
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li><a href="<?php //echo url($backurl); ?>"><?php //if(!empty($shopName))echo str_replace("_"," ",$shopName);; ?></a></li>
                        </ul>
                        <h1 class="page-title">Message</h1>
                    </div>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    <section class="contact-area normal-padding">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-7 padding_div">
                            <div class="contact_form cardify">
                                <div class="withdraw_table_header">
                                    <h3>Leave Your Message</h3>
                                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact_form--wrapper">
                                            <form action='{{ url("action/complainAction") }}' enctype="multipart/form-data" method="post">
                                             <?php echo csrf_field(); ?>
                                            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php if(!empty($shop_details->id))echo $shop_details->id; ?>" readonly="readonly">
                                            <input type="hidden" name="sender_id" id="sender_id" value="<?php if(!empty(session()->get('knpuser')))echo session()->get('knpuser'); ?>" readonly="readonly">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                         <label style="color:#F00;"><?php if ($errors->has('complainSubject')){ echo"Subject fields is required..."; } ?></label>
                                                           <select name="complainSubject" id="complainSubject" class="form-control">
                                                              <option value="0">--Select--Complain--Subject--Type--</option>
                                                              @if($subjectList != FALSE)
                                                               @foreach($subjectList as $list)
                                                                <option value="{{ $list->id }}">{{ $list->subject }}</option>
                                                               @endforeach
                                                              @else
                                                              <option>--No--Subject--Available--</option>
                                                              @endif
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                          <input type="file" name="image" id="image" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                          <input type="text" name="complain_title" id="complain_title" class="form-control" placeholder="Complain Title" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                       <label  style="color:#F00;"><?php if ($errors->has('description')){ echo"Description fields is required..."; } ?></label>
                                                          <textarea name="description" id="description" cols="30" rows="10" placeholder="Complain Description">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sub_btn">
                                                    <button type="submit" class="btn btn--round btn--default">Send Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div><!-- end /.row -->
                            </div><!-- end /.contact_form -->
                        </div>
                <div class="col-md-5 padding_div">
                    <div class="">
                        <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Complain History</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Complain Subject</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($complainList != FALSE)
                                         @foreach($complainList as $listArr)
                                            @php
                                              $complainID = base64_encode($listArr->id);
                                             @endphp
                                           <tr>
                                            <td><?php if(!empty($listArr->created_at))echo  date("d/M/y h:i:A",$listArr->created_at); ?></td>
                                            <td class="bold">@if(!empty($listArr->subject)) {{ $listArr->subject }} @endif</td>
                                            <td class="bold">@if(!empty($listArr->complain_title)) {{ $listArr->complain_title }} @endif</td>
                                            <td class="pending"><a href='{{ url("read_complain/$complainID") }}' class="btn btn--icon btn-default btn--round btn-secondary">View/Details</a></td>
                                        </tr>
                                         @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                   <center> 
                                    @if($complainList != FALSE)
                                    {{ $complainList->render() }}
                                    @endif
                                   </center> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@stop