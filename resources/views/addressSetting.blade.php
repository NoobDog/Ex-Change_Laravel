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
            <br>
            <label><b>{{session()->get('userName')}}</b></label>
            @if(isset($userAddress) && !empty($userAddress))
                <form>
                    <table>
                        <tr>
                            <th><label><b>Country:</b></label></th>
                            <td>
                                <select class='select-style' name='userCountry'>
                                    @foreach($countries as $key => $val)
                                        @if($key == $userAddress['userCountry'])
                                            <option value="{{$key}}" selected>{{$val}}</option>
                                        @else
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th><label><b>Province:</b></label></th>
                            <td><input type="text" value="{{$userAddress['userProvince']}}" name="userProvince" required="required"/></td>
                        </tr>

                        <tr>
                            <th><label><b>City:</b></label></th>
                            <td><input type="text" value="{{$userAddress['userCity']}}" name="userCity" required="required"/></td>
                        </tr>

                        <tr>
                            <th><label><b>Address:</b></label></th>
                            <td><input type="text" value="{{$userAddress['userAddress']}}" name="userAddress" required="required"/></td>
                        </tr>

                        <tr>
                            <th><label><b>Postal Code:</b></label></th>
                            <td><input type="text" value="{{$userAddress['userPostalCode']}}" name="userPostalCode" required="required"/></td>
                        </tr>
                    </table>
                </form>
            @elseif(isset($userAddress))
            <form>
                <table>
                    <tr>
                        <th><label><b>Country:</b></label></th>
                        <td>
                            <select class='select-style' name='userCountry'>
                            <option value="-1">Please select a country</option>
                                @foreach($countries as $key => $val)
                                     <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><label><b>Province:</b></label></th>
                        <td><input type="text" name="userProvince" required="required"/></td>
                    </tr>

                    <tr>
                        <th><label><b>City:</b></label></th>
                        <td><input type="text" name="userCity" required="required"/></td>
                    </tr>

                    <tr>
                        <th><label><b>Address:</b></label></th>
                        <td><input type="text" name="userAddress" required="required"/></td>
                    </tr>

                    <tr>
                        <th><label><b>Postal Code:</b></label></th>
                        <td><input type="text" name="userPostalCode" required="required"/></td>
                    </tr>
                </table>
            </form>
            @endif
            </div>
        </div>
    </body>
</html>
@endif
