<style type="text/css">
    .form-horizontal .control-label {
        text-align: left;
        margin-bottom: 0;
        padding-top: 7px;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading">Form Project E-Commerce</div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/project') }}" enctype=multipart/form-data style="text-align: left;">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Nama Project</label>

                <div class="col-md-8">
                    {{ Form::text('project_name', isset($calas->project_name) ? $calas->project_name : old('project_name'), ['class'=> 'form-control', 'placeholder' => 'Nama Project (cth: Marketplace Seperti Bukalapak.com)']) }}

                    @if ($errors->has('project_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('project_desc') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Keterangan Project</label>

                <div class="col-md-8">
                    {{ Form::textarea('project_desc',  isset($calas->project_desc) ? $calas->project_desc : old('project_desc'), ['placeholder' => 'Jelaskan Secara Singkat Tentang Project Anda', 'class' => 'form-control', 'rows' => '5']) }}

                    @if ($errors->has('project_desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_desc') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('project_ppt') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Upload Presentasi</label>

                <div class="col-md-8">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Pilih File PPT...</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="project_ppt" >
                    </span>

                    <span class="help-block" style="color: #a94442">Format diterima hanya ..ppt/.pptx</span>

                    @if ($errors->has('project_ppt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_ppt') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Simpan Project!
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
