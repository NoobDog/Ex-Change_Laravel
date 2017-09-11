<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
        </style>
    </head>
    <script src="{{ asset('js/vue.js') }}"></script>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel - New account
                </div>
                <div>
                  <form action="">
                    <div class="container">
                      <label><b>Email</b></label>
                      <input type="text" placeholder="Enter Email" name="email" required>

                      <label><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="psw" required>

                      <label><b>Repeat Password</b></label>
                      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                      <input type="checkbox" checked="checked"> Remember me
                      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                      <div class="clearfix">
                        <button type="button"  class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                      </div>
                    </div>
                  </form>
                </div>


            </div>
        </div>
    </body>
</html>
