<html>
<head>
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Styles -->
    <script src="{{ asset('bootstrap/js/Popper.js') }}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!--Font awesome-->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
</head>
<div class="logo">
  <img src="{{asset('img/ex-change_logo.jpg')}}" height="66px" width="100%">
</div>
<div> 
  <ul class="nav nav-tabs navbar-dark bg-dark">
    <li>
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Welcome</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
        <a class="dropdown-item" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Address Settings</a>
      </div>
    </li>
    <li>
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Ex-change</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"><i class="fa fa-book" aria-hidden="true"></i> My Books</a>
        <a class="dropdown-item" href="#"><i class="fa fa-university" aria-hidden="true"></i> My Bank Information</a>
        <a class="dropdown-item" href="#"><i class="fa fa-trademark" aria-hidden="true"></i> My Trade Information</a>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
  </ul>
</div>
</html>