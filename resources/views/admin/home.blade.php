@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Filter</b></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kelas') || $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Search By Name</label>

                            <div class="col-md-5">
                                {{ Form::text('name', $filter['name'], ['class'=> 'form-control', 'placeholder' => 'insert name']) }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelas') || $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Search By NPM</label>

                            <div class="col-md-5">
                                {{ Form::text('npm', $filter['npm'], ['class'=> 'form-control', 'placeholder' => 'insert npm']) }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelas') || $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Minimum IPK Lokal</label>

                            <div class="col-md-5">
                                {{ Form::text('ipk_lokal', $filter['ipk_lokal'], ['class'=> 'form-control', 'placeholder' => 'insert Minimum IPK LOkal']) }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelas') || $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Minimum IPK Utama</label>

                            <div class="col-md-5">
                                {{ Form::text('ipk_utama', $filter['ipk_utama'], ['class'=> 'form-control', 'placeholder' => 'insert Minimum IPK Utama']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Urutkan Berdasarkan</label>

                            <div class="col-md-5">
                                {{ Form::select('sort', $sorts, $filter['sort'] , ['class'=> 'form-control']) }}

                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    List Asisten
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Filter</b></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" >
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="seleksi-satu" value="true">
                                    Lolos Seleksi 1
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>List Calon Asisten</b></div>

                <div class="panel-body">
                    @if(count($users) > 0)
                    <table class="table table-bordered">
                        <tr>
                            <th width="10%" style="background-color: #eee">NPM(Kelas)</th>
                            <th width="15%"  style="background-color: #eee">Nama</th>
                            <th width="8%"  style="background-color: #eee">IPK</th>
                            <th width="15%"  style="background-color: #eee">No Hp & Alamat</th>
                            <th width="20%"  style="background-color: #eee">Project</th>
                            <th width="10%"  style="background-color: #eee">File</th>
                            <th width="5%"  style="background-color: #eee">Action</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->calas->npm }} ({{ $user->calas->kelas }})
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    Utama : {{ $user->calas->ipk_utama }} <br>
                                    Lokal: {{ $user->calas->ipk_lokal }}

                                </td>
                                <td>
                                    {{ $user->calas->contact }} <br>
                                    {{ $user->calas->alamat }} <br>
                                </td>
                                <td>
                                    {{ $user->calas->project_name }}<br>
                                    {{ $user->calas->project_desc }}
                                </td>
                                <td>
                                    <a target="_BLANK" href="{{ url($user->calas->cv) }}" >Curriculum Vitae</a> <br>
                                    @if($user->calas->project_ppt != null)
                                        <a target="_BLANK" href="{{ url($user->calas->project_ppt) }}">PPT Project</a> <br>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-option">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            Action <i class="fa fa-caret-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                          <li>
                                            <a href="{{ url('lepkom-admin/travelplan/'. $user->id .'/edit') }}">
                                                    <i class="fa fa-edit"></i> Process
                                                </a>
                                            </li>
                                          <li>
                                              <a href="{{ url('lepkom-admin/travelplan/'. $user->id .'/delete') }}">
                                                  <i class="fa fa-trash-o btn btn-danger"></i> Tolak Lamaran
                                                </a>
                                          </li>
                                          <li class="divider"></li>
                                          <li>
                                              <a href="{{ url('lepkom-admin/travelplan/'. $user->id .'/detail') }}">
                                                    <i class="fa fa-btn fa-eye"></i> Detail
                                                </a>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-center">
                        {!! $users->appends($filter)->render() !!}
                    </div>
                    @else
                        No Data
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
