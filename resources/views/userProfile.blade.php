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
        <!-- image picker -->
        <script src="{{asset('js/image-picker.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/image-picker.css')}}">     
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/userProfile.css')}}">

    </head>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
            @if (isset($successMsg)) 
                <p class="message">{{$successMsg}} <span style="float:right;" id="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span></P>
            @endif
            <!-- User Profile -->
            @if (isset($changePassword) && $changePassword == 'true')
                <table id="changePasswordTable">
                <form method="post" action="{{route('setNewPassword')}}">
                    {{ csrf_field() }}
                    <tr>
                        <td><label><b>New Password</b></label></td>
                        <td><input type="password" name="passWord" required="required" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p id='passwordMatch' hidden="true" style='color: red;text-align: left; font-size: 15px;'></p></td>
                    </tr>
                    <tr>
                        <td><label><b>Repeat Password</b></label></td>
                        <td><input type="password" name="rep-passWord" required="required" /><br></td>
                    </tr>

                    <tr>
                        <td colspan="2"> <button type="submit" id="doneButton" class="btn btn-primary btn-block btn-large myButton">Done</button></td>
                    </tr>
                   
                </form>
                </table>
            @elseif (isset($isPicked) && $isPicked)
            <select class="image-picker show-html">
                @foreach($imgs as $key => $val)
                <option data-img-src="{{asset('icons/'.$val)}}"  data-img-alt="{{$key}}" value="{{$val}}">  {{$key}}  </option>
                @endforeach
            </select>
            @else
                @if (!$user['userIcon'])
                    <a href="{{route('pickImg')}}"><img src="{{asset('icons/'.$user['userIcon'].'.jpg')}}" id="userIcon"></a>
                @else 
                    <a href="{{route('pickImg')}}"><img src="{{asset('icons/'.$user['userIcon'])}}" id="userIcon"></a>
                @endif
                    <br>
                    <small>User Since: {{$user['userSince']}}</small>
                    <hr>
                    <table id="userInfoTable">
                        <tr>
                            <th><label><b>Password:</b></label></th>
                            <td><a href="{{route('changePassword')}}" ><button class="passwordChangeBtn">Change Password</button></a></td>
                        </tr>
                        
                        <form action="{{route('updateUserProFile')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>
                                <th><label><b>User Name:</b></label></th>
                                <td><input type="text" value="{{$user['userName']}}" name="userName" required="required"/></td>
                            </tr>
                            <tr>
                                <th><label><b>User Email:</b></label></th>
                                <td><input type="email" value="{{$user['userEmail']}}" name="userEmail" required="required"/></td>
                            </tr>
                            <tr>
                                <th><label><b>User BOD:</b></label></th>
                                <td><input type="date" value="{{$user['userBOD']}}" name="userBOD" required="required"/></td>
                            </tr>
                            <tr>
                                <th><label><b>Gender:</b></label></th>
                                <td>
                                    <select name="userGender" class = "select-style">
                                        <option value = "" @if($user['userGender'] == '') Selected @endif>Secret</option>
                                        <option value = "Male" @if($user['userGender'] == 'Male') Selected @endif>Male</option>
                                        <option value = "Female" @if($user['userGender'] == 'Female') Selected @endif>Female</option>
                                    </select>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td colspan="2"><button type="submit" class ='myButton' style="width: 100%;">Updating</button></td>
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

$('#close').click(function() {
    $('.message').fadeOut("slow");
});

</script>

