<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

        <!-- include carouFredSel plugin -->
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>

        <!-- optionally include helper plugins -->
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.touchSwipe.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.transit.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.ba-throttle-debounce.min.js')}}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <style>
        /* Scrolling bar */
        #wrapper {
          position: absolute;
          left: 9%;
          right: 4.5%;
        }

        #carousel {
          width: 100%;
          position:vrelative;
        }
        #carousel ul {
          list-style: none;
          display: block;
          margin: 0;
          padding: 0;
          /* width: 100%; */
        }
        #carousel li {
          background: transparent url("{{asset('img/carousel_polaroid.png')}}") no-repeat 0 0;
          font-size: 40px;
          color: #999;
          text-align: center;
          display: block;
          width: 232px;
          height: 100%;
          padding: 0;
          margin: 6px;
          float: left;
          position: relative;
        }
        #carousel li: hover{
          background: #555; 
        }
        #carousel li img {
          width: 201px;
          height: 127px;
          margin-top: 14px;
        }

        #carousel li span {
          background: transparent url("{{asset('img/carousel_shine.png')}}") no-repeat 0 0;
          text-indent: -999px;
          display: block;
          overflow: hidden;
          width: 201px;
          height: 127px;
          position: absolute;
          z-index: 2;
          top: 14px;
          left: 16px;
        }			

        .clearfix {
          float: none;
          clear: both;
        }
        #carousel .prev, #carousel .next {
          background: transparent url("{{asset('img/carousel_control.png')}}") no-repeat 0 0;
          text-indent: -999px;
          display: block;
          overflow: hidden;
          width: 15px;
          height: 21px;
          margin-left: 10px;
          position: absolute;
          top: 70px;				
        }
        #carousel .prev {
          background-position: 0 0;
          left: -3%;
        }
        #carousel .prev:hover {
          left: -3.1%;
        }			
        #carousel .next {
          background-position: -18px 0;
          right: -1%;
        }
        #carousel .next:hover {
          right: -1.1%;
        }				
        #carousel .pager {
          text-align: center;
          margin: 0 auto;
        }
        #carousel .pager a {
          background: transparent url("{{asset('img/carousel_control.png')}}") no-repeat -2px -32px;
          text-decoration: none;
          text-indent: -999px;
          display: inline-block;
          overflow: hidden;
          width: 8px;
          height: 8px;
          margin: 0 5px 0 0;
        }
        #carousel .pager a.selected {
          background: transparent url("{{asset('img/carousel_control.png')}}") no-repeat -12px -32px;
          text-decoration: underline;				
        }
        </style>
    </head>

    <body>
        @include('header')
        <!-- <form class="search" >
          <input type="text" class="searchTerm"/>
          <button class="myButton">Search</button>
        </form> -->
            <div class="content">
              <div class="testing">
                  <div id="wrapper">
                    <div id="carousel">
                      <ul>
                        @foreach ($books as $bookID => $book) 
                        <li>
                          <img src="{{asset('users/'.$book['bookImage'])}}">
                          <br>
                          <p style="font-size: medium;">
                          <a style='text-decoration: none; color: #599bb3; ' href="{{route('bookDetail',$book['bookID'])}}"><font face="verdana">{{$book['bookName']}}</font></a>
                            <p style="font-size: small;"> by <strong>{{$book['bookAuthor']}}</strong></p>
                            <p style="font-size: small;">{{$book['bookPublisher']}}</p>
                            <p style="font-size: medium;"><strong>$ {{number_format($book['bookPrice'], 2, '.', '')}} CAD</strong></p>
                            <p style="font-size: x-small;">{{$book['bookDescription']}}</P>
                          </p>
                          <a href="{{route('bookDetail',$book['bookID'])}}"><button class="itemButton">View</button></a>
                          <a onClick="addToCart({{$book['bookID']}})"><button class="itemButton1">Add to Cart</button></a>
                          <a href="{{route('bookDetail',$book['bookID'])}}"><span></span></a>
                        </li>
                        @endforeach
                      </ul>

                      <div class="clearfix"></div>
                      <a id="prev" class="prev" href="#">&lt;</a>
                      <a id="next" class="next" href="#">&gt;</a>
                      <br>
                      <div id="pager" class="pager"></div>
                    </div>
                    <script>
                        //$(function() {
                          $('#carousel ul').carouFredSel({
                            width: "100%",
                            prev: '#prev',
                            next: '#next',
                            pagination: "#pager",
                            scroll: 1000,
                            auto: false
                          });
                          
                        //});
                    </script>
                    
                  </div>
                  @include('footer')
              </div>
            </div>

    </body>
   
</html>
<script>
  function addToCart (bookID) {
    var url = '{{action("footerController@addToCart")}}';
    $.ajax({
        type: "POST",
        url: url,
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')}, 
        data: {bookID: bookID},
        success: function( msg ) {
          console.log(msg);
          if(msg == 'yes') {
            $('.fa-shopping-cart').addClass("faa-wrench animated");

            setTimeout(function(){
              $('.fa-shopping-cart').removeClass("faa-wrench animated");
            }, 10000);
          } else if (msg =='sameUser') {
            alert('This is your book!');
          } else if (msg =='hasInCart') {
            alert('You have already added in the cart!');
          } else {
            window.location.href = "http://ex-change-l.azurewebsites.net/login";
          }
        }
    });
  }
</script>