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
                position: absolute;
                height: 100%;
                width: 100%;
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
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif -->

            <div class="content">
                <div class="title m-b-md">
                    Book Details
                </div>

                @if (Session::has('userName'))
                <div class="bookDetail">
                    <img src="{{asset('users/'.$book['bookImage'])}}">
                    <strong><p>{{$book['bookName']}}</p></strong>
                    <p>{{$book['bookTitle']}}</p>
                    <p>by <strong>{{$book['bookAuthor']}}</strong></p>
                    <p>{{$book['bookDescription']}}</p>
                    <p>Published by <strong>{{$book['bookPublisher']}}</strong></p>
                    <p>Edition <strong>{{$book['bookEdition']}}</strong></p>
                    <p>Date <strong>{{$book['bookDate']}}</strong></p>
                    <p>Type <strong>{{$book['bookType']}}</strong></p>
                    <p>Price <strong>$ {{number_format($book['bookPrice'], 2, '.', '')}} CAD</strong></p>
                </div>
                <div class="negotiate">
                    <input type="text" id="messageInput"/><button onClick="postMessage($('#messageInput').val())">submit</button>
                </div>
                @else
                    <div class="bookDetail">
                        <img src="{{asset('users/'.$book['bookImage'])}}">
                        <strong><p>{{$book['bookName']}}</p></strong>
                        <p>{{$book['bookTitle']}}</p>
                        <p>by <strong>{{$book['bookAuthor']}}</strong></p>
                        <p>{{$book['bookDescription']}}</p>
                        <p>Published by <strong>{{$book['bookPublisher']}}</strong></p>
                        <p>Edition <strong>{{$book['bookEdition']}}</strong></p>
                        <p>Date <strong>{{$book['bookDate']}}</strong></p>
                        <p>Type <strong>{{$book['bookType']}}</strong></p>
                        <p>Price <strong>$ {{number_format($book['bookPrice'], 2, '.', '')}} CAD</strong></p>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
<<script>
    function postMessage(messageInput) {
        console.log(messageInput);


    }

</script>
