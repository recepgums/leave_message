<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Message</title>
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
            margin-bottom: 30px;
        }
        /*::placeholder {
            color: red;
            opacity: 1; !* Firefox *!
        }*/
        html{ overflow-y: scroll;}
    </style>
</head>
<body onload="page_loaded()" style="/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">

<div style="display: flex;background-color: #0c673b">
    <div style="flex:8">
        asd
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
    </div>
    <div style="flex: 1;">
    </div>
</div>

<div class="col-md col-sm col-lg" style="display: flex;background-color: gray;height: auto">
    <div style="flex:3">
        <div class="row" style="overflow-x: auto;">
            @foreach($all_messages as $key=>$item)
                @if($key>4)
                    <button class="btn btn-primary" > <span class="glyphicon glyphicon-play-circle"></span></button>
                @else
            <div class="col-lg-2 col-md-2  col-sm">
                <div class="card card-small card-post mb-2" name="kart">
                    <div class="card-body row ">
                            <div class="card-title col-md-2 ">
                            <span style="font-size:10px; cursor:pointer;">&uarr;</span>
                                <br>
                                <span class="paylasilanin_puani">0</span>
                                <br>
                                <span style="font-size:10px; cursor:pointer;" >&darr;</span>
                            </div>
                      </div>
                 </div>
             </div>
                @endif
            @endforeach
        </div>
    </div>
    <div style="flex: 1">
        new questions
    </div>
</div>

<br>
<div class="row">
    <div
         style="overflow-y:scroll;height: 550px;float:left;width: 60%; border-style: solid;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745;border-width: 12px; margin-left: 10%">
        <div id="app">
            <example-component></example-component>
        </div>
        <script src="/js/app.js"></script>
        {{--@foreach( $all_messages as $item)
        <div id="notification">
            <div class="col-lg-11 ">
                <div class="card card-small card-post mb-4" name="kart">
                    <div class="card-body row ">
                        <h5 class="card-title col-md-10 " id="title">{{$item->title}} </h5>
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
                            <a href="/storage/global_files/{{$item->file_name}}" target="_blank" class="card-text  text-break "  style="word-wrap: break-word;width: 100%">
                                Dosyayı İndirin
                            </a>
                            @endif
                        @endif

                    </div>
                    @if($item->file_name)
                        <div style="background-color: #28A745">
                            <div class=" ">
                                <div  style="text-align: right">
                                    <small class="text-white">2020-03-27 19:16:51</small>
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="background-color: #aaa">
                            <div class=" ">
                                <div  style="text-align: right">
                                    <small class="text-white">2020-03-27 19:16:51</small>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <br>
       @endforeach--}}
    </div>
    <div style="float:right">
        <br><br>
        <div class="row align-items-center justify-content-center" style="height: 20%;padding-left: 20px">
            <form action="{{route('create_global')}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea style="width: 350px;height: 40px" type="text" name="title" placeholder="Title..." required></textarea>
                <span class="input-group-addon">-</span>
                <br>
                <div class="input-group justify-content-center"  >
                    <input id="file_input" type="file" name="file"   style="display: none;"/>
                    <input type="button" class="btn" value="Browse..." onclick="document.getElementById('file_input').click();" />
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
        <br><br><br>
        <h2 style="text-align:center;padding-top:15px;color:#28A745">Share in private room</h2>
        <span style="word-wrap: break-word;text-align:center;padding-top:15px;color:#28A745;margin-left: 5px;">Choose a random numbered room to share your file with</span>
        <div class="row align-items-center justify-content-center" style="height: 20%;padding-left: 20px">
            <form action="{{route('show_private_room')}}" method="get"  >
                @csrf
                <div class="input-group justify-content-center"  >
                    <input  type="text" name="room_number" placeholder="Number..."/>
                    <span class="input-group-addon">-</span>
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
             url:"{{route('ajax_password')}}",
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
                 $('.sifre').val("");
             },
             error:function (data) {
                console.log(data);
             }
         });
     }
 </script>
</body>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>

<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script>
   /* new Vue({
        el: "#notification",
        data: {
            data:[],
            item:"yeni"
        },
        mounted(){
            window.Echo.channel('user-channel')
                .listen('.UserEvent', (data) => {
                    this.data=data.data;
                    j=0;
                    $("#notification").empty();
                    for (j = 0; j < data.data.length; j++) {
                        $("#notification").append('<div class="alert alert-success">'+(j+1) + data.data[j].title+'</div>');
                    }
                });
        }
    });*/
</script>
</html>
{{--

for (j = 0; j < data.data.length; j++) {
console.log(data.data[j].title);
$("#notification").append('<div class="alert alert-success">'+data.data[j].title+'</div>');
}
--}}
