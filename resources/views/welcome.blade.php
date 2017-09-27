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

                  <!-- <div class="items">
                    <span class="thumbnail">
                        <img src="http://placehold.it/500x400" alt="...">
                        <h4>Product Tittle</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        <hr class="line">
                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                            <p class="price">$29,90</p>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <button class="btn btn-success right" > BUY ITEM</button>
                          </div>

                        </div>
                    </span>
                  </div> -->
                  <header data-role="header" id="header">
                      <nav class="menu">
                          <ul>
                              <li>
                                  <a href="#section-section1"><span>Section</span></a>
                              </li>
                              <li>
                                  <a href="#section-section2"><span>Section</span></a>
                              </li>
                              <li>
                                  <a href="#section-section3"><span>Section</span></a>
                              </li>
                              <li>
                                  <a href="#section-section4"><span>Section</span></a>
                              </li>
                          </ul>
                      </nav>
                  </header>

                  <div class="horizon-prev"><img src="images/l-arrow.png"></div>
                  <div class="horizon-next"><img src="images/r-arrow.png"></div>

                  <section data-role="section" id="section-section1"></section>
                  <section data-role="section" id="section-section2"></section>
                  <section data-role="section" id="section-section3"></section>
                  <section data-role="section" id="section-section4">
                      <div class="go-to-2">Go to panel 2 via ID.</div>
                  </section>

                  <footer data-role="footer" id="footer"></footer>





                </div>

            </div>
        </div>
    </body>
</html>

<script>
  // By default, swipe is enabled.
  $('section').horizon();
  // If you do not want to include another plugin, TouchSwipe, you can set it to false in the default options by passing in the option as false.
  //$('section').horizon({swipe: false});
  $(document).on('click', '.go-to-2', function () {
      $(document).horizon('scrollTo', 'section-section2');
  });

</script>
