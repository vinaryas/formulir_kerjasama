@extends('adminlte::page')

@section('title', 'Pengajuan Kerjasama')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

    <div class="card-header">
        @if (Auth::user()->hasRole('user'))
		<a href="{{ route('form.create') }}" class="btn btn-primary"><i class="fas fa-file"></i> Buat Pengajuan </a>
		@endif
    </div>
    <div class="card-body">

		@include('Form.list')

    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Finalisasi Pengajuan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" enctype="multipart/form-data">
				
				<input type="hidden" name="id_submission" id="id_submission">
				<input type="hidden" name="csrf_token" id="csrf_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					{{-- <p>Pengajuan anda telah selesai direview. Hasil rewiew adalah:</p><hr>
					
					<div id="comment-reviewer">
						
					</div>
					<hr> --}}
					<p>Draft hasil review dapat dilihat pada file terlampir. Mohon untuk memerika kembali.</p>
					<p>
						Jika ada perubahan atau penambahan dan hal-hal lain yang perlu didiskusikan, silahkan hubungi <strong>nama pic</strong>, dengan nomer kontak <strong>08112312312</strong>
					</p>
					<p>Jika draft sudah final dan tidak ada revisi lagi, silahkan unggah pada form dibawah</p>
					<div>
						<div class="alert alert-danger d-none" role="alert" id="alert_final_error"></div>
						<div class="alert alert-success d-none" role="alert" id="alert_final_success"></div>
						<div>
							<span class="badge badge-warning">Dokumen yang diijinkan adalah <strong>word (doc, docx)</strong>. Maksimal 1MB.</span>
						</div>
						<input type="file" class="form-control form-control-sm" name="file_final" id="file_final">
					</div>
					<div class="mt-2">
						<input type="checkbox" class="cb-validate" name="" id=""> Saya sudah memastikan jika berkas yang diupload adalah berkas yang sudah final.
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary btn-draft-final" disabled>Simpan Draft Final</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            var t_kerjasama = $('#t_kerjasama').DataTable({
				'scrollX': true
			});

			$('.btn-hasil-review').click(function (e) { 
				e.preventDefault();
				
				let submissionId = $(this).data('submissionId');
				var url = '{!! route("form.show",":id") !!}';
                url = url.replace(':id',submissionId);
				$('#id_submission').val(submissionId);

				$.ajax({
					type: "GET",
					url: url,
					success: function (response) {
						console.log(response);
						$('#comment-reviewer').html(response.comment);
						$('#modal-detail').modal('toggle');
					}
				});
			});

			$(".cb-validate").change(function(e) {
				if ($(this).prop('checked')){
					$('.btn-draft-final').removeClass('disabled');
					$('.btn-draft-final').removeAttr('disabled');
				}else{
					$('.btn-draft-final').attr('disabled', 'disabled');
				}
			});

			$('.btn-draft-final').click(function (e) { 
				e.preventDefault();
				var CSRF_TOKEN = $('#csrf_token').val();

				var fd = new FormData();
                var files = $('#file_final')[0].files[0];
                fd.append('file_final', files);
				fd.append('_token',CSRF_TOKEN);
				let submissionId = $('#id_submission').val();
				var url = '{!! route("form.uploadFinal",":id") !!}';
                url = url.replace(':id',submissionId);
       
                $.ajax({
                    url: url,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response.success){
                           $('#alert_final_error').addClass('d-none');
						   $('#alert_final_success').removeClass('d-none');
						   $('#alert_final_success').html('File berhasil diunggah');
						   location.reload();
                        }
                        else{
							let html = '<ul>';
                            $('#alert_final_success').addClass('d-none');
							$('#alert_final_error').removeClass('d-none');

							$.each(response.data.file_final, function (index, value) { 
								html += '<li>' + value + '</li>';
							});

							html += '</ul>';
							$('#alert_final_error').html(html);
                        }
                    },
                });
			});
		})
    </script>
@stop
