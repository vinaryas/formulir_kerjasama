<?php

namespace App\Http\Controllers;

use App\Services\support\ApprovalService;
use App\Services\support\FormService;
use App\Services\Support\RoleUserService;
use App\Services\Support\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovalController extends Controller
{
    public function index(){
        $forms = FormService::all()->get();

        return view('Approval.index', compact('forms'));
    }

    public function detail($id){
        $forms = FormService::getById($id)->first();


        return view('Approval.detail', compact('forms'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();
        $nextApp = ApprovalService::getNextApp($roleUsers->role_id, Auth::user()->region_id);

        if (isset($_POST["approve"])){
            try{
                $roleNextApp = [
                    'role_last_app' => $roleUsers->role_id,
                    'role_next_app' => $nextApp,
                    'status'=> config('setting_app.status_approval.approve'),
                ];
                $updateStatus = ApprovalService::update($roleNextApp);
                DB::commit();

                Alert::success('Approved', 'form has been approved');
                return redirect()->route('approval_pembuatan.index');
            }catch(\Throwable $th){
                DB::rollback();
                dd($th->getMessage());
                Alert::error('Error!!',);
                return redirect()->route('approval_pembuatan.index');
            }
        }elseif (isset($_POST["disapprove"])){
            try{
                $roleNextApp = [
                    'role_last_app' => $roleUsers->role_id,
                    'role_next_app' => 0,
                    'status'=> config('setting_app.status_approval.disapprove'),
                ];
                $updateStatus = ApprovalService::update($roleNextApp);

                DB::commit();

                Alert::warning('Disapproved', 'form has been disapproved');
                return redirect()->route('approval_pembuatan.index');
            }catch (\Throwable $th) {
                DB::rollback();
                dd($th->getMessage());
                Alert::error('Error!!',);
                return redirect()->route('approval_pembuatan.index');
            }
        }
    }
}
