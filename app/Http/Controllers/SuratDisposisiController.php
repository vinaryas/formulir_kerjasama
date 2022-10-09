<?php

namespace App\Http\Controllers;

use App\Services\support\FormService;
use App\Services\Support\RoleService;
use App\Services\Support\RoleUserService;
use App\Services\Support\StepKerjasamaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SuratDispositionController extends Controller
{
    public function detail($id){
        $forms = FormService::getById($id)->first();

        return view('Disposition.surat', compact('forms'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();
        try{
            $dataApp = [
                'form_id' => $request->form_id,
                'approved_by' => Auth::user()->id,
                'approved_at' => now(),
                'last_role' => $roleUsers->role_id,
                'next_role' => config('setting_app.role_id.reviewer'),
                'status'=> config('setting_app.status.reviewer')
            ];

            $updateStatus = StepKerjasamaService::update($dataApp, $request->form_id);
            DB::commit();

            Alert::success('Approved', 'form has been approved');
            return redirect()->route('approval.index');
        }catch(\Throwable $th){
            DB::rollback();
            dd($th->getMessage());
            Alert::error('Error!!',);
            return redirect()->route('approval.index');
        }
    }
}
