<link rel="stylesheet" href="{{asset('css/footer.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
<!-- jquery dialog  -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">
<div id="dialog" hidden>
</div>

<div class="footBar">
  <ul class="fb">
    <li style="float:right;"><a onClick="getDialog()"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
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
                // arr is not empty
            } else {
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
                    var senderID, sellerID, buyerID;
                    var messageIDs = "";
                    HTML += "<a onClick='testing()'><h2>"+senderName+" : "+bookName+"</h2></a>";
                    HTML +=' <div class="col-md-8 bg-white "><div class="chat-message"><ul class="chat">';
                    $.each(v, function(key,val) {
                        senderID = val['senderID'];
                        sellerID = val['sellerID'];
                        buyerID = val['buyerID'];
                        
                        messageIDs += key + '_';

                        console.log("key:" + messageIDs);
                        HTML += '<li class="left clearfix">';
                        HTML += '<span class="chat-img pull-left">';
                        HTML += '<img src="http://ex-change-l.azurewebsites.net/icons/'+val["senderIcon"]+'" alt="User Avatar">';
                        HTML += '</span>';
                        HTML += '<div class="chat-body clearfix">';
                        HTML += '<div class="header">';
                        HTML += '<strong class="primary-font">'+bookName+'</strong>';
                        HTML +=' <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>'+val["date"]+'</small>';
                        HTML += '</div>';
                        HTML += '<p>'+val["message"]+'</p>';
                        HTML += '</div>';
                        HTML += '</li>';
                    })
                    HTML +='</ul></div>';

                    HTML += '<div class="chat-box bg-white">';
                    HTML += '<div class="input-group">';
                    HTML += '<input name="message" id ="message_{{Session::get("userID")}}" class="textarea" placeholder="Type your message here">';

                    // HTML += '<input name="senderID" value="{{Session::get("userID")}}" hidden>';
                    // HTML += '<input name="receiverID" value="'+senderID+'" hidden>';
                    // HTML += '<input name="sellerID" value="'+sellerID+'" hidden>';
                    // HTML += '<input name="buyerID" value="'+buyerID+'" hidden>';

                    HTML += '<span class="input-group-btn">';
                    HTML += '<button class="sendBtn" onClick="submit('+senderID+','+sellerID+','+buyerID+','+messageIDs+')">Send</button>'
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
    function testing() {
        alert('hahaha');
    } 
    function getDialog() {
        $( "#dialog" ).css({overflow:"auto"});
        $( "#dialog" ).dialog({
            autoOpen: false,
            maxWidth:700,
            maxHeight: 600,
            width: 700,
            height: 600,
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
  function submit(receiverID, sellerID, buyerID, messageIDs) {
      var senderID = {{Session::get("userID")}};
    var message = $('#message_{{Session::get("userID")}}').val();
    console.log('senderID:'+senderID+' receiverID:'+receiverID+'sellerID :'+sellerID+' buyerID:'+buyerID +' message:'+message);
    console.log(messageIDs);
  }

</script>