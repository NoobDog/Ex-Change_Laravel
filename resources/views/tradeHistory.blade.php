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
        <link rel="stylesheet" href="{{asset('css/users.css')}}">
        
    </head>
    <body>
        @include('header')
        <ul class="tradeLists">
                @foreach ($trades as $trade)
                    <li>
                        <img src="{{asset('users/'.$trade['bookImage'])}}"/>
                        <h3>{{$trade['bookName']}}</h3>
                        <h3>$ {{number_format($trade['tradeTotal'], 2, '.', '')}} CAD</h3>
                        <h3>{{$trade['tradeStatus']}}</h3>
                    </li>
                @endforeach
            </ul>
        {{print_r($trades)}}
        @include('footer')
    </body>
    

</html>