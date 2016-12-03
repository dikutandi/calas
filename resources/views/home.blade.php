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
            @endif
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b>To Do List</b></div>

                <div class="panel-body">
                    <ul>
                        @if($calas === null)
                            <li style="color: red"> Lengkapi Profile Anda!</li>
                        @else
                            <li style="color: #2ab27b"> Lengkapi Profile Anda!</li>
                        @endif
                        <li style="color: red"> Input Tugas Anda!</li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Tanggal Penting</div>

                <div class="panel-body">
                    To Do
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
