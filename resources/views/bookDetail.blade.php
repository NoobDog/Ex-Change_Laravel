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
<div class='chat-wrapper'>


<div class='chat-message padding'>

    <div class='chat-message chat-message-recipient'>
    <img class='chat-image chat-image-default' src='http://www.michaelmammoliti.com/_projects/chat/_media/img/user1.jpg' />

    <div class='chat-message-wrapper'>
        <div class='chat-message-content'>
        <p>Sushi tonight?</p>
        </div>

        <div class='chat-details'>
        <span class='chat-message-localization font-size-small'>My Address</span>
        <span class='chat-message-read-status font-size-small'>- Read</span>
        </div>

    </div>
    </div>


    <div class='chat-message chat-message-sender'>
    <img class='chat-image chat-image-default' src='http://www.michaelmammoliti.com/_projects/chat/_media/img/user2.jpg' />

    <div class='chat-message-wrapper'>
        <div class='chat-message-content'>
        <p>Pizza?</p>
        <p>We had sushi last time!</p>
        <p>For me one Vegetariana! Plus some chili oil on it!</p>
        </div>

        <div class='chat-details'>
        <span class='chat-message-localisation font-size-small'>My Address</span>
        <span class='chat-message-read-status font-size-small'>- Read</span>
        </div>

    </div>
    </div>

    
    <div class='chat-message chat-message-recipient'>
    <img class='chat-image chat-image-default' src='http://www.michaelmammoliti.com/_projects/chat/_media/img/user1.jpg' />

    <div class='chat-message-wrapper'>
        <div class='chat-message-content'>
        <p>Done. Delivery takes 5 minutes!</p>
        </div>

        <div class='chat-details'>
        <span class='chat-message-localisation font-size-small'>My Address</span>
        <span class='chat-message-read-status font-size-small'>- Read</span>
        </div>

    </div>
    </div>

    
    <div class='chat-message chat-message-sender'>
    <img class='chat-image chat-image-default' src='http://www.michaelmammoliti.com/_projects/chat/_media/img/user2.jpg' />

    <div class='chat-message-wrapper'>
        <div class='chat-message-content'>
        <p>Awesome! See you later! : )</p>
        </div>

        <div class='chat-details'>
        <span class='chat-message-localization font-size-small'>My Address</span>
        <span class='chat-message-read-status font-size-small'>- Read</span>
        </div>

    </div>
    </div>


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
