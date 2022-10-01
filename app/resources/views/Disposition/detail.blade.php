@extends('adminlte::page')

@section('title', 'Detail')

@section('content_header')
<h1>Tambah Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('disposition.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group">
            Jenis Kerjasama : {{$forms->jenis_kerjasama}}
        </div>

        <div class="form-group">
            Jenis Pengajuan : {{$forms->jenis_pengajuan}}
        </div>

        <div class="form-group">
            Nama Mitra Kerjasama : {{$forms->nama_mitra_kerjasama}}
        </div>

        <div class="form-group">
            Alamat Mitra Kerjasama: {{$forms->alamat_mitra_kerjasama}}
        </div>

        <div class="form-group">
            Kategori Mitra : {{$forms->kategori_mitra}}
        </div>

        <div class="form-group">
            Nama PIC Mitra : {{$forms->pic_mitra}}
        </div>

        <div class="form-group">
            Nama Unit : {{$forms->nama_unit}}
        </div>

        <div class="form-group">
            Jabatan : {{$forms->jabatan}}
        </div>

        <div class="form-group">
            Telp/No.HP : {{$forms->no_telp}}
        </div>

        <div class="form-group">
            Email : {{$forms->email}}
        </div>

        <div class="form-group">
            Lingkup Kerjasama : {{$forms->lingkup_kerjasama}}
        </div>

        <div class="form-group">
            Rencana Kegiatan : {{$forms->rencana_kegiatan}}
        </div>

        <div class="form-group">
            Rencana Formalisasi : {{$forms->rencana_formalisasi}}
        </div>

        <div class="form-group">
            Tanggal Pengajuan : {{$forms->tgl}}
        </div>

        <div class="form-group">
            Tempat Pengajuan : {{$forms->tempat}}
        </div>

        <div class="form-group">
            File Pengajuan Kerjasama : <a href="{{ asset('storage/file/' . $forms->file) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
        </div>

    </div>

    <div class="card-footer">
        <div class="form-group">
            <input type="hidden" value="{{ $forms->id }}" name="form_id">
        </div>
        <div class="form-group">
			<label>Pengajuan Disposisi Ke</label>
			<select  name="next_role_id" class="form-control select2">
				<option value=""></option>
				@foreach ($wakilDekan as $wakil)
				<option value="{{ $wakil->id }}">{{ $wakil->display_name }}</option>
				@endforeach
			</select>
		</div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('form.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                    <i class="fas fa-save"></i> Disposisi
                </button>
            </div>
        </div>
    </div>
</form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
