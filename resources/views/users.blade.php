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
            <ul class="userLists">
                @foreach ($users as $user)
                {{print_r($user)}}
                    <li class=" @if($user['isVoid']) Void @endif @if($user['isWarning']) Warning @endif">
                        <img src="{{asset('icons/'.$user['userIcon'])}}"/>
                        <h3>{{$user['userName']}}</h3>
                        <h3>{{$user['userEmail']}}</h3>
                        <form method="POST"  action="{{route('updateUserStatus',$user['userEmail'])}}">
                            {{csrf_field()}}
                            <input type="radio" name="status" value="Warning"  checked = "@if($user['isVoid']) checked @endif"> Warning
                            <input type="radio" name="status" value="Void" checked = "@if($user['isWarning']) checked @endif"> Void
                            <input type="radio" name="status" value="Undo" checked = "@if($user['isVoid'] == 0 && $user['isWarning'] == 0) checked @endif"> Normal
                            <button type="submit" class ='myButton'>Update</button> 
                        </form> 
                    </li>
                @endforeach
            </ul>
        @include('footer')
    </body>
    

</html>