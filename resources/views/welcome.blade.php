<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leave Message</title>

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
            margin-bottom: 30px;

    </style>
</head>
<body style="/*background-image: url('https://i.ytimg.com/vi/aiU22lKiZbA/maxresdefault.jpg');*/">
 <h1 style="text-align:center;color:#28A745">Leave a Message</h1>
<div class=" row align-items-start" style="float: right;">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ url('/home') }}">Ana Sayfa</a>
                @else
                    <a href="{{ route('login') }}">Giriş yap</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Kayıt ol</a>
                    @endif
                @endauth
            </div>
        @endif
</div>
<br><br><br><br><br>
<div class="row">
    <div
         style="overflow-y:scroll;height: 550px;float:left;width: 60%; border-style: solid;border-left-color: #28A745;border-right-color: #28A745;border-top-color: white;border-bottom-color: #28A745;border-width: 12px; margin-left: 10%">
        @foreach( $all_messages as $item)

        <div>
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

                            <a href="{{asset('global_files/'.$item->file_name)}}" class="card-text  text-break " style="word-wrap: break-word;width: 100%">
                                Dosyayı İndirin
                            </a>
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
       @endforeach
    </div>
    <div style="float:right">
        <br><br>
        <div  style="height: 20%;width: 30%;padding-left: 20px">
            <form action="{{route('create_global')}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea style="width: 350px" type="text" name="title" placeholder="Title..." required></textarea>
                <br /><br>
                <input type="file" name="file" /><br/><br>
                <input class="btn btn-success" type="submit" value="Send">
            </form>
        </div>
        <br><br><br>
        <h2 style="text-align:center;padding-top:15px;color:#28A745">Share in private room</h2>
        <span style="word-wrap: break-word;text-align:center;padding-top:15px;color:#28A745">Choose a random numbered room to share your file with</span>
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
</div>
</body>
</html>
