@if (Session::has('userName'))
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
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
              @if (isset($forgetPassword))
                <div>
                  @if (isset($userErrorMsg))
                    <p>{{$userErrorMsg}}</p>
                  @endif
                  <form method="post" action="{{route('forgetPassword_checkEmail')}}">
                    {{ csrf_field() }}
                    <input type="email" placeholder="Please Enter Your Email" name ="forgetPassword_Email" required/>
                    <button type="submit" class="myButton" style="width:100%;">Next</button>
                  </form>
                </div>
              @elseif (isset($forgetPassword_securityQuestion))
                <form method="post" action="{{route('forgetPassword_checkSecurityQuestions',$userEmail)}}">
                  {{ csrf_field() }}
                  <p style="color:white;"><b>{{$userQuestion1}}</b></p>
                  @if (isset($question1Error))
                    <p style="text-align: left; color: red; font-size: 15px;">{{$question1Error}}</p>
                  @endif
                  <input type="text" placeholder="Please Enter Your Answer" name ="forgetPassword_Answer1" required/>
                  <p style="color:white;"><b>{{$userQuestion2}}</b></p>
                  @if (isset($question2Error))
                    <p style="text-align: left; color: red; font-size: 15px;">{{$question2Error}}</p>
                  @endif
                  <input type="text" placeholder="Please Enter Your Answer" name ="forgetPassword_Answer2" required/>
                  <button type="submit" class="myButton" style="width:100%;">Next</button>
                </form>
              @elseif (isset($forgetPassword_setPassword))
                 <h1>Set Password</h1>
                 <form method="post" action="{{route('forgetPassword_setPassword',$userEmail)}}">
                   {{ csrf_field() }}
                   <label><b>New Password</b></label>
                   <input type="password" name="passWord" required="required" />
                   <label><b>Repeat Password</b></label>
                   <p id='passwordMatch' hidden="true" style='color: red;text-align: left; font-size: 15px;'></p>
                   <input type="password" name="rep-passWord" required="required" />
                   <button type="submit" id="doneButton" class="btn btn-primary btn-block btn-large finishButton">Done</button>
                 </form>
              @else
                <div class="login">
              	   <h1>Login</h1>
                   @if (isset($loginError))
                    <p style="text-align: left; color: red; font-size: 15px;">{{$loginError}}</p>
                   @endif
                    <form method="post" action="{{route('loginPost')}}">
                      {{ csrf_field() }}
                    	 <input type="email" name="userEmail" placeholder="Email" required="required" />
                        <input type="password" name="passWord" placeholder="Password" required="required" />
                        <button type="submit" class="btn btn-primary btn-block btn-large">login</button>

                    </form>
                    <a href="{{route('forgetPassword')}}" id ="forgotP">Forgot Password <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>
                </div>
              @endif

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
