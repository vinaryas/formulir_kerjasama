<?php

namespace App\Http\Controllers;

use App\Services\Support\PermissionRoleService;
use App\Services\Support\PermissionService;
use App\Services\Support\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class permissionRoleController extends Controller
{
    public function index(){
        $permissionRoles = PermissionRoleService::all()->get();
        $permissions = PermissionService::all()->get();
        $roles = RoleService::all()->get();

        return view('permission_role.index', compact('permissionRoles', 'permissions', 'roles'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'permission_id'=>$request->permission_id,
                'role_id'=>$request->role_id,
            ];
            $store = PermissionRoleService::store($data);
            DB::commit();
            return redirect()->route('permission_role.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
