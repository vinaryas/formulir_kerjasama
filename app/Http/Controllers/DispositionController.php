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

class DispositionController extends Controller
{
    public function index(){
        $forms = StepKerjasamaService::getStatusDisposition()->get();

        return view('Disposition.index', compact('forms'));
    }

    public function detail($id){
        $forms = FormService::getById($id)->first();
        $wakilDekan = RoleService::getWakilDekan()->get();

        return view('Disposition.detail', compact('forms', 'wakilDekan'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();

        try{
            $dataApp = [
                'disposition_by' => Auth::user()->id,
                'disposition_at' => now(),
                'last_role' => $roleUsers->role_id,
                'next_role' => $request->next_role_id,
                'status'=> 2
            ];

            $updateStatus = StepKerjasamaService::update($dataApp, $request->form_id);

            DB::commit();

            Alert::success('Approved', 'form has been approved');
            return redirect()->route('disposition.index');
        }catch(\Throwable $th){
            DB::rollback();
            dd($th->getMessage());
            Alert::error('Error!!',);
            return redirect()->route('disposition.index');
        }
    }
}
