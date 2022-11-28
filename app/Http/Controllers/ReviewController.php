<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Http\Requests\ReviewRequest;
use App\Services\Support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
	{
		$submission = null;

		if(Auth::user()->hasRole('reviewer')){
			$submissions = FormService::getreview()->paginate(5);
		}elseif(Auth::user()->hasRole('reviewer2')){
			$submissions = FormService::getreview2()->paginate(5);
		}

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

			if($request->status == 4){
				$data = [
					'status' => config('kerjasama.code_detail.status_pengajuan.review2'),
					'reviewed_by' => Auth::user()->id,
					'reviewed_at' => now(),
					'file_review' => $fileReview['name'],
				];
			}else{
				$data = [
					'status' => config('kerjasama.code_detail.status_pengajuan.pengecekan_akhir'),
					'reviewed2_by' => Auth::user()->id,
					'reviewed2_at' => now(),
					'file_review2' => $fileReview['name'],
				];
			}

			$res = FormService::update($data, $id);

			Alert::success('succes', 'form berhasil disimpan');
			return redirect()->route('review.index');
		} catch (\Throwable $th) {
			dd($th->getMessage(), $th->getTrace());
			return redirect()->route('review.index');
		}
	}
}
