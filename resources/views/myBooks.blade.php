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
        <link rel="stylesheet" href="{{asset('css/myBooks.css')}}">
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
