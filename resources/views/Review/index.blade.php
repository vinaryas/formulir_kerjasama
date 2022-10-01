@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered dt-responsive table-striped table-sm" id="t_review" style="width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> PIC Mitra </th>
                    <th> Aksi </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td> 1 </td>
                        <td>{{ $form->jenis_kerjasama}}</td>
                        <td>{{ $form->jenis_pengajuan }}</td>
                        <td>{{ $form->nama_mitra_kerjasama }}</td>
                        <td>{{ $form->kategori_mitra }}</td>
                        <td>{{ $form->pic_mitra }}</td>
                        <td>
                            <center>
                                <a href="{{ route('review.detail', $form->form_id) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
                            </center>
                        </td>
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
            $('#t_review').DataTable({
			});
        });
    </script>
@stop
