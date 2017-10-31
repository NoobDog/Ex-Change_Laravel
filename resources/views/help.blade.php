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
        <link rel="stylesheet" href="{{asset('css/help.css')}}">
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
            {{print_r(env('STRIPE_KEY'))}}
            <form action="{{route('stripe')}}" method="post">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{env('STRIPE_KEY')}}"
                    data-description="Access for a year"
                    data-amount="5000"
                    data-locale="auto"></script>
            </form>
            <div class="content">
                <div class="title m-b-md">
                    Laravel - Help
                    {{print_r(session()->get('userID'))}}
                </div>
                <!-- stripe testing -->
                @if (isset($test)) 
                {{print_r($test)}}
                @endif

            </div>
        </div>
    </body>

</html>
