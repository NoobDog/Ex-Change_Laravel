<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<html>
<body>
{{ csrf_token() }}
<button onClick="test()">TEst</button>
<script>
function test () {
  $.ajax({
        type: "POST",
        url: 'http://ex-change-l.azurewebsites.net/weChat',
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')}, 
        data: {bookID: '1'},
        success: function(msg) {
          console.log(msg);
        }
    });
}

</script>
</body>
</html>