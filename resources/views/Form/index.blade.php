@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('form.create') }}" class="btn btn-info"><i class="fas fa-file"> <b> Buat Form </b> </i></a>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped table-sm" id="t_periksa" style="max-width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Alamat Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> PIC Mitra </th>
                    <th> Nama </th>
                    <th> Nama Unit </th>
                    <th> Jabatan </th>
                    <th> No. Telp </th>
                    <th> Email </th>
                    <th> Lingkup Kerjasama </th>
                    <th> Rencana Kegiatan </th>
                    <th> Rencana Formalisasi </th>
                    <th> Tanggal </th>
                    <th> Tempat </th>
                    <th> File </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td> 1 </td>
                        <td>{{ $form->jenis_kerjasama }}</td>
                        <td>{{ $form->jenis_pengajuan }}</td>
                        <td>{{ $form->nama_mitra_kerjasama }}</td>
                        <td>{{ $form->alamat_mitra_kerjasama }}</td>
                        <td>{{ $form->kategori_mitra }}</td>
                        <td>{{ $form->pic_mitra }}</td>
                        <td>{{ $form->nama }}</td>
                        <td>{{ $form->nama_unit }}</td>
                        <td>{{ $form->jabatan }}</td>
                        <td>{{ $form->no_telp }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->lingkup_kerjasama }}</td>
                        <td>{{ $form->rencana_kegiatan }}</td>
                        <td>{{ $form->rencana_formalisasi }}</td>
                        <td>{{ $form->tgl }}</td>
                        <td>{{ $form->tempat }}</td>
                        <td>{{ $form->file }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('.js-select2').select2();
        });
    </script> --}}
@stop
