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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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
            width: 100%;
            text-align: left;
            background: #fff;
            box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
        }

        #progress-wrp .progress-bar {
            height: 100%;
            border-radius: 3px;
            background-color: #2ceb54;
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
<body class="" style="width: 100%/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">



<div class="pb-2"  style="display: flex;color: #0c673b;border-bottom-color: #28A745;border: 5px solid #28A745;border-top-color: white;border-right-color: white;border-left-color: white;position: -webkit-sticky;position: sticky;z-index: 1;top: 0px;background-color: white">
    <div class="row" >
        <div class="col-3 d-none d-md-block" id="hamburger_menu_icon">
            <div class="col-md" style="cursor:pointer;color: #0c673b;font-size: 25px">&#9776;</div>
        </div>
        <div class="col-9">
            <h4  style="text-align:center;color:#0c673b;justify-content: center" class="d-none d-md-block">Leave Note</h4>
            <span  style="text-align:center;color:#0c673b;justify-content: center;font-size: 15px;" class="d-xs-block d-md-none">LeaveNote</span>
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
    </div>
</div>

<div class="row mt-2 ">
    <div id="left_nav_content " class="col-2 d-none d-md-block" style="border: 5px solid #28A745;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745; ">
        <div class="row " style="height: auto;position: -webkit-sticky;position: sticky;top: 20px;">
            <div class="col ">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active list-group-item-success py-3 py-3 " id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3 "  data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Create Stream</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream1</a>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 py-3"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Active Stream2</a>
                </div>
                <div class="list-group"  role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 active"   data-toggle="list" href="#" role="tab" aria-controls="settings">Most Populer Rooms</a>
                    @foreach($popular_rooms as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success py-3"  href="./private_room?&room_number={{$item->room_number}}" >{{$item->room_number}}</a>
                    @endforeach
                </div>
                <div class="list-group"  role="tablist">
                    <br>
                    <a class="list-group-item list-group-item-action list-group-item-success py-3 active"  data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Empty Rooms</a>
                    @foreach($temp as $item)
                        <a class="list-group-item list-group-item-action list-group-item-success py-3"  href="./private_room?&room_number={{$item}}" >{{$item}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12" id="contents">
        <div class="col "  style="align-items: center">
            <div class="row">
                @isset($link_data)
                    <div class="d-flex flex-wrap text-center" style="text-align:center">
                            <div   class="p-3" style="width:280px;height:300px;">
                                <div class="card card-small card-post mb-4 shadow" name="kart" style=" width: 100%;height:100%;border-radius: 20px">
                                    <div class="card-header " style="background-color: #28A745;border-radius:20px 20px 0px 0px ">
                                    </div>
                                    <div class="card-body row text-center" style="height:10px;">
                                        <h5 v-else class="col-12 text-center">@isset($link_data->title) {{$link_data->title}}@endisset</h5>
                                        @if(isset($link_data->password))
                                            <div class="text-center" style="margin-left: auto;margin-right: auto;">
                                                <br>
                                                <input style="width: auto;margin-left: auto;margin-right: auto;" v-model="item.new_password" class=" align-self-center form-control mx-sm-3" type="password"
                                                       placeholder="Password..." name="file_password_confirm"> <br>
                                                <span  class="btn btn-success">Download</span>
                                            </div>
                                        @else
                                            <div class="text-center full-width ">
                                                <a href="/storage/get_link/{{$link_data->file_name}}" target="_blank" class="card-text    text-center"
                                                   style="text-align: center;">
                                                    Download File
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer border-top"   style="background-color: #28A745;border-radius:0px 0px 20px 20px">
                                        <div style="text-align: right">
                                            <small class="text-white">{{$link_data->created_at}} </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                @endisset
                <div style="display:none" class="col"  ondrop="alert('2sds');" ondragover="document.getElementById('areaDrop').style.backgroundColor='red'"
                     ondragleave="document.getElementById('areaDrop').style.backgroundColor='white'" >
                    <div class="card card-small card-post mb-4" id="areaDrop" style="border-radius: 20px;text-align: center;width: 100%;align-items: center;border-color: #28A745;border-style: dashed ;">
                        <form  style="text-align: center" id="file_upload_form"   method="post" enctype="multipart/form-data">
                            <div class="card-body row " style="align-items: center">

                                @csrf
                                <textarea  class="form-control col-xl-12"  type="text" name="title" id="title" placeholder="Share a youtube link or any text..." required></textarea>

                                <div class=" justify-content-center align-items-center full-width mt-2"  >
                                    <input class="form-control col-xl-1" id="file_input" multiple type="file" name="file"   style="display: none;font-size: 5px"/>
                                    <button type="button" class="btn " style="background-color: #28A745;border-radius: 15px;" onclick="document.getElementById('file_input').click();">
                                        <svg style="color:white;" class="bi bi-upload" width="1.8em" height="1.8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8zM5 4.854a.5.5 0 0 0 .707 0L8 2.56l2.293 2.293A.5.5 0 1 0 11 4.146L8.354 1.5a.5.5 0 0 0-.708 0L5 4.146a.5.5 0 0 0 0 .708z"/>
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 2z"/>
                                        </svg>
                                    </button>

                                    <span class="text-info" >Upload file</span>
                                    <input class="form-control mt-2 ml-3 col-11" type="password"  disabled placeholder="Password..." id="password_input" name="password" />
                                    <input type="radio" name="upload_type" id="link" value="link" /> <label style="cursor: pointer;" for="link">Get a Link</label>
                                    <input type="radio" name="upload_type" id="globaly" value="globaly" checked /> <label style="cursor: pointer;" for="globaly">Share Here</label>
                                    <input class="form-control col-xl-11 mt-2 ml-3" type="text" readonly value="" id="link_input" style="display: none"/>
                                </div>

                                <div id="progress-wrp" style="display: none">
                                    <div class="progress-bar"></div>
                                    <div class="status">0%</div>
                                </div>

                            </div>
                            <div class="card-footer border-top d-flex full-width " style="background-color: white;border-radius:0px 0px 20px 20px">
                                <input id="send_button" class="btn btn-success"  disabled style="width: 100%" type="button" value="Share Here" />
                            </div>
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

            </div>

        </div>
        <script >
            function resetForm($form) {
                $form.find('input:text, input:password, input:file, select, textarea').val('');
            }
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
            Upload.prototype.doUpload = function (isGlobally) {
                var that = this;
                var formData = new FormData();
                var toWhere = "get_link";
                // add assoc key values, this will be posts values
                formData.append("file", this.file, this.getName());
                formData.append("title",$("#title").val());
                formData.append("password",$("#password_input").val());
                //datalar buyaya yazılıyor.
                formData.append("upload_file", true);
                if(isGlobally){
                    toWhere = "create_global";
                }
                $.ajax({
                    type: "POST",
                    url: toWhere,
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener('progress', that.progressHandling, false);
                        }
                        return myXhr;
                    },
                    success: function (data) {
                        window.location.reload()
                        resetForm($('#file_upload_form'));
                        if(!isGlobally){
                            $("#link_input").val(data.link);
                            $("#link_input").css('display','block');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    },
                    async: true,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: false
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
                    $("#password_input").prop('disabled',true);
                }
            };

        </script>
        <script >
            $(document).ready(function () {
                $('#title').keyup(function () {
                    if($('#title').val()){
                        $("#send_button").prop('disabled',false)
                    }else{
                        $("#send_button").prop('disabled',true)
                    }
                });
                $( "#file_input" ).change(function() {
                    if($("#file_input").val()){
                        $("#password_input").prop('disabled',false)
                    }else {
                        $("#password_input").prop('disabled',true)
                    }
                });
                $('input[type=radio][name=upload_type]').change(function() {
                    if (this.value == 'globaly') {
                        $("#send_button").val("Share Here");
                        $("#title").attr('placeholder','Share a youtube link or any text');
                        if(!$("#title").val()){
                            $("#send_button").prop('disabled',true)
                        }
                    }
                    else if (this.value == 'link') {
                        $("#send_button").val("Get a Link");
                        if($("#file_input").val()){
                            $("#send_button").prop('disabled',false);
                        }else{
                            $("#send_button").prop('disabled',true);
                        }
                        $("#title").attr('placeholder','Optional Title');
                    }
                });
                $("#link_input").click(function () {
                    $(this).select();
                });
            });
            $("#send_button").click( function (e) {
                /*$("#password_input").hide();*/
                //form submit edilidiğinde file inputundan files elementini çkip devam edebilir.böylece send tuşuna basınca başlar

                var degisken = $("#file_input");
                var file = degisken[0].files[0];
                if(!file && $("#title").val()){
                    if($('#link').is(':checked')){
                     alert("You can only share files for getting a link ")
                    }else{
                        $("#send_button").prop('disabled',true);
                        $.ajax({
                            type: "POST",
                            url: "create_global",
                            data: {title:$("#title").val()},
                            success: function (data) {
                                $("#title").val("");
                                resetForm($('#file_upload_form'));

                            },
                        });
                    }
                }else{
                    if($('#globaly').is(':checked')){
                        var upload = new Upload(file);
                        $("#progress-wrp").show();
                        upload.doUpload(true);
                    }else{
                        var upload = new Upload(file);
                        $("#progress-wrp").show();
                        upload.doUpload(false);
                    }
                }
            });


        </script>
        <div class="col">
            <div class="row" style="text-align: center;justify-content: center;">
                <div class=" mb-2 ml-3"
                    style="overflow-y:scroll;height: 700px;float:left;width: 100%;position: relative;"><!--height 70% idi-->
                    <div id="app">
                        <example-component  csrf="{{ csrf_token() }}"></example-component>
                    </div>
                    <script src="/js/app.js"></script>
                </div>

                <script >
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
<footer style="background: linear-gradient(white,rgb(40, 167, 69, .5));" class="text-white page-footer font-small teal pt-1">
    <div class="footer-copyright text-center py-3">© 2020 Copyright
    </div>
</footer>
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
</script>{{--
<script src="http://127.0.0.1:6001/socket.io/socket.io.js"  ></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>--}}

</html>
