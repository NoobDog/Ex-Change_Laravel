<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- sly -->
        <script src="{{ asset('js/sly.js') }}"></script>
        <script src="{{ asset('js/jquery-easing.js') }}"></script>
        <script src="{{ asset('js/horizontal.js') }}"></script>
        <script src="{{ asset('js/modernizr.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
		    <script type="text/javascript" src="{{asset('js/jquery.als-1.7.min.js')}}"></script>

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


            header ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            header ul li {
                display: inline-block;
                padding: 0 20px;
            }

            header ul a {
                font-weight: 700;
                text-decoration: none;
                color: #4d4d4d;
                height: 50px;
                display: block;
                position: relative;
            }

            header ul a span {
                position: relative;
                top: 50%;
                transform: translateY(-50%);
                display: inline-block;
            }

            section {
                float: left;
                display: block;
                height: 100%;
                padding: 75px 0 0 0;
                margin: 0;
            }

            #section-section1 {
                background: #2c3e50;
            }

            #section-section2 {
                background: #16a085;
            }

            #section-section3 {
                background: #27ae60;
            }

            #section-section4 {
                background: #c0392b;
            }

            .horizon-prev, .horizon-next {
                position: fixed;
                top: 50%;
                margin-top: -24px;
                z-index: 9999;
            }

            .horizon-prev {
                left: 20px;
            }

            .horizon-next {
                right: 20px;
            }
        </style>
    </head>

    <body>
        @include('header')
        <form class="search" >
          <input type="text" class="searchTerm"/>
          <button class="myButton">Search</button>
        </form>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  @if (Session::has('userName'))
                  {{Session::get('userName')}}


                  @else


                  @endif
                </div>
                <div>
                  {{print_r($books)}}

                  <div id="lista1" class="als-container">
                    <span class="als-prev"><img src="images/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
                    <div class="als-viewport">
                      <ul class="als-wrapper">
                        <li class="als-item"><img src="images/als-images/calculator.png" alt="calculator" title="calculator" />calculator</li>
                        <li class="als-item"><img src="images/als-images/light_bulb.png" alt="light bulb" title="light bulb" />light bulb</li>
                        <li class="als-item"><img src="images/als-images/card.png" alt="card" title="card" />card</li>
                        <li class="als-item"><img src="images/als-images/chess.png" alt="chess" title="chess" />chess</li>
                        <li class="als-item"><img src="images/als-images/clock.png" alt="alarm clock" title="alarm clock" />alarm clock</li>
                        <li class="als-item"><img src="images/als-images/cut.png" alt="scissors" title="scissors" />scissors</li>
                        <li class="als-item"><img src="images/als-images/heart.png" alt="heart" title="heart" />heart</li>
                        <li class="als-item"><img src="images/als-images/map.png" alt="pin" title="pin" />pin</li>
                        <li class="als-item"><img src="images/als-images/mobile_phone.png" alt="mobile phone" title="mobile phone" />mobile phone</li>
                        <li class="als-item"><img src="images/als-images/camera.png" alt="camera" title="camera" />camera</li>
                        <li class="als-item"><img src="images/als-images/music_note.png" alt="music note" title="music note" />music note</li>
                        <li class="als-item"><img src="images/als-images/protection.png" alt="umbrella" title="umbrella" />umbrella</li>
                        <li class="als-item"><img src="images/als-images/television.png" alt="television" title="television" />television</li>
                      </ul>
                    </div>
                    <span class="als-next"><img src="images/thin_right_arrow_333.png" alt="next" title="next" /></span>
                  </div>

                </div>

            </div>
        </div>
    </body>
</html>

<script>

$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 4,
					scrolling_items: 2,
					orientation: "horizontal",
					circular: "yes",
					autoscroll: "no",
					interval: 5000,
					speed: 500,
					easing: "linear",
					direction: "right",
					start_from: 0
				});
				
				$("#lista2").als({
					visible_items: 2,
					scrolling_items: 1,
					orientation: "vertical",
					circular: "yes",
					autoscroll: "no",
					start_from: 1
				});
				
				//logo hover
				$("#logo_img").hover(function()
				{
					$(this).attr("src","images/als_logo_hover212x110.png");
				},function()
				{
					$(this).attr("src","images/als_logo212x110.png");
				});
				
				//logo click
				$("#logo_img").click(function()
				{
					location.href = "http://als.musings.it/index.php";
				});
				
				$("a[href^='http://']").attr("target","_blank");
				$("a[href^='http://als']").attr("target","_self");
			});
</script>
