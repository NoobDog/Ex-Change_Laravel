<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}
li a:hover, .active {
    background-color: red;
}
li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.navBar{
  margin-bottom: 50px;

}
</style>
<div class="logo">
  <img src="{{asset('img/ex-change_logo.jpg')}}" height="66px" width="100%">
</div>
@if (Session::has('userName'))
<div class="navBar">
  <ul>
    <li class="dropdown">
      <a href="{{url('/')}}" class="dropbtn @if($page_name_active=='home')active @endif">Welcome : {{Session::get('userName')}}</a>
      <div class="dropdown-content">
        <a href="#">User Profile</a>
        <a href="#">General</a>
        <a href="#">Privacy Settings</a>
        <a href="#">Address Settings</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn @if($page_name_active=='myEx-change')active @endif">My Ex-change</a>
      <div class="dropdown-content">
        <a href="#">My Books</a>
        <a href="#">My Bank Information</a>
        <a href="#">My Trade Information</a>
        <a href="#">My Points</a>
      </div>
    </li>
    <li><a class="@if($page_name_active=='help')active @endif" href="{{url('/help')}}">Help</a></li>
    <li><a href="{{route('logout')}}">Logout</a></li>
  </ul>
</div>
@else
<div class="navBar">
  <ul>
    <li><a class="@if($page_name_active=='home')active @endif" href="{{url('/')}}">Home</a></li>
    <li><a class="@if($page_name_active=='login')active @endif" href="{{url('/login')}}">Login</a></li>
    <li><a class="@if($page_name_active=='newAccount')active @endif" href="{{url('/newAccount')}}">Create New Account</a></li>
    <li><a class="@if($page_name_active=='help')active @endif" href="{{url('/help')}}">Help</a></li>
  </ul>
</div>
@endif
