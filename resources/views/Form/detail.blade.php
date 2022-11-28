@extends('adminlte::page')

@section('title', 'Detail Pengajuan Kerjasama')

@section('content_header')
<h1>Detail Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="#" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">

		@include('disposisi.detail')

        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('form.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Kembali </a>
            </div>
			<div class="float-right">
				@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.pengecekan_akhir') and Auth::user()->hasRole('admin'))
					<a href="{{ route('form.done', $submission->id) }}" class="btn btn-primary"><i class="fas fa-check"></i> Selesaikan permohonan </a>
				@endif
			</div>
        </div>
    </div>
</form>
@stop

@section('js')
    <script>
    </script>
@stop
