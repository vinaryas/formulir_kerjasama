@extends('adminlte::page')

@section('title', 'Detail Pengajuan Kerjasama')

@section('content_header')
<h1>Detail Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('persetujuan.approve', $submission->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">

		@include('Form.detail')

        <div class="form-group">
            <div class="float-left">
                <a href="{{ route('persetujuan.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-warning" id="btn-tolak" {{ ($submission->status > 2) ? 'disabled' : '' }}>
                    <i class="fas fa-times"></i> Tolak
                </button>
				<button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';" {{ ($submission->status > 2) ? 'disabled' : '' }}>
                    <i class="fas fa-check"></i> Setujui
                </button>
            </div>
        </div>
    </div>
</form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();

			$('#btn-tolak').click(function (e) { 
				e.preventDefault();
				
				Swal.fire({
					title: 'Yakin ingin menolak permohonan ini?',
					text: "Pastikan sudah melakukan pengecekan permohonan!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Tolak!'
				}).then((result) => {
					if (result.isConfirmed) {
						var url = '{!! route("persetujuan.tolak",":id") !!}';
						url = url.replace(':id', '{!! $submission->id !!}');
						var form_data = {
							_token:'{{ csrf_token() }}',
							_method:'POST',
						};
						
						$.post(url, form_data, function(response, textStatus, xhr) {
							console.log(response);
							// toast(response.alert);
							// $('#t_barang').DataTable().draw();
						});
					}
				})
			});
        });
    </script>
@stop
