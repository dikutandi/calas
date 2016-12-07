<style type="text/css">
    .form-horizontal .control-label {
        text-align: left;
        margin-bottom: 0;
        padding-top: 7px;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading">Form Calon Asisten</div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/calas') }}" enctype=multipart/form-data style="text-align: left;">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Nama</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('kelas') || $errors->has('npm') ? ' has-error' : '' }}">
                <label for="kelas" class="col-md-2 control-label">Kelas</label>

                <div class="col-md-3">
                    {{ Form::text('kelas', isset($calas->kelas) ? $calas->kelas : old('kelas'), ['class'=> 'form-control', 'placeholder' => 'Kelas Anda']) }}

                    @if ($errors->has('kelas'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kelas') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-5">
                    <label class="col-md-4 control-label" for="npm" >
                        NPM
                    </label>
                    <div class="col-md-8">
                        {{ Form::text('npm', isset($calas->npm) ? $calas->npm : old('npm'), ['class'=> 'form-control', 'placeholder' => 'Masukan Npm Anda']) }}

                        @if ($errors->has('npm'))
                            <span class="help-block">
                                <strong>{{ $errors->first('npm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('ipk_lokal') || $errors->has('ipk_utama') ? ' has-error' : '' }}">
                <label for="kelas" class="col-md-2 control-label">IPK Utama</label>

                <div class="col-md-3">
                    {{ Form::text('ipk_utama', isset($calas->ipk_utama) ? $calas->ipk_utama : old('ipk_utama'), ['class'=> 'form-control', 'placeholder' => 'IPK Utama']) }}

                    @if ($errors->has('ipk_utama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ipk_utama') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-5">
                    <label class="col-md-4 control-label" for="ipk_lokal" >
                        IPK Lokal
                    </label>
                    <div class="col-md-8">
                        {{ Form::text('ipk_lokal', isset($calas->ipk_lokal) ? $calas->ipk_lokal : old('ipk_lokal'), ['class'=> 'form-control', 'placeholder' => 'IPK Lokal']) }}

                        @if ($errors->has('ipk_lokal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ipk_lokal') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- <div class="form-group{{ $errors->has('lab_minat') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Lab-Minat</label>

                <div class="col-md-5">
                    {{ Form::select('lab_minat', $lab_minat, isset($calas->lab_minat) ? $calas->lab_minat : old('lab_minat') , ['class'=> 'form-control', 'placeholder' => 'Pilih salah satu']) }}

                    @if ($errors->has('lab_minat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lab_minat') }}</strong>
                        </span>
                    @endif
                </div>
            </div> -->

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">No HP</label>

                <div class="col-md-5">
                    {{ Form::text('contact', isset($calas->contact) ? $calas->contact : old('contact'), ['class'=> 'form-control', 'placeholder' => 'No HP']) }}

                    @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Alamat</label>

                <div class="col-md-8">
                    {{ Form::textarea('alamat',  isset($calas->alamat) ? $calas->alamat : old('alamat'), ['placeholder' => 'Alamat Tempat Tinggal Saat Ini', 'class' => 'form-control', 'rows' => '5']) }}

                    @if ($errors->has('alamat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alamat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Upload CV</label>

                <div class="col-md-8">
                    <input type="hidden" name="cv" >
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Select files...</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="cv" value="{{ old('cv') }}">
                    </span>


                    @if ($errors->has('cv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cv') }}</strong>
                        </span>
                    @endif
                    <span class="help-block" style="color: blue">Format diterima hanya .pdf Contoh file yang diupload bisa dilihat dilink <a target="_BLANK" href="{{ url('cv.pdf') }}">berikut {{ url('cv.pdf') }}</span>

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Daftar Asisten!
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
