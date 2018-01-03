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
        <link rel="stylesheet" href="{{asset('css/help.css')}}">
    </head>
    <body>
        @include('header')
        <h3 class="sub-title"> About Ex-change:</h3>
            <p class="sub-content">
            The book is the ladder of human progress, and most people have at least one book in their life. 
            For students, they have to buy test books for their courses. When these courses are finished, 
            those books won’t be used any more. For other people, 
            most of them have some books which are not used any more. 
            For encouraging reading and recycling old books, there is a web application, 
            which name is EX-change (exchange). This Web application is a good platform for people to exchange their old books. 
            People only need to register as a member, and post their old books to this web, and their books will be showed on this page. If other people want to get those books, they can send a request to those books’ owners. This request could ask books’ owners to exchange those books with other books, or could use points to exchange those books. 
            This Web is an idea for exchange books, and the main point is helping people get their favorite books to read.
            </p>
        <h3 class="sub-title"> Contact Us: </h3>
        <ul class="userLists">
            @foreach ($users as $user)
                <li class=" @if($user['isVoid']) Void @endif @if($user['isWarning']) Warning @endif">
                    <img src="{{asset('icons/'.$user['userIcon'])}}"/>
                    <h3>{{$user['userName']}}</h3>
                    <h3><a href="mailto:{{$user['userEmail']}}">{{$user['userEmail']}}</a></h3>
                </li>
            @endforeach
        </ul>
        @include('footer')
    </body>
    

</html>

</script>