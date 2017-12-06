<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- jquery dialog  -->
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">

        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bookDetail.css')}}">
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
                <hr/>
                <div class="negotiate">
                    <img src="{{asset('icons/'.$book['bookUserIcon'])}}">
                    <p>{{$book['bookUserName']}}</p>  
                    <button class="contactButton" onClick="openContact()">Contact {{$book['bookUserName']}}</button>
                    <div id="dialogContent" hidden>
                        <!-- selected chat -->
                        <div class="col-md-8 bg-white ">
                            <div class="chat-message">
                                <ul class="chat">
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">John Doe</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Sarah</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">John Doe</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Sarah</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                                            </p>
                                        </div>
                                    </li>                    
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">John Doe</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Sarah</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Sarah</strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                                            </p>
                                        </div>
                                    </li>                    
                                </ul>
                            </div>
                            <div class="chat-box bg-white">
                                <div class="input-group">
                                    <input class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success no-rounded" type="button">Send</button>
                                    </span>
                                </div><!-- /input-group -->	
                            </div>
                        </div>              
                    </div>
                    <!-- <input type="text" id="messageInput"/><button onClick="postMessage($('#messageInput').val())">submit</button> -->
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
                    <div class="negotiate">
                        <img src="{{asset('icons/'.$book['bookUserIcon'])}}">
                        <p>{{$book['bookUserName']}}</p>  
                    </div>
                @endif
            </div>
        </div>

    </body>
</html>
<script>
    function openContact() {
        $( "#dialogContent" ).dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            }
        });
        $( "#dialogContent" ).show();
        $( "#dialogContent" ).dialog("open");
    }

</script>
