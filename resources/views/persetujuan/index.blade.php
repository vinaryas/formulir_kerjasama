@extends('adminlte::page')

@section('title', 'Pengajuan Kerjasama')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <table class="table table-bordered dt-responsive table-striped table-sm" id="t_disposisi" style="width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> File </th>
					<th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                    <tr>
                        <td> 1 </td>
                        <td>{{ $submission->jenisKerjasama->kerjasama }}</td>
                        <td>{{ $submission->jenisPengajuan->pengajuan }}</td>
                        <td>{{ $submission->nama_mitra_kerjasama }}</td>
                        <td>{{ $submission->kategoriMitra->kategori }}</td>
                        <td>
							<center>
								<a href="{{ asset('storage/file/' . $submission->file) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
							</center>
						</td>
						<td><a href="{{ route('persetujuan.detail', $submission->id) }}"
                            class="btn btn-info btn-sm"> Detail <i class="fas fa-angle-right"></i>
                        </a></td>
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
            $('#t_disposisi').DataTable({
				'scrollX': true
			});
        });
    </script>
@stop
