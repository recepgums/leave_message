<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Note</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script >
        $(document).ready(function(){
            $("#hamburger_menu_icon").click(function(){
                $("#left_nav_content").toggle("fast");
                $("#contents").toggleClass("col-10 col-12");
            });
        });
    </script>
</head>
<body class="bg-dark" style="width: 100%/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">



<div class="pb-2"  style="display: flex;color: #0c673b;border-bottom-color: #28A745;border: 5px solid #28A745;border-top-color: white;border-right-color: white;border-left-color: white;position: -webkit-sticky;position: sticky;z-index: 1;top: 0px;background-color: white">
    <div class="row" >
        <div class="col-3 d-none d-md-block" id="hamburger_menu_icon">
            <div class="col-md" style="cursor:pointer;color: #0c673b;font-size: 25px">&#9776;</div>
        </div>
        <div class="col-9">
            <h4  style="text-align:center;color:#0c673b;justify-content: center" class="d-none d-md-block">{{env('APP_NAME')}}</h4>
            <span style="text-align:center;color:#0c673b;justify-content: center;font-size: 15px;" class="d-xs-block d-md-none text-center">{{env('APP_NAME')}}</span>
        </div>
    </div>
    <div class="col-9">
        <div class="col-sm text-center">
            <div class=" align-items-center justify-content-center" style="height: 20%;padding-left: 20px">
                <form action="{{route('show_private_room')}}" method="get"  >
                    @csrf
                    <div class="input-group justify-content-center"  >
                        <input class="form-control col-xl-6" type="text" name="room_number" placeholder="Room Number..."/>
                        <span class="input-group-addon">&nbsp; </span>
                        <input class="btn btn-success" type="submit" value="Entry"/>
                    </div>
                </form>
            </div>
            @if ($errors->any())
                <div >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>{{--
    <div class="col-3" style="flex:3;top: 1px;right: 3em;" >
        <div class=" row align-items-start mt-1" >
            @if (Route::has('login'))
                <div class="justify-content-center d-none d-md-block">
                    @auth
                        <a  style="color: #0c673b" class="btn btn-outline-light btn-sm " href="{{ url('/home') }}">Home</a>
                    @else
                        <a  style="color: #0c673b" class="btn btn-outline-light btn-sm " href="{{ route('login') }}">Log In</a>

                        @if (Route::has('register'))
                            <a  style="color: #0c673b" class="btn btn-outline-light btn-sm " href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>--}}
</div>
<div class="row">
    <div id="left_nav_content " class="col-2 d-none d-md-block"
         style="border: 5px solid #28A745;border-top-color: #343a40; ">
        <div class="row" style="height: auto;position: -webkit-sticky;position: sticky;top: 20px;">
            <div class="col">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active list-group-item-success py-3 py-3 "
                       id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3 "
                       data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Create Stream</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3"
                       data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream1</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3"
                       data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream2</a>
                </div>
                <div class="list-group" role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 active"
                       data-toggle="list" href="#" role="tab" aria-controls="settings">Most Populer Rooms</a>
                    @foreach($popular_rooms as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success py-3"
                           href="./private_room?&room_number={{$item->room_number}}">{{$item->room_number}}</a>
                    @endforeach
                </div>
                <div class="list-group" role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 active"
                       data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Empty Rooms</a>
                    @foreach($temp as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success py-3"
                           href="./private_room?&room_number={{$item}}">{{$item}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12" id="contents">
        <div class="col" style="align-items: center">
            <div class="row " style="text-align: center;justify-content: center;">
                <div class="pt-2"
                     style="float:left;width: 100%;position: relative;"><!--height 70% idi-->
                    <div id="app">
                        <example-component csrf="{{ csrf_token() }}"></example-component>
                    </div>
                    <script src="{{ mix('/js/app.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
</html>
