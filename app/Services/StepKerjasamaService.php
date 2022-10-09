<?php

namespace App\Services;

use App\Models\StepKerjasama;
use Illuminate\Support\Facades\DB;

class StepKerjasamaService
{
    private $StepKerjasama;

    public function __construct(StepKerjasama $StepKerjasama)
    {
        $this->StepKerjasama = $StepKerjasama;
    }

    public function all()
	{
		return $this->StepKerjasama->query();
	}

    public function store($data){
        return $this->StepKerjasama->create($data);
    }

    public function update($data, $id)
    {
        return $this->StepKerjasama->where('id', $id)->update($data);
    }

    public function joinForm()
    {
        $data = DB::table('step_kerjasama')
        ->join('form', 'step_kerjasama.form_id', '=', 'form.id')
        ->select(
            'form.id as form_id',
            'form.jenis_kerjasama as jenis_kerjasama',
            'form.jenis_pengajuan as jenis_pengajuan',
            'form.nama_mitra_kerjasama as nama_mitra_kerjasama',
            'form.alamat_mitra_kerjasama as alamat_mitra_kerjasama',
            'form.kategori_mitra as kategori_mitra',
            'form.pic_mitra as pic_mitra',
            'form.nama as nama',
            'form.nama_unit as nama_unit',
            'form.jabatan as jabatan',
            'form.no_telp as no_telp',
            'form.email as email',
            'form.lingkup_kerjasama as lingkup_kerjasama',
            'form.rencana_kegiatan as rencana_kegiatan',
            'form.rencana_formalisasi as rencana_formalisasi',
            'form.tgl as tgl',
            'form.tempat as tempat',
            'form.uuid as uuid',
            'form.file as file',
            'form.path as path',
            'form.created_at as created_at',
            'form.updated_at as updated_at',
            'step_kerjasama.created_by as created_by',
            'step_kerjasama.last_role as last_role',
            'step_kerjasama.next_role as next_role',
            'step_kerjasama.status as status',
            'step_kerjasama.disposition_by as disposition_by',
            'step_kerjasama.disposition_at as disposition_at',
            'step_kerjasama.approved_by as approved_by',
            'step_kerjasama.approved_at as approved_at',
            'step_kerjasama.rejected_by as rejected_by',
            'step_kerjasama.rejected_at as rejected_at',
            'step_kerjasama.reviewed_by as reviewed_by',
            'step_kerjasama.reviewed_at as reviewed_at',
            'step_kerjasama.remark as remark',
        );

        return $data;
    }

    public function getStatusDisposition()
    {
        return $this->joinForm()->where('status', config('setting_app.status.disposition'));
    }

    public function getStatusWakilDekan($roleId)
    {
        return $this->joinForm()
        ->where('status', config('setting_app.status.wakil_dekan'))
        ->where('next_role', $roleId);
    }

    public function getStatusReviewer()
    {
        return $this->joinForm()->where('status', config('setting_app.status.reviewer'));
    }
}
