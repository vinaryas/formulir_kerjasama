@extends('adminlte::page')

@section('title', 'Pengajuan Kerjasama')

@section('content_header')
<h1>Tambah Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<div class="form-group">
			<label>Jenis Kerjasama</label>
			<select  name="jenis_kerjasama" class="form-control select2">
				<option value=""></option>
				@foreach ($jenisKerjasama as $kerjasama)
				<option value="{{ $kerjasama->id }}">{{ $kerjasama->kerjasama }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Jenis Pengajuan</label>
			<select  name="jenis_pengajuan" class="form-control select2">
				<option value=""></option>
				@foreach ($jenisPengajuan as $pengajuan)
				<option value="{{ $pengajuan->id }}">{{ $pengajuan->pengajuan }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Nama Mitra Kerjasama</label>
			<input type="text" name="nama_mitra_kerjasama" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Alamat Mitra Kerjasama</label>
			<textarea name="alamat_mitra_kerjasama" id="alamat_mitra_kerjasama" cols="20" rows="5" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label>Kategori Mitra</label>
			<select  name="kategori_mitra" class="form-control select2">
				<option value=""></option>
				@foreach ($kategoriMitra as $kategori)
				<option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Nama PIC Mitra</label>
			<input type="text"  name="pic_mitra" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Nama Unit</label>
			<input type="text" name="nama_unit" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Jabatan</label>
			<input type="text" name="jabatan" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Telp/No.HP</label>
			<input type="text" name="no_telp" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Lingkup Kerjasama</label>
			<input type="text" name="lingkup_kerjasama" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Rencana Kegiatan</label>
			<input type="text" name="rencana_kegiatan" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Rencana Formalisasi</label>
			<select  name="rencana_formalisasi" class="form-control select2">
				<option value=""></option>
				@foreach ($rencanaFormalisasi as $rencana)
				<option value="{{ $rencana->id }}">{{ $rencana->rencana }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Tanggal Pengajuan</label>
			<input type="date" name="tgl" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>Tempat Pengajuan</label>
			<input type="text" name="tempat" class="form-control form-control-sm">
		</div>

		<div class="form-group">
			<label>File Pengajuan Kerjasama</label>
			<input type="file" name="file_kerjasama" class="form-control">
		</div>

        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('form.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                    <i class="fas fa-save"></i> Simpan
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
