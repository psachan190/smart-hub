
 @foreach($my_ngo as $row)
 <a href="{{url('ngo/'.$row->user_name)}}" class="message recent">
    <div class="message__actions_avatar">
        <div class="avatar">
          <img src='{{  asset("uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg") }} ' alt="">
        </div>
    </div>
    <div class="message_data">
        <div class="name_time">
            <p>{{$row->ngo_name}}</p>
        </div>
    </div>
</a>

@endforeach
