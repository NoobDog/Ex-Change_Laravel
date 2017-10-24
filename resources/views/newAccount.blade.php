<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/newAccount.css')}}">

    </head>
    <script src="{{ asset('js/vue.js') }}"></script>

    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
              <div class="Register">
                <h2>Register</h2>
                  <form action="{{route('signUpCheck')}}" style="border:1px solid #ccc" id="signinForm" method="POST">
                  {{ csrf_field() }}
                  <div class="container">
                    <label><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" required>
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <label><b>Repeat Password</b></label>
                    <p id='passwordMatch' hidden="true" class='errorMsg'></p>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                    <label><b>First Name</b></label>
                    <input type="text" placeholder="First Name" name="fName" required>
                    <label><b>Last Name</b></label>
                    <input type="text" placeholder="Last Name" name="lName" required>

                    <label><b>Question 1</b></label>
                    <select id="questionSelect1" name="questionSelect1" class="questions" required>
                      <option value =''>Select A Question</option>
                      @foreach ($questions_1 as $key => $quetion)
                      <option value ='{{$key}}'>{{$quetion}}</option>
                      @endforeach
                    </select>
                    <input type="text" placeholder="Question 1" name="question1" required>

                    <label><b>Question 2</b></label>
                    <select id="questionSelect2" name="questionSelect2" class="questions" required>
                      <option value =''>Select A Question</option>
                      @foreach ($questions_2 as $key => $quetion)
                      <option value ='{{$key}}'>{{$quetion}}</option>
                      @endforeach

                    </select>
                    <input type="text" placeholder="Question 2" name="question2" required>

                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                      <a href="{{url('/')}}"><button type="button" class="cancelbtn">Cancel</button></a>
                      <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </body>
</html>
<script>
  $('input[name="psw-repeat"]').off("input").on("input", function() {
    var repeatValue = $(this).val();
    var passwordValue = $('input[name="psw"]').val();
    if(passwordValue != repeatValue) {
        $('#passwordMatch').html('* Password does not match.');
        $('#passwordMatch').show();
        $('button[class="signupbtn"]').attr("disabled", true);
    }
    else {
      $('#passwordMatch').hide();
      $('button[class="signupbtn"]').attr("disabled", false);
    }
});
</script>
