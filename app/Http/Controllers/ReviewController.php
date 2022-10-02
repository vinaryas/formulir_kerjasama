<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
	{
		$submissions = FormService::getreview()->get();
		
		return view('review.index', compact('submissions'));
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('review.detail', compact('submission'));
	}

	public function review(Request $request, $id)
	{
		try {
			$data = [
				'status' => 20,
				'reviewed_by' => Auth::user()->id,
				'reviewed_at' => now()
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
