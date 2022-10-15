@extends('adminlte::page')

@section('title', 'Detail Pengajuan Kerjasama')

@section('content_header')
<h1>Detail Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('review.review', $submission->id) }}" method="POST" enctype="multipart/form-data">
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
				<label for=""><strong>File Review:</strong></label>
				<div>
					<span class="badge badge-warning">Dokumen yang diijinkan adalah <strong>word (doc, docx)</strong>. Maksimal 1MB.</span>
				</div>
				<input type="file" name="file_review" class="form-control">
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Komentar:</strong></div>
			<textarea class="ml-5 mr-5" name="comment" id="comment" style="width: 100%"></textarea>
		</div><hr>

        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('review.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" id="btn-info" {{ ($submission->status > config('kerjasama.code_detail.status_pengajuan.review')) ? 'disabled' : '' }}>
                    <i class="fas fa-save"></i> Simpan Review
                </button>
            </div>
        </div>
    </div>
</form>
@stop

@section('js')
	<script src="https://cdn.tiny.cloud/1/l6crvnyyxe537svrrmuu38vxrb2scra5zp2onr04gbfz5hll/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function () {
            $('#table').DataTable();

			tinymce.init({
				selector: '#comment',
				tinycomments_mode: 'embedded',
				skin: 'bootstrap',
				icons: 'bootstrap',
				menubar: false,
				plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
				],
				toolbar: 'undo redo bold italic bullist numlist',
			});
        });
    </script>
@stop
