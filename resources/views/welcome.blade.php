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
    </head>

    <body>
        @include('header')
        <form class="search" >
          <input type="text" class="searchTerm"/>
          <button class="myButton">Search</button>
        </form>
            <div class="content">
                <!-- <div class="title m-b-md">
                  @if (Session::has('userName'))
                    {{Session::get('userName')}}
                  @else

                  @endif
                </div> -->

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
                          <a href='#'><button class="itemButton1">Add to Cart</button></a>
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