<div class="list-group">
	@forelse ($submissions as $submission)
		<div class="list-group-item list-group-item-action flex-column align-items-start">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1">{{ $submission->nama_mitra_kerjasama }}</h5>
				<small>{{ $submission->created_at->diffForHumans() }}</small>
			</div><hr>
			<span class="badge badge-secondary">{{ $submission->jenisKerjasama->kerjasama }}</span> <span class="badge badge-info">{{ $submission->jenisPengajuan->pengajuan }}</span>
			<p class="mb-1 mt-1">{{ $submission->rencana_kegiatan }}</p>
			<small>{{ $submission->pic_mitra }} <strong>({{ $submission->no_telp }})</strong></small>
			<div>
				@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.pengecekan_awal'))
				<span class="badge badge-primary">Pengecekan Awal</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.persetujuan_wd'))
				<span class="badge badge-primary">Persetujuan Wakil Dekan</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.upload_disposisi'))
				<span class="badge badge-primary">Upload Disposisi</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.review'))
				<span class="badge badge-primary">Review</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.pengecekan_akhir'))
				<span class="badge badge-primary">Pengecekan Akhir</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.upload_final'))
				<span class="badge badge-primary">Upload Berkas Final</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.ditolak_wd'))
				<span class="badge badge-danger">Ditolak Wakil Dekan</span>
				@elseif ($submission->status == config('kerjasama.code_detail.status_pengajuan.selesai'))
				<span class="badge badge-success">Selesai</span>
				@endif
			</div>

			<div class="d-flex flex-wrap pt-2">
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
					<a href="{{ asset('storage/file/' . $submission->file_review) }}" target="_blank"><i class="fas fa-file-word"></i> Dokumen Review</a>
				</div>
				@endif
				@if ($submission->file_final != null)
				<div class="p-2">
					<a href="{{ asset('storage/file/' . $submission->file_final) }}" target="_blank"><i class="fas fa-file-word"></i> Dokumen Draft Final</a>
				</div>
				@endif
			</div>

			<hr>
			<div class="float-right">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Proses
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{ route('form.detail', $submission->id) }}">Detail</a>
						@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.pengecekan_awal') and Auth::user()->isAbleTo('disposisi'))
							<a class="dropdown-item" href="{{ route('disposisition.detail', $submission->id) }}">Disposisi</a>
						@endif
						@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.persetujuan_wd') and Auth::user()->isAbleTo('persetujuan'))
							<a class="dropdown-item" href="{{ route('persetujuan.detail', $submission->id) }}">Persetujuan</a>
						@endif
						@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.upload_disposisi') and Auth::user()->isAbleTo('disposisi'))
							<a class="dropdown-item" href="{{ route('uploadDisposisition.detail', $submission->id) }}">Upload Berkas Disposisi</a>
						@endif
						@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.review') and Auth::user()->isAbleTo('review'))
							<a class="dropdown-item" href="{{ route('review.detail', $submission->id) }}">Review</a>
						@endif
						@if ($submission->status == config('kerjasama.code_detail.status_pengajuan.selesai'))
							<a class="dropdown-item btn-hasil-review" href="#" data-submission-id="{{ $submission->id }}">Hasil Review</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	@empty
		<p>Tidak ada pengajuan</p>
	@endforelse
</div>

<div class="pt-2">
	{{ $submissions->links() }}
</div>