@extends('adminlte::page')

@section('title', 'Pengajuan Kerjasama')

@section('content_header')
 <h1>Data Pengajuan Kerjasama</h1>
@stop

@section('content')
<div class="card">
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
			<div class="modal-body">
				<p>Pengajuan anda telah selesai direview. Hasil rewiew adalah:</p><hr>
				
				<div id="comment-reviewer">
					
				</div>
				<hr>
				<p>Draft hasil review telah kami kirimkan ke email yang didaftarkan saat membuat akun. Mohon untuk memerika kembali.</p>
				<p>
					Jika ada perubahan atau penambahan dan hal-hal lain yang perlu didiskusikan, silahkan hubungi <strong>nama pic</strong>, dengan nomer kontak <strong>08112312312</strong>
				</p>
				<p>Jika draft sudah final dan tidak ada revisi lagi, silahkan unggah pada form dibawah</p>
				<div>
					<input type="file" class="form-control form-control-sm" name="" id="">
				</div>
				<div class="mt-2">
					<input type="checkbox" name="" id=""> Saya sudah memastikan jika berkas yang diupload adalah berkas yang sudah final.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary">Simpan Draft Final</button>
			</div>
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
		})
    </script>
@stop
