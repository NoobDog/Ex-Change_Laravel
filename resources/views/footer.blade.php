<link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
<link rel="stylesheet"  type="text/css" href="{{asset('css/jquery-ui.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>

<div class="footBar">
  <ul class="fb">
    <li style="float:right;"><a onClick="getDialog()"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
  </ul>
</div>



<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
<script>
    function getDialog() {
        $( "#dialog" ).dialog();
    }
</script>