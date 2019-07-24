<center>
<table style="background-color:#eeeeee; margin-top:100px;" cellpadding="10" cellpadding="10" width="100%">
  <thead>
    <tr style="background-color:#68b6d8;">
      <th style="text-align:center" colspan="4">
        <h2 style="text-align:center;  margin-top:10px; font-size:36px; font-weight:800"><a style="color:#FFF; text-decoration:none;" href="https://kanpurize.com/kanpurize_home" target="_blank">Kanpurize New User Registered .</a></h2>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr style="background-color:#FFF; height:2px;">
      <th>Name</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Status</th>
    </tr>
    @if(count($all_user) >= 0)
     @foreach($all_user as $users)
       <tr style="background-color:#FFF; height:2px;">
          <th>@if(!empty($users->name)){{ ucwords($users->name) }} @endif</th>
          <th>@if(!empty($users->mobileNumber)){{ $users->mobileNumber }} @endif</th>
          <th>@if(!empty($users->email)){{ $users->email }} @endif</th>
          <th>@if(!empty($users->status)){{ $users->status }} @endif</th>
       </tr>
     @endforeach
    @else
     <tr style="background-color:#FFF; height:2px;">
      <th colspan="4">Record Not found</th>
    </tr>
    @endif
    
  </tbody>
</table>
</center>