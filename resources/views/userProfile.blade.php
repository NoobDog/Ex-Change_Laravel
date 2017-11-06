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
            @if (isset($changePassword) && $changePassword)
                <form method="post" action="{{route('setNewPassword')}}">
                    {{ csrf_field() }}
                    <label><b>New Password</b></label>
                    <input type="password" name="passWord" required="required" />
                    <label><b>Repeat Password</b></label>
                    <p id='passwordMatch' hidden="true" style='color: red;text-align: left; font-size: 15px;'></p>
                    <input type="password" name="rep-passWord" required="required" />
                    <button type="submit" id="doneButton" class="btn btn-primary btn-block btn-large finishButton">Done</button>
                </form>
            @else
                @if (!$user['userIcon'])
                    <a><img src="{{asset('icons/'.$user['userIcon'].'.jpg')}}" id="userIcon"></a>
                @else 
                    <a><img src="{{asset('icons/'.$user['userIcon'])}}" id="userIcon"></a>
                @endif
                    <br>
                    <small>User Since: {{$user['userSince']}}</small>
                    <hr>
                    <table id="userInfoTable">
                        <tr>
                            <th><label><b>Password:</b></label></th>
                            <td><a href="{{route('changePassword')}}" ><button>Change Password</button></a></td>
                        </tr>
                        
                        <form>
                            <tr>
                                <th><label><b>User Name:</b></label></th>
                                <td><input type="text" value="{{$user['userName']}}" name="userName"/></td>
                            </tr>
                            <tr>
                                <th><label><b>User Email:</b></label></th>
                                <td><input type="email" value="{{$user['userEmail']}}" name="userEmail"/></td>
                            </tr>
                            <tr>
                                <th><label><b>User BOD:</b></label></th>
                                <td><input type="date" value="{{$user['userBOD']}}" name="userBOD"/></td>
                            </tr>
                            <tr>
                                <th><label><b>Gender:</b></label></th>
                                <td><input type="text" value="{{$user['userGender']}}" name="userGender"/></td>
                            </tr>
                        </form>
                    </table>
            @endif
           <!-- {{print_r($user)}} -->

            </div>
        </div>
    </body>
</html>
@endif
<script>
$('input[name="rep-passWord"]').off("input").on("input", function() {
  var repeatValue = $(this).val();
  var passwordValue = $('input[name="passWord"]').val();
  if(passwordValue != repeatValue) {
      $('#passwordMatch').html('* Password does not match.');
      $('#passwordMatch').show();
      $('#doneButton').attr("disabled", true);
  }
  else {
    $('#passwordMatch').hide();
    $('#doneButton').attr("disabled", false);
  }
});
</script>

