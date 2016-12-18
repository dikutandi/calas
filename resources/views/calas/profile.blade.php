<style type="text/css">
    .form-horizontal .control-label {
        text-align: left;
        margin-bottom: 0;
        padding-top: 7px;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading">
        Data Diri
        <a href="{{ url('/profile/edit') }}" class="btn btn-success btn-xs">
            Edit Data Diri!
        </a>
    </div>

    <div class="panel-body">
        <table class="table no-border">
            <tr>
                <th width="10%">Nama</th>
                <td width="5%">:</td>
                <td>{{ $user->name }}</td>
                <th width="10%">NPM</th>
                <td width="5%">:</td>
                <td>{{ $calas->npm }} </td>
            </tr>
            <tr>
                <th width="10%">Kelas</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $calas->kelas }}</td>
            </tr>

            <tr>
                <th width="10%">Email</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $user->email }}</td>
            </tr>

            <tr>
                <th width="10%">No Hp</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $calas->contact }}</td>
            </tr>

            <tr>
                <th width="15%">IPK Utama</th>
                <td width="5%">:</td>
                <td>{{ $calas->ipk_utama }}</td>
                <th width="15%">IPK Lokal</th>
                <td width="5%">:</td>
                <td>{{ $calas->ipk_lokal }}</td>
            </tr>

            <tr>
                <th width="10%">Alamat</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $calas->alamat }}</td>
            </tr>

            <tr>
                <th width="10%">CV</th>
                <td width="5%">:</td>
                <td colspan="4">
                    <a target="_BLANK" href="{{ url($calas->cv) }}" >Download Curriculum Vitae</a> <br>
            </tr>



        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Project E-Commerce
        <a href="{{ url('/project/edit') }}" class="btn btn-warning btn-xs">
            Edit Project!
        </a>
    </div>

    <div class="panel-body">
        <table class="table no-border">
             <tr>
                <th width="15%">Nama Project</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $calas->project_name }}</td>
            </tr>
            <tr>
                <th width="15%">Deskripsi Project</th>
                <td width="5%">:</td>
                <td colspan="4">{{ $calas->project_desc }}</td>
            </tr>
            <tr>
                <th width="15%">PPT Project</th>
                <td width="5%">:</td>
                <td colspan="4">
                    @if($user->calas->project_ppt != null)
                        <a target="_BLANK" href="{{ url($calas->project_ppt) }}">Download PPT Project</a> <br>
                    @endif

                </td>
            </tr>
        </table>
    </div>
</div>
