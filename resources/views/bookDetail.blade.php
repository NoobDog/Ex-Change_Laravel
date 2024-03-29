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
            <div class="content">
                <div class="title m-b-md">
                    Book Details
                </div>
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
                    @if(Session::get('roleTypeID') == 2)
                    <form method="POST" action="{{route('bookDetailAdminEdit',$book['bookID'])}}">
                            {{csrf_field()}}
                            <input type="checkbox" name="isVoid" value="1" @if($book['isVoid']) checked @endif> Void 
                            <button type="submit" class ='myButton'>Update</button> 
                    </form>
                    @endif
                </div>
                <hr/>
                @if (Session::has('userName') && $book['bookUserName'] != Session::get('userName'))
                <div class="negotiate">
                    <img src="{{asset('icons/'.$book['bookUserIcon'])}}">
                    <p>{{$book['bookUserName']}}</p>  
                    <button class="contactButton" onClick="openContact()">Contact {{$book['bookUserName']}}</button>
                    <div id="dialogContent" hidden>
                        <!-- selected chat -->
                        <div class="col-md-8 bg-white ">
                            <div class="chat-message">
                                <ul class="chat">
                                @if (count($messages) > 0)
                                    @foreach ($messages as $message)
                                    
                                        @if ($message['senderID'] == Session::get('userID'))
                                            <li class="right clearfix">
                                                <span class="chat-img pull-right">
                                                    <img src="{{asset('icons/'.Session::get('userIcon'))}}" alt="User Avatar">
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">{{Session::get('userName')}}</strong>
                                                        <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> {{$message['date']}}</small>
                                                    </div>
                                                    <p>
                                                       {{$message['message']}}
                                                    </p>
                                                </div>
                                            </li>
                                        @else
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    <img src="{{asset('icons/'.$book['bookUserIcon'])}}" alt="User Avatar">
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">{{$book['bookUserName']}}</strong>
                                                        <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>{{$message['date']}}</small>
                                                    </div>
                                                    <p>
                                                    {{$message['message']}}
                                                    </p>
                                                </div>
                                            </li>
                                        @endif
                                    
                                    @endforeach

                                @endif
                                </ul>
                            </div>
                            <div class="chat-box bg-white">
                                <div class="input-group">
                                    <form method="post" action="{{route('bookDetailAddMessage',$book['bookID'])}}">
                                    {{csrf_field()}}
                                    <!-- <input name="bookID" value="{{$book['bookID']}}" hidden> -->
                                    <input name="senderID" value="{{Session::get('userID')}}" hidden>
                                    <input name="receiverID" value="{{$book['userID']}}" hidden>
                                    <input name="sellerID" value="{{$book['userID']}}" hidden>
                                    <input name="buyerID" value="{{Session::get('userID')}}" hidden>
                                        <input name="message" id ="message" class="textarea" placeholder="Type your message here">
                                        <span class="input-group-btn">
                                            <button class="sendBtn" type="submit">Send</button>
                                        </span>
                                    </form>
                                </div><!-- /input-group -->	
                            </div>
                        </div>              
                    </div>
                
                </div>
                @else
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
$(document).ready(function() {
    var refresh = {{$refresh}};
    //alert(refresh);
    if (refresh) {
        $( "#dialogContent" ).css({overflow:"auto"});
            $( "#dialogContent" ).dialog({
                autoOpen: false,
                maxWidth:600,
                maxHeight: 500,
                width: 600,
                height: 500,
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
});

    function openContact() {
        $( "#dialogContent" ).css({overflow:"auto"});
        $( "#dialogContent" ).dialog({
            autoOpen: false,
            maxWidth:600,
            maxHeight: 500,
            width: 600,
            height: 500,
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
// function addMessage() {
//     var sender = {{Session::get('userID')}},
//         icon = {{Session::get('userIcon')}},
//         message = $('#message').val();
//     alert('sender : '+sender+' icon: '+ icon + ' message: '+ message);
// }
</script>
