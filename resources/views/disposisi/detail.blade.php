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
	<div class="d-flex flex-wrap">
		@if ($submission->file != null)
		<div class="p-2">
			<a href="{{ asset('storage/file/' . $submission->file) }}" target="_blank"><i class="fas fa-file-word"></i> Draft PKS</a>
		</div>
		@endif
		@if ($submission->file_perjanjian != null)
		<div class="p-2">
			<a href="{{ asset('storage/file/' . $submission->file_perjanjian) }}" target="_blank"><i class="fas fa-file-pdf"></i> Surat Perjanjian</a>
		</div>
		@endif
		@if ($submission->file_review != null)
		<div class="p-2">
			<a href="{{ asset('storate/file/' . $submission->file_review) }}" target="_blank"><i class="fas fa-file-word"></i> Dokumen Review</a>
		</div>
		@endif
	</div>
</div><hr>