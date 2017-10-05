<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ex-change</title>
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!--Font awesome-->
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

        <!-- include carouFredSel plugin -->
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>

        <!-- optionally include helper plugins -->
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.touchSwipe.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.transit.min.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('js/jquery.ba-throttle-debounce.min.js')}}"></script>
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
                top: 50;
                bottom: 250;
                left: 250;
                right: 250;
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
            .addBookInput {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
            }

            /* Scrolling bar */
            #wrapper {
              /* width: 100%;
              height: 220px;
              margin: -110px 0 0 -367px;
             
              left: 50%;
              top: 50%; */
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
            }
            #carousel li {
              background: transparent url({{asset('img/carousel_polaroid.png')}}) no-repeat 0 0;
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
              left: -3%;
            }
            #carousel .prev:hover {
              left: -3.1%;
            }			
            #carousel .next {
              background-position: -18px 0;
              right: 0%;
            }
            #carousel .next:hover {
              right: 0.1%;
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
            .itemButton {
              -moz-box-shadow: 0px 10px 14px -7px #3e7327;
              -webkit-box-shadow: 0px 10px 14px -7px #3e7327;
              box-shadow: 0px 10px 14px -7px #3e7327;
              background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
              background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
              background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
              background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
              background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
              background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
              background-color:#77b55a;
              -moz-border-radius:4px;
              -webkit-border-radius:4px;
              border-radius:4px;
              border:1px solid #4b8f29;
              display:inline-block;
              cursor:pointer;
              color:#ffffff;
              font-family:Arial;
              font-size:13px;
              font-weight:bold;
              padding:12px 27px;
              text-decoration:none;
              text-shadow:0px 1px 0px #5b8a3c;
            }
            .itemButton:hover {
              background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
              background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
              background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
              background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
              background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
              background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
              background-color:#72b352;
            }
            .itemButton:active {
              position:relative;
              top:1px;
            }
            .itemButton1 {
              -moz-box-shadow: 0px 10px 14px -7px #276873;
              -webkit-box-shadow: 0px 10px 14px -7px #276873;
              box-shadow: 0px 10px 14px -7px #276873;
              background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
              background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
              background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
              background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
              background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
              background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
              background-color:#599bb3;
              -moz-border-radius:4px;
              -webkit-border-radius:4px;
              border-radius:4px;
              border:1px solid #29668f;
              display:inline-block;
              cursor:pointer;
              color:#ffffff;
              font-family:Arial;
              font-size:13px;
              font-weight:bold;
              padding:12px 27px;
              text-decoration:none;
              text-shadow:0px 1px 0px #3d768a;
            }
            .itemButton1:hover {
              background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
              background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
              background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
              background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
              background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
              background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
              background-color:#408c99;
            }
            .itemButton1:active {
              position:relative;
              top:1px;
            }
            .bookType {
              height: 40px;
              width: 100%;
            }
        </style>
    </head>

    <body>
        @include('header')
        <div class="flex-center position-ref full-height">
            <div class="content">
                @if (isset($getAddBookForm))
                <h1>Add New Book</h1>
                <form action="{{route('postAddBookForm')}}" style="border:1px solid #ccc" id="addNebookForm" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <label><b>Book Type</b></label>
                  <!-- <input type="text" name="bookType" placeholder="Book Type" class="addBookInput" required/><br> -->

                  <select id="bookType" name="bookType" class="bookType" required>
                      <option value =''>Select A Book Type</option>
                      @foreach ($bookTypes as $key => $bookType)
                      <option value ='{{$bookType["typeID"]}}'>{{$bookType['typeName']}}</option>
                      @endforeach
                  </select>
                  <label><b>Book Name</b></label>
                  <input type="text" name="bookName" placeholder="Book Name" class="addBookInput" required/><br>
                  <label><b>Book Title</b></label>
                  <input type="text" name="bookTitle" placeholder="Book Title" class="addBookInput" required/><br>
                  <label><b>Book Author</b></label>
                  <input type="text" name="bookAuthor" placeholder="Book Author" class="addBookInput" required/><br>
                  <label><b>Book Date</b></label>
                  <input type="date" name="bookDate" placeholder="Book Date" class="addBookInput datepicker"  required/><br>
                  <label><b>Book Publisher</b></label>
                  <input type="text" name="bookPublisher" placeholder="Book Publisher" class="addBookInput" required/><br>
                  <label><b>Book Edition</b></label>
                  <input type="text" name="bookEdition" placeholder="Book Edition" class="addBookInput" required/><br>
                  <label><b>Book Description</b></label>
                  <input type="textarea" name="bookDescription" placeholder="Book Description" class="addBookInput" required/><br>
                  <label><b>Book Price</b></label>
                  <input type="number" name="bookPrice" placeholder="Book Price" class="addBookInput" step="0.01" required/><br>
                  <label><b>Upload Image</b></label>
                    <input type="file" name="file" accept="image/*" class="addBookInput" style="font-size: larger;"/>
                  <button type="submit" class ='myButton' style="width: 100%;">Submit</button>
                </form>

                @else
                <div class="title m-b-md">
                    My Books
                </div>
                  @if (isset($userBooks))
                    @if (empty($userBooks))
                        <p>This user has no any book</p>
                        <a href="{{route('getAddBookForm')}}"><button class ='myButton'>Add New book</button></a>
                    @else
                        <div id="wrapper">
                            <div id="carousel">
                            <ul>
                                @foreach ($userBooks as $userBook) 

                                    <li><img src="{{asset('users/'.$userBook['bookImage'])}}">
                                    <br><br>
                                    <button class="itemButton">Edit</button>
                                    <span></span>
                                    </li>

                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                            <a id="prev" class="prev" href="#">&lt;</a>
                            <a id="next" class="next" href="#">&gt;</a>
                            <br>
                            <div id="pager" class="pager"></div>
                            </div>
                            <br>
                            <a href="{{route('getAddBookForm')}}"><button class ='myButton'>Add New book</button></a>
                        </div>

                        
                    @endif
                  @endif
               @endif
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
      scroll: 1000,
      auto: false
    });
    
  });

</script>
