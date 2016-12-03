<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
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
                text-shadow: 4px 4px 15px; #ffffff;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #1ABC9C;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="    background-image: url(https://i.ytimg.com/vi/lbpHX3Cznbs/maxresdefault.jpg); background-size:cover; ">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Masuk</a>
                    <a href="{{ url('/register') }}">Daftar Asisten</a>
                </div>
            @endif

            <div class="content"  style="color: #1ABC9C; font-weight:bolder">
                <div class="m-b-md" style="    font-size: -webkit-xxx-large;">
                    Pendaftaran Calon Asisten Lepkom Gunadarma <br>Tahun 2016 Lab. E-Commerce
                </div>

                <div class="links"  style="color: #fff">
                    <a href="https://laravel.com/docs">About LepKom</a>
                    <a href="https://laravel.com/docs">Syarat Administratif</a>
                    <a href="https://laracasts.com">Cara Pendaftaran</a>
                    <a href="https://laravel-news.com">Tanggal Penting</a>
                    <a href="https://forge.laravel.com">Contact Us</a>
                </div>
            </div>
        </div>
    </body>
</html>
