@extends('adminlte::page')

@section('title', 'Pengajuan Kerjasama')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('form.create') }}" class="btn btn-info"><i class="fas fa-file"></i> Buat Form </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered dt-responsive table-striped table-sm" id="t_kerjasama" style="width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> File </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td> 1 </td>
                        <td>{{ $form->jenisKerjasama->kerjasama }}</td>
                        <td>{{ $form->jenisPengajuan->pengajuan }}</td>
                        <td>{{ $form->nama_mitra_kerjasama }}</td>
                        <td>{{ $form->kategoriMitra->kategori }}</td>
                        <td>
							<center>
								<a href="{{ asset('storage/file/' . $form->file) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
							</center>
						</td>
						<td>
							@if ($form->status == 1)
							<span class="badge badge-primary">Pengecekan Admin</span>
							@elseif ($form->status == 2)
							<span class="badge badge-primary">Persetujuan Wakil Dekan</span>
							@elseif ($form->status == 3)
							<span class="badge badge-primary">Review KA Unit</span>
							@elseif ($form->status == 10)
							<span class="badge badge-danger">Ditolak</span>
							@elseif ($form->status == 20)
							<span class="badge badge-success">Selesai</span>
							@endif
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
            $('#t_kerjasama').DataTable({
				'scrollX': true
			});
        });
    </script>
@stop
