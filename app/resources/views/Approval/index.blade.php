@extends('adminlte::page')

@section('title', 'Approval')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered dt-responsive table-striped table-sm" id="t_periksa" style="width: 100%">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Jenis Kerjasama</th>
                    <th> Jenis Pengajuan </th>
                    <th> Nama Mitra Kerjasama </th>
                    <th> Kategori Mitra </th>
                    <th> PIC Mitra </th>
                    <th> Approval </th>
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
                        <td><a href="{{ route('approval.detail', $form->id) }}"
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
