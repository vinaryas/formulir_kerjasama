@extends('adminlte::page')

@section('title', 'ID Management')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Jenis Kerjasama </label>
                <select  name="jenisKerjasama" class="form-control">
                    @foreach ($jenisKerjasama as $kerjasama)
                    <option value="{{ $kerjasama->id }}">{{ $kerjasama->kerjasama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Jenis Pengajuan </label>
                <select  name="jenisPengajuan" class="form-control">
                    @foreach ($jenisPengajuan as $pengajuan)
                    <option value="{{ $pengajuan->id }}">{{ $pengajuan->pengajuan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Nama Mitra Kerjasama </label>
                <input type="text" name="namaMitraKerjasama" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Alamat Mitra Kerjasama </label>
                <input type="text" name="alamatMitraKerjasama" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Kategori Mitra </label>
                <select  name="kategoriMitra" class="form-control">
                    @foreach ($kategoriMitra as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> PIC Mitra </label>
                <input type="text"  name="picMitra" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Nama </label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Nama Unit </label>
                <input type="text" name="namaUnit" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Jabatan </label>
                <input type="text" name="jabatan" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Telp/No.HP </label>
                <input type="text" name="noTelp" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Email </label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Lingkup Kerjasma </label>
                <input type="text" name="lingkupKerjasama" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Rencana Kegiatan </label>
                <input type="text" name="rencanaKegiatan" class="form-control">
            </div>
            <div class="col-md-6">
                <label> Rencana Formalisasi </label>
                <select  name="rencanaFormalisasi" class="form-control">
                    @foreach ($rencanaFormalisasi as $rencana)
                    <option value="{{ $rencana->id }}">{{ $rencana->rencana }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label> Tanggal </label>
                <input type="date" name="tgl" class="form-control">
            </div>
            <div class="col-md-3">
                <label> Tempat </label>
                <input type="text" name="tempat" class="form-control">
            </div>
            <div class="col-md-3">
                <label> Upload File: </label>
                <input type="file" name="file" class="form-control">
            </div>
        </div>
        <div class="card-footer">
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
