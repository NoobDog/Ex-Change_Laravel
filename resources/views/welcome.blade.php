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




            /* Frame */
            .frame {
              height: 250px;
              line-height: 250px;
              overflow: hidden;
            }

            .frame ul {
              list-style: none;
              margin: 0;
              padding: 0;
              height: 100%;
              font-size: 50px;
            }

            .frame ul li {
              float: left;
              width: 227px;
              height: 100%;
              margin: 0 1px 0 0;
              padding: 0;
              background: #333;
              color: #ddd;
              text-align: center;
              cursor: pointer;
            }

            .frame ul li.active {
              color: #fff;
              background: #a03232;
            }


            /* Scrollbar */

            .scrollbar {
              margin: 0 0 1em 0;
              height: 2px;
              background: #ccc;
              line-height: 0;
            }

            .scrollbar .handle {
              width: 100px;
              height: 100%;
              background: #292a33;
              cursor: pointer;
            }

            .scrollbar .handle .mousearea {
              position: absolute;
              top: -9px;
              left: 0;
              width: 100%;
              height: 20px;
            }


            /* Pages */

            .pages {
              list-style: none;
              margin: 20px 0;
              padding: 0;
              text-align: center;
            }

            .pages li {
              display: inline-block;
              width: 14px;
              height: 14px;
              margin: 0 4px;
              text-indent: -999px;
              border-radius: 10px;
              cursor: pointer;
              overflow: hidden;
              background: #fff;
              box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .2);
            }

            .pages li:hover {
              background: #aaa;
            }

            .pages li.active {
              background: #666;
            }


            /* Controls */

            .controls {
              margin: 25px 0;
              text-align: center;
            }


            /* One Item Per Frame example*/

            .oneperframe {
              height: 300px;
              line-height: 300px;
            }

            .oneperframe ul li {
              width: 1140px;
            }

            .oneperframe ul li.active {
              background: #333;
            }


            /* Crazy example */

            .crazy ul li:nth-child(2n) {
              width: 100px;
              margin: 0 4px 0 20px;
            }

            .crazy ul li:nth-child(3n) {
              width: 300px;
              margin: 0 10px 0 5px;
            }

            .crazy ul li:nth-child(4n) {
              width: 400px;
              margin: 0 30px 0 2px;
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
<div class="wrap">
  <div class="scrollbar">
    <div class="handle">
      <div class="mousearea"></div>
    </div>
  </div>

  <div class="frame" id="basic">
    <ul class="clearfix">
      <li>0</li>
      <li>1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
      <li>7</li>
      <li>8</li>
      <li>9</li>
      <li>10</li>
      <li>11</li>
      <li>12</li>
      <li>13</li>
      <li>14</li>
      <li>15</li>
      <li>16</li>
      <li>17</li>
      <li>18</li>
      <li>19</li>
      <li>20</li>
      <li>21</li>
      <li>22</li>
      <li>23</li>
      <li>24</li>
      <li>25</li>
      <li>26</li>
      <li>27</li>
      <li>28</li>
      <li>29</li>
    </ul>
  </div>

  <ul class="pages"></ul>

  <div class="controls center">
    <button class="btn prevPage"><i class="icon-chevron-left"></i><i class="icon-chevron-left"></i> page</button>
    <button class="btn prev"><i class="icon-chevron-left"></i> item</button>
    <button class="btn backward"><i class="icon-chevron-left"></i> move</button>

    <div class="btn-group">
      <button class="btn toStart">toStart</button>
      <button class="btn toCenter">toCenter</button>
      <button class="btn toEnd">toEnd</button>
    </div>

    <div class="btn-group">
      <button class="btn toStart" data-item="10"><strong>10</strong> toStart</button>
      <button class="btn toCenter" data-item="10"><strong>10</strong> toCenter</button>
      <button class="btn toEnd" data-item="10"><strong>10</strong> toEnd</button>
    </div>

    <div class="btn-group">
      <button class="btn add"><i class="icon-plus-sign"></i></button>
      <button class="btn remove"><i class="icon-minus-sign"></i></button>
    </div>

    <button class="btn forward">move <i class="icon-chevron-right"></i></button>
    <button class="btn next">item <i class="icon-chevron-right"></i></button>
    <button class="btn nextPage">page <i class="icon-chevron-right"></i><i class="icon-chevron-right"></i></button>
  </div>
</div>





                </div>

            </div>
        </div>
    </body>
</html>
