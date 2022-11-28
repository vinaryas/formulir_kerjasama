@extends('adminlte::page')

@section('title', 'Detail Pengajuan Kerjasama')

@section('content_header')
<h1>Detail Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('uploadDisposisition.update', $submission->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		@include('disposisi.detail')

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Disposisi ke: </label>
					<div>
						<select name="disposition_to" class="form-control select2 disabled" style="width: 100%;" disabled>
							<option value="1">Wakil Dekan</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label style="margin-bottom: 1px;">Dokumen Disposisi: </label>
					<div>
						{{-- <span class="badge badge-primary" style="font-size: 1em; text-align: left; line-height: 18px;">Sebelum mengunggah hasil review, mohon mengganti nama dokumen dengan format : <br> <strong>nama berkas_nama reviewer_tanggal review(ddmmyyyy)</strong></span> --}}
					</div>
					<div class="pb-1">
						<span class="badge badge-warning">Dokumen yang diijinkan adalah <strong>PDF</strong>. Maksimal 1MB.</span>
					</div>
					<input type="file" name="file_disposition" class="form-control form-control-sm" {{ ($submission->status != config('kerjasama.code_detail.status_pengajuan.upload_disposisi')) ? 'disabled' : '' }}>
				</div>
			</div>
		</div>

        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('disposisition.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';" {{ ($submission->status > config('kerjasama.code_detail.status_pengajuan.upload_disposisi')) ? 'disabled' : '' }}>
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
