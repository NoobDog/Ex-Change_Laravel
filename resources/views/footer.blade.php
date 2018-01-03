<link rel="stylesheet" href="{{asset('css/footer.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
<!-- jquery dialog  -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">
<link rel="stylesheet"  href="{{asset('css/animation.css')}}">
<div id="dialog" hidden>
</div>

<div class="footBar">
  <ul class="fb">
    <li style="float:right;"><a @if(Session::has('userID')) onClick="getDialog()" @else href="{{url('/')}}" @endif ><i id="chatIcon" class="fa fa-envelope" aria-hidden="true"></i></a></li>
  </ul>
</div>


<script>
    //var messages; 
    getMessages();
    //$(document).ready(function() {
    function getMessages () {
        var url = '{{action("footerController@index")}}';
        $.ajax({
        type: "POST",
        url: url,
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')}, 
        success: function(data) {

            if (data == "null") {
                console.log("not login");
            }
            else if (!data.length) {
                var HTML = "No message";
                $('#dialog').html(HTML);
                // arr is not empty
            } else {
                $('#chatIcon').css("color", "green");
                $('#chatIcon').addClass("faa-wrench animated");
                var messages ={};
                $.each(data, function (k,v){
                    if(messages[v['ID']] == undefined) {
                        messages[v['ID']] = {};
                    }
                    messages[v['ID']][k] = v;
                }) 
                console.log(messages);
                var HTML ="";
                $.each(messages, function(k,v) {
                    var senderName = k.split("_")[0];
                    var bookName = k.split("_")[1];
                    var bookID = k.split("_")[2];
                    var senderID, sellerID, buyerID;
                    var messageIndexs = "";
                    HTML += "<h2>"+senderName+" : "+bookName+"</h2>";
                    HTML +=' <div class="col-md-8 bg-white "><div class="chat-message"><ul class="chat">';
                    $.each(v, function(key,val) {
                        senderID = val['senderID'];
                        sellerID = val['sellerID'];
                        buyerID = val['buyerID'];
                        
                        messageIndexs += "key_"+val['negotiateID'];

                        
                        HTML += '<li class="left clearfix li_'+senderID+'_'+sellerID+'_'+buyerID+'_'+bookID+'">';
                        HTML += '<span class="chat-img pull-left">';
                        HTML += '<img src="http://ex-change-l.azurewebsites.net/icons/'+val["senderIcon"]+'" alt="User Avatar">';
                        HTML += '</span>';
                        HTML += '<div class="chat-body clearfix">';
                        HTML += '<div class="header">';
                        HTML += '<strong class="primary-font">'+senderName+'</strong>';
                        HTML +=' <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>'+val["date"]+'</small>';
                        HTML += '</div>';
                        HTML += '<p>'+val["message"]+'</p>';
                        HTML += '</div>';
                        HTML += '</li>';
                    })
                    console.log(messageIndexs);
                    HTML +='</ul></div>';
                    HTML += '<div class="chat-box bg-white">';
                    HTML += '<div class="input-group">';
                    HTML += '<input name="message" id ="message_{{Session::get("userID")}}_'+senderID+'_'+bookID+'" class="textarea" placeholder="Type your message here">';
                    HTML +='<input name="index" id ="index_'+senderID+'_'+bookID+'" value = "'+messageIndexs+'" hidden>';
                    HTML += '<span class="input-group-btn">';
                    HTML += '<button class="sendBtn" onClick="submit('+senderID+','+sellerID+','+buyerID+','+bookID+')">Send</button>'
                    HTML += '</span>';
                    HTML += '</div>';
                    HTML += '</div>';
                    HTML += '</div>';
                })
                $('#dialog').html(HTML);
            }

        }
        })
    }
    function colseDialog() {
        $('#chatIcon').removeClass("faa-wrench animated");
        $('#chatIcon').css("color", "white");
    }
    function getDialog() {
        $( "#dialog" ).css({overflow:"auto"});
        $( "#dialog" ).dialog({
            autoOpen: false,
            maxWidth:700,
            maxHeight: 600,
            width: 700,
            height: 600,
            close: colseDialog(),
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
    function submit(receiverID, sellerID, buyerID, bookID) {
        var senderID = '{{Session::get("userID")}}';
        var message = $('#message_{{Session::get("userID")}}_'+receiverID+'_'+bookID).val();
        var messageIndexs = $('#index_'+receiverID+'_'+bookID).val();
        messageIndexs = messageIndexs.split("key_");
        console.log(' senderID:'+senderID+' receiverID:'+receiverID+'sellerID :'+sellerID+' buyerID:'+buyerID +' message:'+message);

        //console.log(IDs);
        var removeItem = "";
        messageIndexs = jQuery.grep(messageIndexs, function(value) {
        return value != removeItem;
        });
        console.log(messageIndexs);
        console.log(message);
        if(message != "") {
            var url = '{{action("footerController@addMessage")}}';
            $.ajax({
                type: "POST",
                url: url,
                beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')}, 
                data: {message: message, messageIndexs: messageIndexs, receiverID: receiverID, senderID: senderID, sellerID: sellerID, buyerID: buyerID, bookID: bookID},
                success: function( msg ) {
                    console.log(msg);
                    if(msg == 'yes') {
                        var icon = '{{Session::get("userIcon")}}';
                        var HTML = '';
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!
                        var senderName = '{{Session::get("userName")}}';
                        var yyyy = today.getFullYear();
                        if(dd<10){
                            dd='0'+dd;
                        } 
                        if(mm<10){
                            mm='0'+mm;
                        } 
                        var today = dd+'/'+mm+'/'+yyyy;
                        HTML += '<li class="right clearfix" id="li_'+senderID+'_'+sellerID+'_'+buyerID+'_'+bookID+'">';
                        HTML += '<span class="chat-img pull-right">';
                        HTML += '<img src="http://ex-change-l.azurewebsites.net/icons/'+icon+'"alt="User Avatar">';
                        HTML += '</span>';
                        HTML += '<div class="chat-body clearfix">';
                        HTML += '<div class="header">';
                        HTML += '<strong class="primary-font">'+senderName+'</strong>';
                        HTML +=' <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>'+today+'</small>';
                        HTML += '</div>';
                        HTML += '<p>'+message+'</p>';
                        HTML += '</div>';
                        HTML += '</li>';
                        $('.li_'+receiverID+'_'+sellerID+'_'+buyerID+'_'+bookID).last().append(HTML);

                    }
                }
            });
        }

    }

</script>