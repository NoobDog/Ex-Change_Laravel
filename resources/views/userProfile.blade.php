@if (!Session::has('userName'))
<p>You do not have the permission to access this page!</p>
@else

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/userProfile.css')}}">
    </head>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
            <!-- User Profile -->
            @if (!$user['userIcon'])
                <a><img src="{{asset('icons/'.$user['userIcon'].'.jpg')}}" id="userIcon"></a>
            @else 
                <a><img src="{{asset('icons/'.$user['userIcon'])}}" id="userIcon"></a>
            @endif
                <br>
                <small>User Since: {{$user['userSince']}}</small>
                <hr>
                <label><b>Password:</b></label> <a><button>Change Password</button></a><br>
                <form>
                    <label><b>User Name:</b></label> <input type="text" value="{{$user['userName']}}"/><br>
                    <label><b>User Email:</b></label> <input type="text" value="{{$user['userEmail']}}"/><br>
                    <label><b>User BOD:</b></label> <input type="text" value="{{$user['userBOD']}}"/><br>
                    <label><b>Gender:</b></label> <input type="text" value="{{$user['userGender']}}"/><br>
                </form>
                

           <!-- {{print_r($user)}} -->

            </div>
        </div>
    </body>
</html>
@endif
