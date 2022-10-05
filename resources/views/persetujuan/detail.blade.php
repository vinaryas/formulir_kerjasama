@extends('adminlte::page')

@section('title', 'Detail Pengajuan Kerjasama')

@section('content_header')
<h1>Detail Pengajuan Kerjasama</h1>
@stop

@section('content')
<form class="card" action="{{ route('persetujuan.persetujuan', $submission->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">

		<div class="row">
			<div class="col-md-12"><strong>Jenis Kerjasama:</strong></div>
			<div class="col-md-12"> {{ $submission->jenisKerjasama->kerjasama }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Jenis Pengajuan:</strong></div>
			<div class="col-md-12"> {{ $submission->jenisPengajuan->pengajuan }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Nama Mitra Kerjasama:</strong></div>
			<div class="col-md-12"> {{ $submission->nama_mitra_kerjasama }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Alamat Mitra Kerjasama:</strong></div>
			<div class="col-md-12"> {{ $submission->alamat_mitra_kerjasama }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Kategori Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->kategoriMitra->kategori }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>PIC Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->pic_mitra }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Unit Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->nama_unit }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Jabatan Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->jabatan }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Telp Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->no_telp }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Email Mitra:</strong></div>
			<div class="col-md-12"> {{ $submission->email }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Lingkup Kerjasama:</strong></div>
			<div class="col-md-12"> {{ $submission->lingkup_kerjasama }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Rencana Kegiatan:</strong></div>
			<div class="col-md-12"> {{ $submission->rencana_kegiatan }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Rencana Formalisasi:</strong></div>
			<div class="col-md-12"> {{ $submission->rencanaFormalisasi->rencana }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Tanggal Kegiatan:</strong></div>
			<div class="col-md-12"> {{ Carbon\Carbon::parse($submission->tgl)->format('d-M-y') }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Tempat Kegiatan:</strong></div>
			<div class="col-md-12"> {{ $submission->tempat_kegiatan }}</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Surat Pengantar:</strong></div>
			<div class="col-md-12">
				<a href="{{ asset('storage/file/' . $submission->file) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-12"><strong>Draft Perjanjian:</strong></div>
			<div class="col-md-12">
				<a href="{{ asset('storage/file/' . $submission->file_perjanjian) }}" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file"></i></a>
			</div>
		</div><hr>

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
