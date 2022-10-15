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
        @include('Form.list')
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
