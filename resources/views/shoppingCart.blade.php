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
        {{print_r($userCards)}}
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
                        </li>
                        <?php $total += $Item['bookprice']; ?>
                    @endforeach
                </ul>
        <h3>Total : $ {{number_format($total, 2, '.', '')}} CAD</h3>
        @if (empty($userCards))
        <form method="post" action="{{route('addCardAndCheckOut')}}">
        {{csrf_field()}}
            <table style='width: 100%;'>
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
                            <option value="1">jan</option>
                            <option value="2">feb</option>
                            <option value="3">march</option>
                            <option value="4">april</option>
                            <option value="5">may</option>
                            <option value="6">june</option>
                            <option value="7">july</option>
                            <option value="8">aug</option>
                            <option value="9">sept</option>
                            <option value="10">oct</option>
                            <option value="11">nov</option>
                            <option value="12">dec</option>
                        </select>
                    </td>                     
                </tr>
                <tr><button type="submit" class="btn btn-primary btn-block btn-large finishButton">CHECK OUT</button></tr>
            </table>
        </form>

        @else 
            <button>CHECK OUT</button>
        @endif
        @include('footer')
    </body>
    

</html>
<script>
            var end = 1900;
            var start = new Date().getFullYear();
            var options = "";
            for(var year = start ; year <=end; year--){
            options += "<option>"+ year +"</option>";
            }
            document.getElementById("year").innerHTML = options;

        </script>