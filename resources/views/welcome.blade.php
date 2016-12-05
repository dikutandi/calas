<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                /*text-shadow: 4px 4px 15px; #ffffff;*/
                /*style="background-image: url(https://i.ytimg.com/vi/lbpHX3Cznbs/maxresdefault.jpg); background-size:cover; "*/
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
        <div class="flex-center position-ref full-height" >
            @if (Route::has('login'))
                @if(Auth::guest())
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Masuk</a>
                    <a href="{{ url('/register') }}">Daftar Asisten</a>
                </div>
                @else
                    <div class="top-right links">
                        <a href="{{ url('/home') }}"><button type="submit" class="btn btn-success">
                                    Akun Saya
                                </button></a>
                    </div>
                @endif
            @endif

            <div class="content"  style="color: #1ABC9C; font-weight:bolder">
                <div class="m-b-md" style="    font-size: -webkit-xxx-large;">
                    Pendaftaran Calon Asisten Lepkom Gunadarma <br>Tahun 2016 Lab. E-Commerce
                </div>

                <div class="links"  style="color: #fff">
                    <a href="http://lepkom.gunadarma.ac.id/" target="_BLANK">About LepKom</a>
                    <a href="#" data-toggle="modal" data-target="#syarat">Syarat Administratif</a>
                    <a href="#" data-toggle="modal" data-target="#cara">Cara Pendaftaran</a>
                    <a href="#" data-toggle="modal" data-target="#tgl">Tanggal Penting</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="syarat" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                        <div class="modal-body">
                          <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                </div>

                <div class="modal fade" id="cara" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cara Pendaftaran:</h4>
                            </div>
                        <div class="modal-body" style="text-align: left;">
                            <ul>
                                <li>Login ke akun anda <a href="{{ url('/login') }}" target="_BLANK">di sini</a></li> atau Registrasi untuk mendapatkan akun <a href="{{ url('/register') }}" target="_BLANK">di sini</a></li>
                                <li>Lengkapi Profile Anda dan Upload CV anda dengan format zip yang berisi semua persyaratan adminstratif</li>
                                <li>Buat sebuah Project(aplikasi) yang berhubungan dengan E-Commerce</li>
                                <li>Buat file presentasi (.ppt/.pptx) upload di halaman home Calas (calon asisten)</li>
                                <li>Pihak Lepkom akan menghubungi peserta Calon Asisten yang lolos tahap seleksi 1 untuk mengikuti test presentasi dan wawancara</li>
                                <li>Pihak Lepkom akan menghubungi peserta Calon Asisten yang lolos tahap seleksi 2 untuk mengikuti test wawancara dengan kepala LepKom</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                </div>

                <div class="modal fade" id="tgl" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Catat Tanggal-tanggal Penting Berikut:</h4>
                            </div>
                        <div class="modal-body">
                          <img src="{{ url('img/tgl.jpg') }}" style="width: 100%">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                </div>


            </div>
        </div>
    </body>
</html>
