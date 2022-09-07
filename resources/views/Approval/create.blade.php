@extends('adminlte::page')

@section('title', 'ID Management')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('form_pembuatan.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <input type="hidden" value="{{ $forms->created_by }}" name="user_id">
        <input type="hidden" value="{{ $forms->id }}" name="form_id">
        <input type="hidden" value="{{ $forms->role_last_app }}" name="role_last_app">
        <div class="row">
            <div class="col-md-6">
                <label> Jenis Kerjasama </label>
                <select  name="jenisKerjasama" class="form-control" readonly>
                    <option value="{{ $jenisKerjasama->id }}">{{ $jenisKerjasama->kerjasama }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> Jenis Pengajuan </label>
                <select  name="jenisPengajuan" class="form-control" readonly>
                    <option value="{{ $jenisPengajuan->id }}">{{ $jenisPengajuan->pengajuan }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> Nama Mitra Kerjasama </label>
                <input type="text" name="namaMitraKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Alamat Mitra Kerjasama </label>
                <input type="text" name="alamatMitraKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Kategori Mitra </label>
                <select  name="kategoriMitra" class="form-control" readonly>
                    <option value="{{ $kategoriMitra->id }}">{{ $kategoriMitra->store->name }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label> PIC Mitra </label>
                <input type="text"  name="picMitra" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Nama </label>
                <input type="text" name="nama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Nama Unit </label>
                <input type="text" name="namaUnit" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Jabatan </label>
                <input type="text" name="jabatan" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Telp/No.HP </label>
                <input type="text" name="noTelp" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Email </label>
                <input type="email" name="email" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Lingkup Kerjasma </label>
                <input type="text" name="lingkupKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Rencana Kegiatan </label>
                <input type="text" name="rencanaKerjasama" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label> Rencana Formalisasi </label>
                <select  name="rencanaFormalisasi" class="form-control" readonly>
                    <option value="{{ $rencanaFormalisasi->id }}">{{ $rencanaFormalisasi->rencana }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <label> Tanggal </label>
                <input type="text" name="tgl" class="form-control" readonly>
            </div>
            <div class="col-md-3">
                <label> Tempat </label>
                <input type="text" name="tempat" class="form-control" readonly>
            </div>
            <div class="col-md-3">
                <label> Upload File: </label>
                <input type="file" name="file" class="form-control" readonly>
            </div>
        </div>
        <div class="card-body">
            <div class="float-left">
                <a href="{{ route('form_pembuatan.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-left">
                <button type="submit" class="btn btn-danger" name="disapprove" id="disapprove" value="disapprove">
                    <i class="fas fa-times"></i> DisApprove
                </button>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" name="approve" id="approve" value="approve" >
                    <i class="fas fa-save"></i> Approve
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
