<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Http\Requests\ReviewRequest;
use App\Services\support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
	{
		$submissions = FormService::getreview()->paginate(5);
		
		return view('review.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('review.detail', compact('submission'));
	}

	public function review(ReviewRequest $request, $id)
	{
		try {
			$allowedfileExtension = ['doc', 'docx'];
			$fileReview = StoreFile::storeFile($request->file_review, config('kerjasama.file_path'), $allowedfileExtension);

			$data = [
				'status' => config('kerjasama.code_detail.status_pengajuan.pengecekan_akhir'),
				'reviewed_by' => Auth::user()->id,
				'reviewed_at' => now(),
				'comment' => $request->comment,
				'file_review' => $fileReview['name'],
			];
	
			$res = FormService::update($data, $id);

			Alert::success('succes', 'form berhasil disimpan');
			return redirect()->route('form.index');
		} catch (\Throwable $th) {
			dd($th->getMessage(), $th->getTrace());
			return redirect()->route('form.index');
		}
	}
}
