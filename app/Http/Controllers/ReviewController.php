<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use App\Services\Support\RoleUserService;
use App\Services\Support\StepKerjasamaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index(){
        $forms = StepKerjasamaService::getStatusReviewer()->get();

        return view('Review.index', compact('forms'));
    }

    public function detail($id){
        $forms = FormService::getById($id)->first();

        return view('Review.detail', compact('forms'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();

        try{
            $dataApp = [
                'reviewed_by' => Auth::user()->id,
                'reviewed_at' => now(),
                'last_role' => $roleUsers->role_id,
                'next_role' => config('setting_app.role_id.no_next'),
                'status'=> config('setting_app.status.selesai')
            ];

            $updateStatus = StepKerjasamaService::update($dataApp, $request->form_id);

            DB::commit();

            Alert::success('Approved', 'form has been approved');
            return redirect()->route('review.index');
        }catch(\Throwable $th){
            DB::rollback();
            dd($th->getMessage());
            Alert::error('Error!!',);
            return redirect()->route('review.index');
        }
    }
}
