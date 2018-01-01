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
        <link rel="stylesheet" href="{{asset('css/bank.css')}}">
        
    </head>
    <body>
        @include('header')
            <ul>
                @foreach ($users as $user)
                    <li class="userLists @if($user['isVoid']) Void @endif @if($user['isWarning']) Warning @endif">
                        <img src="{{asset('icons/'.$user['userIcon'])}}"/>
                        <h3>{{$user['userName']}}</h3>
                        <h3>{{$user['userEmail']}}</h3>
                    </li>
                    {{print_r($user)}}
                @endforeach
            </ul>
        @include('footer')
    </body>
    

</html>