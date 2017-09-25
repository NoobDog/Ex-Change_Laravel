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
            .inputfile {
            	width: 0.1px;
            	height: 0.1px;
            	opacity: 0;
            	overflow: hidden;
            	position: absolute;
            	z-index: -1;
            }
        </style>
    </head>

    <body>
        @include('header')
        <!-- <form class="search" >
          <input type="text" class="searchTerm"/>
          <button class="myButton">Search</button>
        </form> -->
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    My Books
                </div>
                @if (isset($getAddBookForm))
                <h1>Add New Book</h1>
                <form action="{{route('postAddBookForm')}}" style="border:1px solid #ccc" id="addNebookForm" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <label><b>Book Type</b></label>
                  <input type="text" name="bookType" placeholder="Book Type" class="addBookInput"/><br>
                  <label><b>Book Name</b></label>
                  <input type="text" name="bookName" placeholder="Book Name" class="addBookInput"/><br>
                  <label><b>Book Title</b></label>
                  <input type="text" name="bookTitle" placeholder="Book Title" class="addBookInput"/><br>
                  <label><b>Book Author</b></label>
                  <input type="text" name="bookAuthor" placeholder="Book Author" class="addBookInput"/><br>
                  <label><b>Book Date</b></label>
                  <input type="date" name="bookDate" placeholder="Book Date" class="addBookInput"/><br>
                  <label><b>Book Publisher</b></label>
                  <input type="text" name="bookPublisher" placeholder="Book Publisher" class="addBookInput"/><br>
                  <label><b>Book Edition</b></label>
                  <input type="text" name="bookEdition" placeholder="Book Edition" class="addBookInput"/><br>
                  <label><b>Book Description</b></label>
                  <input type="textarea" name="bookDescription" placeholder="Book Description" class="addBookInput"/><br>
                  <label><b>Upload Image</b></label>
                  <input type="file" name="file" accept="image/*" /><br>
                  <button type="submit" class ='myButton'>Submit</button>

                </form>

                @else
                  @if (isset($userBooks))
                    @if (empty($userBooks))
                        <p>This user has no any book</p>
                        <a href="{{route('getAddBookForm')}}"><button class ='myButton'>Add New book</button></a>
                    @else
                        <p>yes books</p>
                        @foreach ($userBooks as $userBook)
                            <p>{{ $userBook['bookName'] }}</p>
                            @if ($userBook['bookImage'] != '')
                              <img src="{{asset(users/).Session::get('userEmail').$userBook['bookImage']}}"/>
                            @endif
          
                        @endforeach
                        <a href="{{route('getAddBookForm')}}"><button class ='myButton'>Add New book</button></a>
                    @endif
                  @endif
               @endif
            </div>
        </div>
    </body>
</html>
