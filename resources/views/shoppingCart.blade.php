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
        <link rel="stylesheet" href="{{asset('css/shoppingCart.css')}}">
        
    </head>
    <body>
        @include('header')
        @if(isset($errorMsg))
        <p class="message">{{$errorMsg}} <span style="float:right;" id="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span></P>
        @endif

        @if (empty($shoppingCart))
            <div class="flex-center position-ref full-height"></div>
        @endif
                <?php $total = 0;?>
                <ul class="chartList">
                    @foreach ($shoppingCart as $shoppingCartID => $Item)
                        <li>
                            <img src="{{asset('users/'.$Item['bookImage'])}}"/>
                            <h3>{{$Item['bookName']}}</h3>
                            <p>{{$Item['bookDescription']}}</p>
                            <h4><strong>$ {{number_format($Item['bookprice'], 2, '.', '')}} CAD</strong></h4>
                            <a class="my-btn" href="#"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
                        </li>
                        <?php $total += $Item['bookprice']; ?>
                    @endforeach
                </ul>
        <h3>Total : $ {{number_format($total, 2, '.', '')}} CAD</h3>
        @if (empty($userCards))
        <form method="post" action="{{route('addCardAndCheckOut')}}">
        {{csrf_field()}}
            <table>
                <tr>
                    <th><label><b>Name ON CARD</b></label></th>
                    <td>
                        <input type="text" name="nameOnCard" required>
                    </td>                     
                </tr>
                <tr>
                    <th><label><b>CARD NUMBER</b></label></th>
                    <td>
                        <input type="number" name="cardNumber" required>
                    </td>                     
                </tr>
                <tr>
                    <th><label><b>CVV</b></label></th>
                    <td>
                        <input type="number" name="cvv" required>
                    </td>                     
                </tr>
                <tr>
                    <th><label><b>EXPIRY YEAR</b></label></th>
                    <td>
                        <select name="expiryYear" id = "year"></select>
                    </td>                     
                </tr>
                <tr>
                    <th><label><b>EXPIRY MONTH</b></label></th>
                    <td>
                        <select name="expiryMonth">
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
            <button style='text-align: center;' type="submit" class="checkoutBtn">CHECK OUT</button>
        </form>

        @else 
        <a href="{{route('checkOut')}}" class="checkoutBtn">CHECK OUT</a>
            
        @endif
        @include('footer')
    </body>
    

</html>
<script>

$('#close').click(function() {
    $('.message').fadeOut("slow");
});
</script>

<script>
    var end = 2000;
    var start = new Date().getFullYear() + 3;
    var thisYear =  new Date().getFullYear();
    var options = "";
    for(var year = start ; year >=end; year--){
        if(thisYear == year) {
            options += "<option selected>"+ year +"</option>";
        } else {
            options += "<option>"+ year +"</option>";
        }
        
    }
    document.getElementById("year").innerHTML = options;

</script>