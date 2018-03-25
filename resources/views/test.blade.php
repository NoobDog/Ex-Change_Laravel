<html>
<head>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<div class="logo">
  <img src="{{asset('img/ex-change_logo.jpg')}}" height="66px" width="100%">
  <div class="imgTxt">Ex-Change</div>
</div>
<div class="nav navbar navbar-dark bg-dark">
  <ul>
    <li>
      <a class="btn btn-secondary dropdown-toggle">Welcome</a>
      <div class="dropdown">
        <a class="dropdown-item"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
        <!-- <a href="{{url('/general')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> General</a> -->
        <a class="dropdown-item"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
        <!-- <a href="{{url('/privacySetting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Privacy Settings</a> -->
      </div>
    </li>
    <li>
      <a class="btn btn-secondary dropdown-toggle">My Ex-change</a>
      <div class="dropdown">
        <a class="dropdown-item"><i class="fa fa-book" aria-hidden="true"></i> My Books</a>
        <a class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> My Bank Information</a>
        <a class="dropdown-item"><i class="fa fa-trademark" aria-hidden="true"></i> My Trade Information</a>
        <!-- <a href="#"><i class="fa fa-tint" aria-hidden="true"></i>  My Points</a> -->
      </div>
    </li>
    <li><a>Help</a></li>
    <li><a>Logout</a></li>
    <li><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
  </ul>
</div>
</html>