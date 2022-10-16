<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Http\Requests\UploadDispositionRequest;
use App\Services\Support\FormService;
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

	public function update(UploadDispositionRequest $request, $id)
	{
		$allowedfileExtension = ['pdf', 'doc', 'docx'];
		$fileDisposition = StoreFile::storeFile($request->file_disposition, config('kerjasama.file_path'), $allowedfileExtension);
		$data = [
			'status' => config('kerjasama.code_detail.status_pengajuan.review'),
			'disposition_by' => Auth::user()->id,
			'disposition_at' => now(),
			'file_disposition' => $fileDisposition['name']
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'form berhasil disimpan');
        return redirect()->route('form.index');
	}
}
