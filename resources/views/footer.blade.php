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
            var messages ={};
            $.each(data, function (k,v){
                console.log(v);
                if(messages[v['senderID']] == undefined) {
                    messages[v['senderID']] = {};
                }
                    messages[v['senderID']].push(v);
                //}
            }) 
            // messages = data;
            // console.log(messages);
            // if (data == "null") {
            //     console.log("not login");
            // }
            // else if (!arr.length) {
            //     // arr is not empty
            // } else {

            // }
            console.log(messages);
        }
        })
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