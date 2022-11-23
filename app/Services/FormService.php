<?php

namespace App\Services;

use App\Models\Form;

class FormService
{
	private $Form;
	
	public function __construct(Form $Form)
	{
		$this->Form = $Form;
	}
	
	public function all()
	{
		return $this->Form->query()->withRelations();
	}
	
	public function store($data)
	{
		return $this->Form->create($data);
	}
	
	public function getById($id)
	{
		return $this->all()->where('id', $id);
	}

	public function update($data, $id)
	{
		return $this->Form->where('id', $id)->update($data);
	}
	
	public function getFirstCheck()
	{
		return $this->all()
				->where('status', config('kerjasama.code_detail.status_pengajuan.pengecekan_awal'))
				->orWhere('status', config('kerjasama.code_detail.status_pengajuan.upload_disposisi'));
	}

	public function getUploadDisposition()
	{
		return $this->all()->where('status', config('kerjasama.code_detail.status_pengajuan.upload_disposisi'));
	}

	public function getApprovalWd()
	{
		return $this->all()->where('status', config('kerjasama.code_detail.status_pengajuan.persetujuan_wd'));
	}

	public function getReview()
	{
		return $this->all()
				->where('status', config('kerjasama.code_detail.status_pengajuan.review'))
				->orWhere('status', config('kerjasama.code_detail.status_pengajuan.review2'));
	}

	public function getDataAdmin()
	{
		return $this->all()
				->where('status', config('kerjasama.code_detail.status_pengajuan.pengecekan_awal'))
				->orWhere('status', config('kerjasama.code_detail.status_pengajuan.pengecekan_akhir'))
				->orWhere('status', config('kerjasama.code_detail.status_pengajuan.upload_disposisi'));
	}
}
