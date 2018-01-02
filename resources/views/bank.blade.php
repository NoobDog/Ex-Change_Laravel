<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bank.css')}}">
        
    </head>
    <body>
        @include('header')
            @if(isset($errorMsg))
            <p class="message">{{$errorMsg['message']}} <span style="float:right;" id="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span></P>
            @endif
            @if (empty($userCard))
            <form method="post" action="{{route('addCard')}}" class = "cardForm">
            {{csrf_field()}}
                <table class = "cardTable">
                    <tr>
                        <th><label><b>Name ON CARD</b></label></th>
                        <td>
                            <input type="text" name="nameOnCard" with="100px" required>
                        </td>                     
                    </tr>
                    <tr>
                        <th><label><b>CARD NUMBER</b></label></th>
                        <td>
                            <input type="number" name="cardNumber" with="100px" required>
                        </td>                     
                    </tr>
                    <tr>
                        <th><label><b>CVV</b></label></th>
                        <td>
                            <input type="number" name="cvv" with="100px" required>
                        </td>                     
                    </tr>
                    <tr>
                        <th><label><b>EXPIRY YEAR</b></label></th>
                        <td>
                            <select name="expiryYear" id = "year" with="100px"></select>
                        </td>                     
                    </tr>
                    <tr>
                        <th><label><b>EXPIRY MONTH</b></label></th>
                        <td>
                            <select name="expiryMonth" with="100px">
                                <option value="01">JAN</option>
                                <option value="02">FEB</option>
                                <option value="03">MAR</option>
                                <option value="04">APR</option>
                                <option value="05">MAY</option>
                                <option value="06">JUN</option>
                                <option value="07">JUL</option>
                                <option value="08">AUG</option>
                                <option value="09">SEP</option>
                                <option value="10">OCT</option>
                                <option value="11">NOV</option>
                                <option value="12">DEC</option>
                            </select>
                        </td>                     
                    </tr>
    
                </table>
                <button style='text-align: center;' type="submit" class="btn">ADD CARD</button>
            </form>
    
            @else
                <form method="post" action="{{route('editCard')}}" class = "cardForm">
                {{csrf_field()}}
                    <table class = "cardTable">
                        <tr>
                            <th><label><b>Name ON CARD</b></label></th>
                            <td>
                                <input type="text" name="nameOnCard" value = "{{$userCard['cardHolder']}}" with="100px" required>
                            </td>                     
                        </tr>
                        <tr>
                            <th><label><b>CARD NUMBER</b></label></th>
                            <td>
                                <input type="number" name="cardNumber" value = "{{$userCard['cardNumber']}}" with="100px" required>
                            </td>                     
                        </tr>
                        <tr>
                            <th><label><b>CVV</b></label></th>
                            <td>
                                <input type="number" name="cvv" value = "{{$userCard['cvc']}}" with="100px" required>
                            </td>                     
                        </tr>
                        <?php 
                            $year = explode('-',$userCard['cardVaildDate'])[0];
                            $month = explode('-',$userCard['cardVaildDate'])[1];
                        ?>
                        <tr>
                            <th><label><b>EXPIRY YEAR</b></label></th>
                            <td>
                                <select name="expiryYear" id = "year" with="100px"></select>
                            </td>                     
                        </tr>
                        <tr>
                            <th><label><b>EXPIRY MONTH</b></label></th>
                            <td>
                                <select name="expiryMonth" with="100px">
                                    <option value="01" @if($month == "01") selected @endif>JAN</option>
                                    <option value="02" @if($month == "02") selected @endif>FEB</option>
                                    <option value="03" @if($month == "03") selected @endif>MAR</option>
                                    <option value="04" @if($month == "04") selected @endif>APR</option>
                                    <option value="05" @if($month == "05") selected @endif>MAY</option>
                                    <option value="06" @if($month == "06") selected @endif>JUN</option>
                                    <option value="07" @if($month == "07") selected @endif>JUL</option>
                                    <option value="08" @if($month == "08") selected @endif>AUG</option>
                                    <option value="09" @if($month == "09") selected @endif>SEP</option>
                                    <option value="10" @if($month == "10") selected @endif>OCT</option>
                                    <option value="11" @if($month == "11") selected @endif>NOV</option>
                                    <option value="12" @if($month == "12") selected @endif>DEC</option>
                                </select>
                            </td>                     
                        </tr>
        
                    </table>
                    <button style='text-align: center;' type="submit" class="btn">Edit Card</button>
                </form>
            @endif
        @include('footer')
    </body>

</html>
<script>

    $('#close').click(function() {
        $('.message').fadeOut("slow");
    });

    var end = 2000;
    var start = new Date().getFullYear() + 3;
    var thisYear =  new Date().getFullYear();
    var options = "";

    var existYear = <?php echo $year;?>;
    for(var year = start ; year >=end; year--){
        if(typeof existYear !== "undefined") {
            if(existYear == year) {
                options += "<option selected>"+ year +"</option>";
            } else {
                options += "<option>"+ year +"</option>";
            }
        } else {
            if(thisYear == year) {
                options += "<option selected>"+ year +"</option>";
            } else {
                options += "<option>"+ year +"</option>";
            }
        }

        
    }
    document.getElementById("year").innerHTML = options;

</script>
