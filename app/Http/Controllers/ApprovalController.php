<?php

namespace App\Http\Controllers;

use App\Models\StepKerjasama;
use App\Services\support\ApprovalService;
use App\Services\support\FormService;
use App\Services\Support\RoleUserService;
use App\Services\Support\StepKerjasamaService;
use App\Services\Support\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovalController extends Controller
{
    public function index(){
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();
        $forms = StepKerjasamaService::getStatusWakilDekan($roleUsers->role_id)->get();

        return view('Approval.index', compact('forms'));
    }

    public function detail($id){
        $forms = FormService::getById($id)->first();

        return view('Approval.detail', compact('forms'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();

        if (isset($_POST["approve"])){
            try{
                $dataApp = [
                    'form_id' => $request->form_id,
                    'approved_by' => Auth::user()->id,
                    'approved_at' => now(),
                    'last_role' => $roleUsers->role_id,
                    'next_role' => config('setting_app.role_id.admin'),
                    'status'=> config('setting_app.status.surat_dispositon')
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
        }elseif (isset($_POST["disapprove"])){
            try{
                $dataApp = [
                    'form_id' => $request->form_id,
                    'rejected_by' => Auth::user()->id,
                    'rejected_at' => now(),
                    'last_role' => $roleUsers->role_id,
                    'next_role' => config('setting_app.role_id.no_next'),
                    'status'=> config('setting_app.status.ditolak_wakil_dekan')
                ];

                $updateStatus = StepKerjasamaService::update($dataApp, $request->form_id);

                DB::commit();

                Alert::warning('Disapproved', 'form has been disapproved');
                return redirect()->route('approval.index');
            }catch (\Throwable $th) {
                DB::rollback();
                dd($th->getMessage());
                Alert::error('Error!!',);
                return redirect()->route('approval.index');
            }
        }
    }
}
