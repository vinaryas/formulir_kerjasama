<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DisposisiController extends Controller
{
    public function index()
	{
		$submissions = FormService::getDisposition()->get();
		
		return view('disposisi.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('disposisi.detail', compact('submission'));
	}

	public function disposition(Request $request, $id)
	{
		$data = [
			'status' => 2,
			'disposition_by' => Auth::user()->id,
			'disposition_at' => now()
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'form berhasil disimpan');
        return redirect()->route('disposisition.index');
	}
}
