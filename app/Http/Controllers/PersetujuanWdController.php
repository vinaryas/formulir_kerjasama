<?php

namespace App\Http\Controllers;

use App\Services\Support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PersetujuanWdController extends Controller
{
    public function index()
	{
		$submissions = FormService::getApprovalWd()->paginate(5);
		
		return view('persetujuan.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('persetujuan.detail', compact('submission'));
	}

	public function approve(Request $request, $id)
	{
		$request->validate([
			'comment' => 'required',
		], [
			'comment.required' => 'Mohon isi komentar sebelum menyetujui atau menolak'
		]);

		$data = [
			'status' => config('kerjasama.code_detail.status_pengajuan.upload_disposisi'),
			'comment' => $request->comment,
			'approved_by' => Auth::user()->id,
			'approved_at' => now()
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'form berhasil disimpan');
        return redirect()->route('persetujuan.index');
	}

	public function reject(Request $request, $id)
	{
		try {
			$data = [
				'status' => config('kerjasama.code_detail.status_pengajuan.ditolak_wd'),
				'rejected_by' => Auth::user()->id,
				'rejected_at' => now(),
				'remark' => 'remark'
			];
	
			$res = FormService::update($data, $id);

			return [
				'success' => true,
			];
		} catch (\Throwable $th) {
			return [
				'success' => false,
				'message' => $th->getMessage(),
				'trace' => $th->getTrace()
			];
		}
	}
}
