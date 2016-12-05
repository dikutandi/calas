@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if($calas === null)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Perhatian!</strong> Lengkapi Data Diri Anda Di Form Berikut!.
                </div>
            @elseif($calas->project_name === null || $calas->project_desc === null || $calas->project_ppt === null)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Perhatian!</strong> Input Project E-Commerce Anda.
                </div>

            @endif
            @if(Session::has('info'))
              <div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{ Session::get('info') }}
              </div>
            @endif
            @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible" role="alert" id="success-alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {!! Session::get('error') !!}
              </div>
            @endif

            @if($calas === null)
                @include('calas.create')
            @elseif($calas->project_name === null || $calas->project_desc === null || $calas->project_ppt === null)
                @include('calas.project')
            @else
                @include('calas.profile')
            @endif
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b>To Do List</b></div>

                <div class="panel-body">
                    <ul>
                        @if($calas === null)
                            <li style="color: red"> Lengkapi Profile Anda! </li>
                        @else
                            <li style="color: #2ab27b"> Lengkapi Profile Anda! <i class="fa fa-btn fa-check-circle"></i> </li>
                        @endif

                        @if(!isset($calas->project_name) || ($calas->project_name === null || $calas->project_desc === null || $calas->project_ppt === null))
                            <li style="color: red"> Input Project E-Commerce Anda! </li>
                        @else
                            <li style="color: #2ab27b"> Input Project E-Commerce Anda! <i class="fa fa-btn fa-check-circle"></i> </li>
                        @endif

                        @if(\Carbon\Carbon::now()->format('Y-m-d') < '2016-12-17' )
                            <li style="color: red"> Menunggu Seleksi Panitia! </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Tanggal Penting</div>

                <div class="panel-body">
                    <ul>
                    @foreach(config('calas.tgl_penting') as $tgl)
                        <li>{{ $tgl[0] }} => <b>{{ $tgl[1] }}</b></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    Semua Informasi Tentang Penerimaan Asisten Lepkom Tahun 2016 Lab E-Commerce bisa di lihat di halaman ini
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
