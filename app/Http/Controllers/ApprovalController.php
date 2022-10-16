<?php

namespace App\Http\Controllers;

use App\Services\Support\ApprovalService;
use App\Services\Support\FormService;
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
                    'status'=> 1,
                ];
                $updateStatus = ApprovalService::update($roleNextApp, $request->form_id);
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
                $roleNextApp = [
                    'role_last_app' => $roleUsers->role_id,
                    'role_next_app' => 0,
                    'status'=> 2,
                ];
                $updateStatus = ApprovalService::update($roleNextApp, $request->form_id);

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
