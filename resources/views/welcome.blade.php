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
        <style> 
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                height: 100%;
                width: 100%;
                text-align: center;
                position: absolute;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            /*search form*/
            .search {
              width: 100%;
              text-align: center;
            }
            .searchTerm {
              width: 250px;
              box-sizing: border-box;
              border: 2px solid #ccc;
              border-radius: 4px;
              font-size: 16px;
              background-color: white;
              background-position: 10px 10px;
              background-repeat: no-repeat;
              padding: 12px 20px 12px 40px;
              -webkit-transition: width 0.4s ease-in-out;
              transition: width 0.4s ease-in-out;
              height: 50px;
            }
            .searchTerm:focus {
                width: 80%;
            }
            .navBar {
              margin-bottom: 10px !important;
            }
            .myButton {
            height: 50px;
            -moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
            -webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
            box-shadow:inset 0px 1px 0px 0px #97c4fe;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
            background:-moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
            background:-webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
            background:-o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
            background:-ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
            background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
            background-color:#3d94f6;
            -moz-border-radius:6px;
            -webkit-border-radius:6px;
            border-radius:6px;
            border:1px solid #337fed;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:20px;
            font-weight:bold;
            padding:6px 24px;
            text-decoration:none;
            text-shadow:0px 1px 0px #1570cd;
            }
            .myButton:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6));
            background:-moz-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
            background:-webkit-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
            background:-o-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
            background:-ms-linear-gradient(top, #1e62d0 5%, #3d94f6 100%);
            background:linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6',GradientType=0);
            background-color:#1e62d0;
            }
            .myButton:active {
            position:relative;
            top:1px;
            }

            /*  */
            #wrapper {
              width: 100%;
              height: 220px;
              margin: -110px 0 0 -367px;
              position: absolute;
              left: 50%;
              top: 50%;
            }

            #carousel {
              width: 100%;
              position:vrelative;
            }
            #carouselUL {
              list-style: none;
              display: block;
              margin: 0;
              padding: 0;
            }
            #carousel #carouselUL li {
              background: transparent url({{asset('img/carousel_polaroid.png')}}) no-repeat 0 0;
              font-size: 40px;
              color: #999;
              text-align: center;
              display: block;
              width: 232px;
              height: 178px;
              padding: 0;
              margin: 6px;
              float: left;
              position: relative;
            }

            #carousel #carouselUL li img {
              width: 201px;
              height: 127px;
              margin-top: 14px;
            }
            
            #carousel #carouselUL li span {
              background: transparent url({{asset('img/carousel_shine.png')}}) no-repeat 0 0;
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
              background: transparent url({{asset('img/carousel_control.png')}}) no-repeat 0 0;
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
              left: -30px;
            }
            #carousel .prev:hover {
              left: -31px;
            }			
            #carousel .next {
              background-position: -18px 0;
              right: -20px;
            }
            #carousel .next:hover {
              right: -21px;
            }				
            #carousel .pager {
              text-align: center;
              margin: 0 auto;
            }
            #carousel .pager a {
              background: transparent url({{asset('img/carousel_control.png')}}) no-repeat -2px -32px;
              text-decoration: none;
              text-indent: -999px;
              display: inline-block;
              overflow: hidden;
              width: 8px;
              height: 8px;
              margin: 0 5px 0 0;
            }
            #carousel .pager a.selected {
              background: transparent url({{asset('img/carousel_control.png')}}) no-repeat -12px -32px;
              text-decoration: underline;				
            }
            
            #source {
              text-align: center;
              width: 100%;
              position: absolute;
              bottom: 10px;
              left: 0;
            }
            #source, #source a {
              font-size: 12px;
              color: #999;
            }
            
            #donate-spacer {
              height: 100%;
            }
            #donate {
              border-top: 1px solid #999;
              width: 750px;
              padding: 50px 75px;
              margin: 0 auto;
              overflow: hidden;
            }
            #donate p, #donate form {
              margin: 0;
              float: left;
            }
            #donate p {
              width: 650px;
            }
            #donate form {
              width: 100px;
            }
        </style>
    </head>

    <body>
        @include('header')
        <form class="search" >
          <input type="text" class="searchTerm"/>
          <button class="myButton">Search</button>
        </form>
            <div class="content">
                <div class="title m-b-md">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  @if (Session::has('userName'))
                  {{Session::get('userName')}}
                  @else

                  @endif
                </div>
                
                <div style="text-align:center;">
                  <div id="wrapper">
                    <div id="carousel">
                      <ul id="carouselUL">
                        <!-- <li><span>Image1</span></li>
                        <li><span>Image2</span></li>
                        <li><span>Image3</span></li>
                        <li><span>Image4</span></li>
                        <li><span>Image5</span></li>
                        <li><span>Image6</span></li>					 -->
                        @foreach ($books as $bookID => $book) 
                        <li><img src="{{asset('users/'.$book['bookImage'])}}"><span>{{$book['bookImage']}}</span></li>
                        @endforeach
                      </ul>
                      <div class="clearfix"></div>
                      <a id="prev" class="prev" href="#">&lt;</a>
                      <a id="next" class="next" href="#">&gt;</a>
                      <br>
                      <div id="pager" class="pager"></div>
                    </div>
                  </div>
                </div>

            </div>


    </body>
</html>
<script>
  $(function() {
    $('#carousel ul').carouFredSel({
      prev: '#prev',
      next: '#next',
      pagination: "#pager",
      scroll: 1000
    });
  });
</script>