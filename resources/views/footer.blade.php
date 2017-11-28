<link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
<div class="chatBar">
  <ul class="nb">
    <li style="float:right;" class="dropdown">
        <a href="{{url('/login')}}"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
        <div class="dropdown-content">
            <a href="{{url('/userProfile')}}"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
            <!-- <a href="{{url('/general')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> General</a> -->
            <a href="{{url('/addressSetting')}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
            <a href="{{url('/privacySetting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Privacy Settings</a>
        </div>
    </li>

  </ul>
</div>