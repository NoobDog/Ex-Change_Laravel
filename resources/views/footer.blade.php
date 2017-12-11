<link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
<link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>

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
                    HTML += "<a onClick='testing()'><h2>"+senderName+" : "+bookName+"</h2></a>";
                    HTML +=' <div class="col-md-8 bg-white "><div class="chat-message"><ul class="chat">';
                    $.each(v, function(key,val) {
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
                    HTML +='</ul></div"></div>';
                })
                $('#dialog').html(HTML);
            }

        }
        })
    }
    function testing(k) {
        alert(k);
    } 
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
   // });

</script>