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
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/addressSetting.css')}}">
    </head>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
            @if (!session()->get('userIcon'))
                <img src="{{asset('icons/'.session()->get('userIcon').'.jpg')}}" id="userIcon" style='width:200px; height:200px;'>
            @else 
                <img src="{{asset('icons/'.session()->get('userIcon'))}}" id="userIcon" style='width:200px; height:200px;'>
            @endif
            <label><b>{{session()->get('userName')}}</b></label>
            @if(isset($userAddress) && !empty($userAddress))

                <table>
                    <tr>
                        <th><label><b>Password:</b></label></th>
                        <td></td>
                    </tr>
                </table>
            @else

            @endif
            </div>
        </div>
    </body>
</html>
@endif
