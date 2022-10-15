<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UploadDisposisiController extends Controller
{
    public function index()
	{
		$submissions = FormService::getUploadDisposition()->get();
		
		return view('disposisi.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('disposisi.detail2', compact('submission'));
	}

	public function update(Request $request, $id)
	{
		$data = [
			'status' => config('kerjasama.code_detail.status_pengajuan.review'),
			'disposition_by' => Auth::user()->id,
			'disposition_at' => now()
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'form berhasil disimpan');
        return redirect()->route('form.index');
	}
}
