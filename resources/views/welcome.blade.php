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


        <!-- include carouFredSel plugin -->
        <script type="text/javascript" language="javascript" src="{{asset('jquery.carouFredSel-6.2.1-packed.js')}}"></script>

        <!-- optionally include helper plugins -->
        <script type="text/javascript" language="javascript" src="{{asset('jquery.mousewheel.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('jquery.touchSwipe.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('jquery.transit.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('jquery.ba-throttle-debounce.min.js')}}"></script>
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


            .wrapper {
				background-color: white;
				width: 480px;
				margin: 40px auto;
				padding: 50px;
				box-shadow: 0 0 5px #999;
			}
			.list_carousel {
				background-color: #ccc;
				margin: 0 0 30px 60px;
				width: 360px;
			}
			.list_carousel ul {
				margin: 0;
				padding: 0;
				list-style: none;
				display: block;
			}
			.list_carousel li {
				font-size: 40px;
				color: #999;
				text-align: center;
				background-color: #eee;
				border: 5px solid #999;
				width: 50px;
				height: 50px;
				padding: 0;
				margin: 6px;
				display: block;
				float: left;
			}
			.list_carousel.responsive {
				width: auto;
				margin-left: 0;
			}
			.clearfix {
				float: none;
				clear: both;
			}
			.prev {
				float: left;
				margin-left: 10px;
			}
			.next {
				float: right;
				margin-right: 10px;
			}
			.pager {
				float: left;
				width: 300px;
				text-align: center;
			}
			.pager a {
				margin: 0 5px;
				text-decoration: none;
			}
			.pager a.selected {
				text-decoration: underline;
			}
			.timer {
				background-color: #999;
				height: 6px;
				width: 0px;
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


                <div class="list_carousel">
                  <ul id="foo2">
                    <li>c</li>
                    <li>a</li>
                    <li>r</li>
                    <li>o</li>
                    <li>u</li>
                    <li>F</li>
                    <li>r</li>
                    <li>e</li>
                    <li>d</li>
                    <li>S</li>
                    <li>e</li>
                    <li>l</li>
                    <li> </li>
                  </ul>
                  <div class="clearfix"></div>
                  <a id="prev2" class="prev" href="#">&lt;</a>
                  <a id="next2" class="next" href="#">&gt;</a>
                  <div id="pager2" class="pager"></div>
                </div>




            </div>
        </div>
    </body>
</html>
<script>
		$(function() {

				//	Scrolled by user interaction
				$('#foo2').carouFredSel({
					auto: false,
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				});

			});
</script>