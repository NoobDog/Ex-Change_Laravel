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
        <style>
            html, body {
                /*color: #636b6f;*/
                color: #ffe5e5;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                /*height: 100vh;*/
                margin: 0;
                width: 100%;
                height:auto;
                font-family: 'Open Sans', sans-serif;
                background: #092756;
                background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 60%;

            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            /* Form */
            /* Full-width input fields */
            input[type=text], input[type=password], input[type=email], .questions {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                padding: 14px 20px;
                background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn,.signupbtn {
                float: left;
                width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 16px;


            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .signupbtn {
                   width: 100%;
                }
            }
            .questions {
              height: 40px;
            }
            .errorMsg {
              color: red;
              text-align: left;
              margin: 0px;
              font-size: 15px;
            }
            .Register{
              position: absolute;
              top: 50;
              bottom: 250;
              left: 250;
              right: 250;
            }
        </style>

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
