@if($my_shopList != FALSE)
 @foreach($my_shopList as $list)
    @php $sID = $list->id;
     $first = rand(1,9999);
     $sName = str_replace(" ","_",$list->vName);
     $thumbsImg = $list->imageLogo;
    @endphp
<a href="<?php echo url("vendorBackup/$sID/firstDashborad"); ?>" class="message recent">
    <div class="message__actions_avatar">
        <div class="avatar">
          @if(empty($thumbsImg))
           <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg"); ?>" alt="">
           @else
           <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/$thumbsImg"); ?>" class=" iconDetails1 img-circle" >
          @endif
        </div>
    </div><!-- end /.actions -->
    <div class="message_data">
        <div class="name_time">
            <p><?php if(strlen($list->vName) < 25){ echo $list->vName; }else{ echo substr($list->vName,0,25)."..."; } ?></p>
        </div>
    </div><!-- end /.message_data -->
</a><!-- end /.message -->
@endforeach
@endif 