<link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
<link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>

{{action('footerController@index()')}}
<div id="dialog" hidden>
    <!-- selected chat -->
    <!-- <div class="col-md-8 bg-white ">
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
                <input name="senderID" value="{{Session::get('userID')}}" hidden>
                <input name="receiverID" value="{{$book['userID']}}" hidden>
                <input name="sellerID" value="{{$book['userID']}}" hidden>
                <input name="buyerID" value="{{Session::get('userID')}}" hidden>
                    <input name="message" id ="message" class="textarea" placeholder="Type your message here">
                    <span class="input-group-btn">
                        <button class="sendBtn" type="submit">Send</button>
                    </span>
                </form>
            </div>
        </div>
    </div>    -->


</div>

<div class="footBar">
  <ul class="fb">
    <li style="float:right;"><a onClick="getDialog()"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
  </ul>
</div>


<script>
    function getDialog() {
        $( "#dialog" ).dialog({
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
        $( "#dialog" ).show();
        $( "#dialog" ).dialog("open");
    }
</script>