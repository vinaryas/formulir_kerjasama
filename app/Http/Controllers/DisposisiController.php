<?php

namespace App\Http\Controllers;

use App\Services\Support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DisposisiController extends Controller
{
    public function index()
	{
		$submissions = FormService::getFirstCheck()->paginate(5);
		
		return view('disposisi.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('disposisi.detail1', compact('submission'));
	}

	public function detail2($id)
	{
		$submission = FormService::getById($id)->first();

		return view('disposisi.detail2', compact('submission'));
	}

	public function disposition(Request $request, $id)
	{
		$data = [
			'status' => config('kerjasama.code_detail.status_pengajuan.persetujuan_wd'),
			'disposition_by' => Auth::user()->id,
			'disposition_at' => now()
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'form berhasil disimpan');
        return redirect()->route('form.index');
	}
}
