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
        <link rel="stylesheet" href="{{asset('css/shoppingCart.css')}}">
        
    </head>
    <body>
        @include('header')
        {{print_r($details)}}
        @if (empty($shoppingCart))
            <div class="flex-center position-ref full-height"></div>
        @endif

                <ul class="chartList">
                    @foreach ($shoppingCart as $shoppingCartID => $Item)
                        <li>
                        <img src="{{asset('users/'.$Item['bookImage'])}}"/>
                        <h3>{{$Item['bookName']}}</h3>
                        <p>{{$Item['bookDescription']}}</p>
                        <h4><strong>$ {{number_format($Item['bookprice'], 2, '.', '')}} CAD</strong></h4>
                        </li>
                    @endforeach
                </ul>
        @include('footer')
    </body>
    

</html>
