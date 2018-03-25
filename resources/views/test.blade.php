<html>
<head>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<div class="logo">
  <img src="{{asset('img/ex-change_logo.jpg')}}" height="66px" width="100%">
</div>
<div> 
  <ul class="nav nav-tabs navbar-dark bg-dark">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Welcome</a>
      <div class="dropdown-menu">
        <a><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
        <a><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
        
      </div>
    </li>
    <li>
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Ex-change</a>
      <div class="dropdown-menu">
        <a class="dropdown-item"><i class="fa fa-book" aria-hidden="true"></i> My Books</a>
        <a class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> My Bank Information</a>
        <a class="dropdown-item"><i class="fa fa-trademark" aria-hidden="true"></i> My Trade Information</a>
        <!-- <a href="#"><i class="fa fa-tint" aria-hidden="true"></i>  My Points</a> -->
      </div>
    </li>
    <li class="nav-item"><a>Help</a></li>
    <li class="nav-item"><a>Logout</a></li>
    <li class="nav-item"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
  </ul>
</div>
</html>