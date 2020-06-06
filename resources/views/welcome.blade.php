<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163766453-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163766453-1');
    </script>--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Note</title>
    <script src="{{asset('js/jscolor.js')}}"></script>
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
        #progress-wrp {
            border: 1px solid #0099CC;
            padding: 1px;
            position: relative;
            height: 30px;
            border-radius: 3px;
            margin: 10px;
            text-align: left;
            background: #fff;
            box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
        }

        #progress-wrp .progress-bar {
            height: 100%;
            border-radius: 3px;
            background-color: #f39ac7;
            width: 0;
            box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
        }

        #progress-wrp .status {
            top: 3px;
            left: 50%;
            position: absolute;
            display: inline-block;
            color: #000000;
        }

    </style>
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
<body onload="page_loaded()" class="" style="width: 100%/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">


<div class="pb-2"  style="display: flex;color: #0c673b;border-bottom-color: #28A745;border: 5px solid #28A745;border-top-color: white;border-right-color: white;border-left-color: white">
    <div class="row">
        <div class="col-3" id="hamburger_menu_icon">
            <div class="col-md" style="cursor:pointer;color: #0c673b;font-size: 25px">&#9776;</div>
        </div>
        <div class="col-9">
            <h4  style="text-align:center;color:#0c673b;justify-content: center">Leave Note</h4>
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
    </div>
    <div class="col-3" style="flex:3;top: 1px;right: 3em;" >
        <div class=" row align-items-start mt-1" >
            @if (Route::has('login'))
                <div class="justify-content-center">
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

<div class="row mt-2">
    <div id="left_nav_content" class="col-2" style="border: 5px solid #28A745;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745;">
        <div class="row">
            <div class="col">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active list-group-item-success" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-success"  data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Create Stream</a>
                    <a class="list-group-item list-group-item-action list-group-item-success"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream1</a>
                    <a class="list-group-item list-group-item-action list-group-item-success"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream2</a>
                </div>
                <div class="list-group"  role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success active"   data-toggle="list" href="#" role="tab" aria-controls="settings">Most Populer Rooms</a>
                    @foreach($popular_rooms as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success"  href="./private_room?&room_number={{$item->room_number}}" >{{$item->room_number}}</a>
                    @endforeach
                </div>
                <div class="list-group"  role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success active"  data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Empty Rooms</a>
                    @foreach($temp as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success"  href="./private_room?&room_number={{$item}}" >{{$item}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-10" id="contents">
        <div class="col" >
            <div class="container p-0">
                <div class="row align-self-center align-items-center text-center container ml-0" style="background-color: white;width: 100%;">
                    <div class="col-sm text-center" >
                        <div class=" align-items-center justify-content-center text-center" style="height: 20%">
                            <form id="file_upload_form"  method="post" enctype="multipart/form-data">
                                @csrf
                                <textarea  class="form-control col-xl-12"  type="text" name="title" id="title" placeholder="Share a youtube link or any text..." required></textarea>

                                <div class="input-group justify-content-center align-items-center mt-2"  >
                                    <input class="form-control col-xl-1" id="file_input" type="file" name="file"   style="display: none;font-size: 5px"/>
                                    <input type="button" class="btn" value="Browse..." onclick="document.getElementById('file_input').click();" />
                                    <input class="form-control col-xl-11" type="password" style="width:50%;margin-left: 8px;display: none" placeholder="Optional password..." id="password_input" name="password" />
                                </div>

                                <div style="text-align: center" class="mt-3">
                                    <input id="send_button" class="btn btn-success"  style="width: 100%" type="button" value="Send" />
                                </div>
                            </form>
                            <div id="progress-wrp" style="display: none">
                                <div class="progress-bar"></div>
                                <div class="status">0%</div>
                            </div>
                            @if (isset($file_size_error))
                                <div >
                                    <ul>
                                        <li class="text-danger">{{$file_size_error}}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script >
            var Upload = function (file) {
                this.file = file;
            };

            Upload.prototype.getType = function() {
                return this.file.type;
            };
            Upload.prototype.getSize = function() {
                return this.file.size;
            };
            Upload.prototype.getName = function() {
                return this.file.name;
            };
            Upload.prototype.doUpload = function () {
                var that = this;
                var formData = new FormData();

                // add assoc key values, this will be posts values
                formData.append("file", this.file, this.getName());
                formData.append("title",$("#title").val());
                formData.append("password",$("#password_input").val());
                //datalar buyaya yazılıyor.
                formData.append("upload_file", true);

                $.ajax({
                    type: "POST",
                    url: "create_global",
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener('progress', that.progressHandling, false);
                        }
                        return myXhr;
                    },
                    success: function (data) {
                        // your callback here
                    },
                    error: function (error) {
                        console.log(error);
                    },
                    async: true,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 60000
                });
            };

            Upload.prototype.progressHandling = function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                var progress_bar_id = "#progress-wrp";
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                // update progressbars classes so it fits your code
                $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
                $(progress_bar_id + " .status").text(percent + "%");
                if (percent==100){
                    $("#file_upload_form").trigger('reset');
                    $("#progress-wrp").fadeOut();
                    $("#password_input").hide();
                }
            };

        </script>
        <script >
            $("#send_button").click( function (e) {
                //form submit edilidiğinde file inputundan files elementini çkip devam edebilir.böylece send tuşuna basınca başlar
                var degisken = $("#file_input");
                var file = degisken[0].files[0];
                if(!file && $("#title").val()){
                    $.ajax({
                        type: "POST",
                        url: "create_global",
                        data: {title:$("#title").val()},
                        success: function (data) {
                            $("#title").val("")
                        },
                    });
                }else{
                    var upload = new Upload(file);
                    $("#progress-wrp").show();
                    // maby check size or type here with upload.getSize() and upload.getType()

                    // execute upload
                    upload.doUpload();
                }

            });


        </script>
        <div class="col">
            <div class="row" style="text-align: center;justify-content: center;">

                <div class=" mb-2 ml-3"
                    style="overflow-y:scroll;height: 1000px;float:left;width: 100%;">
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
