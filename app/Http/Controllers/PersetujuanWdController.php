<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PersetujuanWdController extends Controller
{
    public function index()
	{
		$submissions = FormService::getApprovalWd()->get();
		
		return view('persetujuan.index', compact('submissions'));
	}

	public function detail($id)
{
		$submission = FormService::getById($id)->first();

		return view('persetujuan.detail', compact('submission'));
	}

	public function approve(Request $request, $id)
	{
		$data = [
			'status' => 3,
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
				'status' => 10,
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
