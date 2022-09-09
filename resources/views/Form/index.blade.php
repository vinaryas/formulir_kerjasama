@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('form.create') }}" class="btn btn-info"><i class="fas fa-file"> <b> Buat Form </b> </i></a>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered dt-responsive table-striped table-sm" id="t_kerjasama" style="width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> PIC Mitra </th>
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
                        <td>{{ $form->kategori_mitra }}</td>
                        <td>{{ $form->pic_mitra }}</td>
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
            $('#t_kerjasama').DataTable({
			});
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('.js-select2').select2();
        });
    </script> --}}
@stop
