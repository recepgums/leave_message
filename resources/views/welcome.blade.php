<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163766453-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163766453-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Note</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 400;
            height: 100%;
            width: 100%;
            margin: 0;
            overflow-x: hidden;
        }
        .full-width{
            width: 100%;
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
        .busacmabirdeneme{
            cursor: pointer;
            justify-content: center;
            text-align: center;
            background-color: white;
            color:black
        }
        .busacmabirdeneme:hover{
            cursor: pointer;
            justify-content: center;
            text-align: center;
            background-color: green;
            color:white
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
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .one-edge-shadow {
            -webkit-box-shadow: 0 8px 6px -6px black;
            -moz-box-shadow: 0 8px 6px -6px black;
            box-shadow: 0 8px 6px -6px black;
        }
        .shadow {
            -moz-box-shadow: 0 0 6px #000;
            -webkit-box-shadow: 0 0 6px #000;
            box-shadow: 0 0 6px #000;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .iframe-container{
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
        }
        .iframe-container iframe{
            position: absolute;
            top:7%;
            left: 7%;
            width: 85%;
            height: 80%;
        }
        html{ overflow-y: scroll;}
    </style>
</head>
<body onload="page_loaded()" class="" style="width: 100%/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">

<div style="display: flex;background-color: #0c673b">
    <div id="tab-2" class="mt-1" style="flex:6">
        <div>
            <h4  style="text-align:center;color:white;justify-content: center">Leave Note</h4>
        </div>
    </div>
    <div style="flex:3;" >
        <div class=" row align-items-start mt-1" >
            @if (Route::has('login'))
                <div class="justify-content-center">
                    @auth
                        <a class="btn btn-outline-light btn-sm " href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-outline-light btn-sm " href="{{ route('login') }}">Log In</a>

                        @if (Route::has('register'))
                            <a class="btn btn-outline-light btn-sm " href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>

{{--<div class="col-md col-sm col-lg p-2" style="display: flex;background-color: gray;height: auto;overflow-x: scroll">
    <div id="quiz" style="flex:4" >
        <quiz>

        </quiz>
    </div>
    --}}{{--<div style="flex: 1" class="shadow" >
        <div class="card card-small shadow " style="width: 288px;">
            <form action="{{route('create_survey')}}" method="post">
                @csrf
                <div class="card-header " style="background-color: #152632;color:white;font-size: 20px;text-align: center;">
                    <input name="question_title" type="text" class="form-control " placeholder="Ask a question...">
                </div>
                <div id="options_parent" class="list-group list-group-flush p-2" >
                    <input id="answer" name="answer" style="border-color: #28A745;border-width: 2px" class="form-control mb-1" type="text" placeholder="Answer of question..." required>
                    <input id="option_2" name="option_2" class="form-control" type="text" placeholder="Other option one..." required >
                    <input id="option_3" style="display: none" name="option_3" class="form-control" type="text" placeholder="Other option two..."  >
                    <input id="option_4" style="display: none" name="option_4" class="form-control" type="text" placeholder="Other option three..."  >
                </div>
                <div class="row ml-1">
                    <div class="col-7">
                        <a id="new_options_button" onclick="new_input()" class="btn btn-dark text-white">New Options</a>
                    </div>
                    <div class="col-5">
                        <input class="btn btn-success" type="submit" value="Share">
                    </div>
                </div>
            </form>
        </div>
    </div>--}}{{--
</div>--}}

<br>
<div class="container p-0">
    <div class="row align-self-center align-items-center text-center container ml-0" style="background-color: white;width: 100%;">
        <div class="col-sm text-center" >
            <div class=" align-items-center justify-content-center text-center" style="height: 20%">
                <form action="{{route('create_global')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea  class="form-control col-xl-12"  type="text" name="title" placeholder="Share a youtube link or any text..." required></textarea>

                    <div class="input-group justify-content-center align-items-center mt-2"  >
                        <input class="form-control col-xl-1" id="file_input" type="file" name="file"   style="display: none;font-size: 5px"/>
                        <input type="button" class="btn" value="Browse..." onclick="document.getElementById('file_input').click();" />
                        <input class="form-control col-xl-11" type="password" style="width:50%;margin-left: 8px;display: none" placeholder="Optional password..." id="password_input" name="password" />
                    </div>
                    <div style="text-align: center" class="mt-3"><input class="btn btn-success"  style="width: 100%" type="submit" value="Send"></div>
                </form>
                @if (isset($file_size_error))
                    <div >
                        <ul>
                            <li class="text-danger">{{$file_size_error}}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-sm text-center">
            <h4 style="text-align:center;padding-top:15px;color:#28A745">Share in private room</h4>
            <small style="word-wrap: break-word;text-align:center;padding-top:15px;color:#28A745;">Choose a random numbered room to share your file with</small>
            <br><br>
            <div class=" align-items-center justify-content-center" style="height: 20%;padding-left: 20px">
                <form action="{{route('show_private_room')}}" method="get"  >
                    @csrf
                    <div class="input-group justify-content-center"  >
                        <input class="form-control col-xl-6" type="text" name="room_number" placeholder="Number..."/>
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
    </div>
</div>

<div class="row" style="text-align: center;justify-content: center;">

    <div class=" mb-2 ml-3"
        style="overflow-y:scroll;height: 1000px;float:left;width: 100%; border-style: solid;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745;border-width: 12px;margin-right: 16px ">
        <div id="app">
            <example-component></example-component>
        </div>
        <script src="/js/app.js"></script>
    </div>

    <script >
        page_loaded=()=>{
            $.get(
                "/test",
            );
        };
        let a = document.getElementById('file_input');
        let b = document.getElementById('password_input');
        a.onchange = function () {
            b.style.display= "block";
            b.style.height = "30px";
        }

    </script>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
{{--<script>
    var quiz_counter=0;
    new_input = function(){
        quiz_counter+=1;
        if(quiz_counter==1){
            $('#option_3').css('display','block');
        }
        else if(quiz_counter==2){
            $('#option_4').css('display','block');
            $('#new_options_button').css('display','none');
        }
    }
</script>--}}
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="http://127.0.0.1:6001/socket.io/socket.io.js"  ></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

</html>
