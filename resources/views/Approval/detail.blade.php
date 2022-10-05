@extends('adminlte::page')

@section('title', 'ID Management')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('approval.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-header">
        <a href="{{ route('approval.index') }}" class="btn btn-info"><i class="fas fa-angle-left"></i> Batal </a>
    </div>
    <div class="card-body">
        <input type="hidden" value="{{ $forms->created_by }}" name="user_id">
        <input type="hidden" value="{{ $forms->id }}" name="form_id">
        <input type="hidden" value="{{ $forms->role_last_app }}" name="role_last_app">
        <div class="row">
            <div class="col-md-6">
                <label> Jenis Kerjasama </label>
                <select  name="jenisKerjasama" class="form-control" readonly>
                    <option value="{{ $forms->jenis_kerjasama }}">{{ $forms->jenis_kerjasama }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> Jenis Pengajuan </label>
                <select  name="jenisPengajuan" class="form-control" readonly>
                    <option value="{{ $forms->jenis_pengajuan }}">{{ $forms->jenis_pengajuan }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> Nama Mitra Kerjasama </label>
                <input type="text" value="{{ $forms->nama_mitra_kerjasama }}" name="namaMitraKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Alamat Mitra Kerjasama </label>
                <input type="text" value="{{ $forms->alamat_mitra_kerjasama }}" name="alamatMitraKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Kategori Mitra </label>
                <select  name="kategoriMitra" class="form-control" readonly>
                    <option value="{{ $forms->kategori_mitra }}">{{ $forms->kategori_mitra }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> PIC Mitra </label>
                <input type="text" value="{{ $forms->pic_mitra }}" name="picMitra" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Nama </label>
                <input type="text" value="{{ $forms->nama }}" name="nama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Nama Unit </label>
                <input type="text" value="{{ $forms->nama_unit }}" name="namaUnit" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Jabatan </label>
                <input type="text" value="{{ $forms->jabatan }}" name="jabatan" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Telp/No.HP </label>
                <input type="text" value="{{ $forms->no_telp }}" name="noTelp" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Email </label>
                <input type="email" value="{{ $forms->email }}" name="email" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Lingkup Kerjasma </label>
                <input type="text" value="{{ $forms->lingkup_kerjasama }}" name="lingkupKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Rencana Kegiatan </label>
                <input type="text" value="{{ $forms->rencana_kegiatan }}" name="rencanaKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Rencana Formalisasi </label>
                <select  name="rencanaFormalisasi" class="form-control" readonly>
                    <option value="{{ $forms->rencana_formalisasi }}">{{ $forms->rencana_formalisasi }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <label> Tanggal </label>
                <input type="text" value="{{ $forms->tgl }}" name="tgl" class="form-control" readonly>
            </div>
            <div class="col-md-3">
                <label> Tempat </label>
                <input type="text" value="{{ $forms->tempat }}" name="tempat" class="form-control" readonly>
            </div>
			
            <div class="row">
				<div class="col-md-12"><strong>Surat Pengantar:</strong></div>
				<div class="col-md-12">
					<a href="{{ asset('storage/file/' . $submission->file) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
				</div>
			</div><hr>
	
			<div class="row">
				<div class="col-md-12"><strong>Draft Perjanjian:</strong></div>
				<div class="col-md-12">
					<a href="{{ asset('storage/file/' . $submission->file_perjanjian) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
				</div>
			</div><hr>
        </div>
    </div>
    <div class="card-footer">
        <div class="float-left">
            <button type="submit" class="btn btn-danger" name="disapprove" id="disapprove">
                <i class="fas fa-times"></i> DisApprove
            </button>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" name="approve" id="approve">
                <i class="fas fa-save"></i> Approve
            </button>
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
