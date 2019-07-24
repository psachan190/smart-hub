@if($my_matrimonialProfile != FALSE) 
	@foreach($my_matrimonialProfile as $mat_profile)
								                                       @php 
								                                        $tag_name = str_replace(" ","_",$mat_profile->name); 
								                                        $profile_id = $mat_profile->enctype_id;
								                                       @endphp
								                   <a href="{{url('matrimonial/profile'."/".$profile_id."/".$tag_name) }}" class="message recent">
								                                    <div class="message__actions_avatar">
								                                       <div class="avatar">
								                                          <img src="{{ asset('cdn/images/ngo_profile.png') }}" alt="">
								                                       </div>
								                                    </div>
								                                    <div class="message_data">
								                                       <div class="name_time">
								                                          <p>{{ $mat_profile->name }}</p>
								                                       </div>
								                                    </div>
								                                 </a>
								                                  @endforeach
								                                @endif 