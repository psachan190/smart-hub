<div class="gal-container nopadding">
    <div class="col-md-12 col-sm-12 co-xs-12">
        <div class="boximg formseller">
            <div class="modal modalngo fade" id="drop3rating" tabindex="-1" role="dialog">
                <div class="modal-dialog mobilengo" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="modal-body pupopzoom">
                            <div class="boxed-body signin-area">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="widgetngo__heading">
                                            <h4 id="blogwidget" class="widgetngo__title">Review & <span class="base-color"> Rating</span></h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <form>
                                            <div class="form-group">
                                                <div class="col-sm-12 padding_div">
                                                    <textarea name="rating" id="comment" cols="2" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 padding_div">
                                                    <input id="ratingBox" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1">
                                                </div>
                                                <div class="col-sm-4 padding_div">
                                                    <button class="btn btn--icon btn-md btn--round btn-secondary btnratingright" type="button" name="ratingBtn" id="ratingBtn">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="rating_response"></div>
                                    </div>
                                    <div class="col-sm-5">
                                        <h4>Rating breakdown</h4>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">5 <i class="lnr lnr-star"></i></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">1</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">4 <i class="lnr lnr-star"></i></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">1</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">3 <i class="lnr lnr-star"></i></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">2 <i class="lnr lnr-star"></i></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">1 <i class="lnr lnr-star"></i></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                                        <span class="sr-only">80% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <hr/>
                                        <div class="review-block" id="review_block">
                                           @if($rating_result != FALSE) 
                                            @foreach($rating_result as $row)
                                             <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="{{ asset('cdn/images/icon/male.png') }}" class="img-rounded">
                                                    <div class="review-block-name"><a href="#">@if(!empty($row->name)){{ $row->name }}@endif  @if(!empty($row->name)){{ $row->lname }}@endif</a></div>
                                                    <div class="review-block-date">@if(!empty($row->crDate)){{ date('d-M-Y', $row->crDate) }}@endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="review-block-rate">
                                                        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="@if($row->rating){{  $row->rating }}@endif">
                                                    </div>
                                                    <div class="review-block-title">@if(!empty($row->crDate)){{  $row->rating_comment }}@endif</div>
                                                </div>
                                            </div>
                                             <hr/>
                                            @endforeach 
                                           @endif 
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>