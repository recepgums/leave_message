<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Leave Message</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px
        }
    </style>
</head>
<body onload="start()" style="/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">
<div style="display: flex;background-color: #0c673b">
    <div style="flex:8">
        <a href="/" class="btn btn-outline-light btn-lg">Go to Global Page</a>
    </div>
    <div style="flex:8">
        <h1 style="text-align:center;color:white">Leave a Message</h1>
    </div>
    <div style="flex:8;">
        <div class=" row align-items-start" style="float: right;">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a class="btn btn-outline-light bnt-lg" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-outline-light btn-lg" href="{{ route('login') }}">Log In</a>

                        @if (Route::has('register'))
                            <a class="btn btn-outline-light btn-lg" href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div></div>
    <div style="flex: 1;">
        <div style="height:150px;text-align: center;justify-content: center">
            <p style="font-size: 28px;" id="animation" >{{$number}}</p>
        </div>
    </div>

<div >
    <div class="row">
        <div
            style="overflow-y:scroll;height: 600px;float:left;width: 60%; border-style: solid;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745;border-width: 12px; margin-left: 10%">
                <div>
                    @foreach($all as $item)
                    <div class="col-lg-11 ">
                        <div class="card card-small card-post mb-4" name="kart">
                            <div class="card-body row ">
                                <h5 class="card-title col-md-10 ">{{$item->title}}</h5>
                                @if($item->file_name)
                                <div class="card-title col-md-2 ">
                            <span style="font-size:20px; cursor:pointer;"
                                  onclick="puan_guncelle(this,1,27)">&uarr;</span>
                                    <br>
                                    <span class="paylasilanin_puani">0</span>
                                    <br>
                                    <span style="font-size:20px; cursor:pointer;"
                                          onclick="puan_guncelle(this,0,27)">&darr;</span>
                                </div>
                                    @if($item->password)
                                        <input class="input-group-seamless sifre"  type="password" placeholder="password..." name="file_password_confirm">
                                        <span onclick="ajax_password(this,{{$item->id}})" class="btn btn-success" >Download</span>
                                    @else
                                        <a href="/storage/private_room_files/{{$item->file_name}}" target="_blank" class="card-text  text-break "  style="word-wrap: break-word;width: 100%">
                                            Dosyayı İndirin
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div style="background-color: #28A745">
                                <div class=" ">
                                    <div  style="text-align: right">
                                        <small class="text-white">2020-03-27 19:16:51</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                <br>
        </div>
        <div style="float:right">
            <br><br>
            <div class="row align-items-center justify-content-center" style="height: 20%;padding-left: 20px">
                <form action="{{route('create_private_room_message',$number)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea style="width: 350px;height: 40px" type="text" name="title" placeholder="Title..." required></textarea>
                    <span class="input-group-addon">-</span>
                    <br>
                    <div class="input-group justify-content-center"  >
                        <input id="file_input" type="file" name="room_file"   style="display: none;"/>
                        <input type="button" class="btn" value="Browse..." onclick="document.getElementById('file_input').click();" />
                        <input type="hidden" name="number" value="{{$number}}">
                        <input type="password" style="width:50%;margin-left: 23px;margin-top:3px;display: none" placeholder="Optional password..." id="password_input" name="password" />
                    </div><br/>
                    <div style="text-align: center"><input class="btn btn-success"  style="width: 50%" type="submit" value="Send"></div>
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
        function ajax_password(event,id) {
            var password = $(event).prev().val();
            $.ajax({
                type:"post",
                url:"{{route('ajax_private')}}",
                data:{
                    _token:"{{csrf_token()}}",
                    password:password,
                    id:id
                },
                success:function(result){
                    console.log(result);
                    if(result.status==200){
                        let path = result.download_link;
                        window.open(path,'_blank');
                    }
                    if(result.status==400){
                        alert(result.message);
                    }
                    $('.sifre').val("");
                },
                error:function (data) {
                    console.log(data);
                }
            });
        }
    </script>

<script>

    function start() {
        setTimeout(function () {
            var time= setInterval(function () {
                var value=(document.getElementById("animation").style.fontSize);
                value=value.toString();
                value=value.substring(0,value.indexOf("px"));

                if(value<=60){
                    value=value*1+8;
                    value=value+"px";
                    document.getElementById("animation").style.fontSize=value;
                }else{
                    clearInterval(time);
                }
            }, 100);
        },1000);

    }
</script>
</body>
</html>
