<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
<div class="logo">
  <img src="{{asset('img/ex-change_logo.jpg')}}" height="66px" width="100%">
</div>
@if (Session::has('userName') && Session::get('roleTypeID') == 1)
<div class="navBar">
  <ul class="nb">
    <li class="nbDropdown">
      <a href="{{url('/')}}" class="dropbtn @if($page_name_active=='home')active @endif">Welcome : {{Session::get('userName')}}</a>
      <div class="nbDropdown-content">
        <a href="{{url('/userProfile')}}"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
        <!-- <a href="{{url('/general')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> General</a> -->
        <a href="{{url('/addressSetting')}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
        <a href="{{url('/privacySetting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Privacy Settings</a>
      </div>
    </li>
    <li class="nbDropdown">
      <a href="javascript:void(0)" class="dropbtn @if($page_name_active=='myEx-change') active @endif">My Ex-change</a>
      <div class="nbDropdown-content">
        <a href="{{url('/myBooks')}}"><i class="fa fa-book" aria-hidden="true"></i> My Books</a>
        <a href="{{url('/myBanks')}}"><i class="fa fa-university" aria-hidden="true"></i> My Bank Information</a>
        <a href="#"><i class="fa fa-trademark" aria-hidden="true"></i> My Trade Information</a>
        <a href="#"><i class="fa fa-tint" aria-hidden="true"></i>  My Points</a>
      </div>
    </li>
    <li><a class="@if($page_name_active=='help')active @endif" href="{{url('/help')}}">Help</a></li>
    <li><a href="{{route('logout')}}">Logout</a></li>

    <!-- <li class="nbDropdown"  style="float:right;">
      <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a>
      <div class="nbCart-content">
        <p>hahaha</p>
      </div>
    </li> -->
    <li style="float:right;"><a href="{{url('/shoppingCart')}}" class="@if($page_name_active=='cart')active @endif"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
  </ul>
</div>
@elseif (Session::has('userName') && Session::get('roleTypeID') == 2)
<div class="navBar">
  <ul class="nb">
    <li class="nbDropdown">
      <a href="{{url('/')}}" class="dropbtn @if($page_name_active=='home')active @endif">Welcome : {{Session::get('userName')}}</a>
      <div class="nbDropdown-content">
        <a href="{{url('/userProfile')}}"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
        <!-- <a href="{{url('/general')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> General</a> -->
        <a href="{{url('/addressSetting')}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
        <a href="{{url('/privacySetting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Privacy Settings</a>
      </div>
    </li>
    <li><a class="@if($page_name_active=='users')active @endif" href="{{url('/users')}}">Users</a></li>
    <li><a class="@if($page_name_active=='help')active @endif" href="{{url('/help')}}">Help</a></li>
    <li><a href="{{route('logout')}}">Logout</a></li>
  </ul>
</div>
@else
<div class="navBar">
  <ul class="nb">
    <li><a class="@if($page_name_active=='home')active @endif" href="{{url('/')}}">Home</a></li>
    <li><a class="@if($page_name_active=='login')active @endif" href="{{url('/login')}}">Login</a></li>
    <li><a class="@if($page_name_active=='newAccount')active @endif" href="{{url('/newAccount')}}">Create New Account</a></li>
    <li><a class="@if($page_name_active=='help')active @endif" href="{{url('/help')}}">Help</a></li>
    <li style="float:right;"><a href="{{url('/login')}}"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
  </ul>
</div>
@endif
