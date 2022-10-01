<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Rbac\PermissionService as PermissionService;
use App;
use DB;
use DataTables;
use App\Helper\MyHelper;
use App\Models\PermissionRole;
use App\Models\Role;

class PermissionRoleController extends Controller
{
    public function dt($role_id)
    {
        $permissions = PermissionRole::getPermissionRole($role_id);

        return DataTables::of($permissions)
                ->addColumn('action', function ($permissions) {

                    $checked = (!empty($permissions->role_id)) ? 'checked' : '';

                    return '
                    <input type="checkbox" class="cb_permission" value="' . $permissions->id . '" name="cb_permission[]" '. $checked .'>
                    ';

                })->make(true);
    }

    public function update(Request $request)
    {

        try {
            DB::beginTransaction();

            $role = Role::find($request->role_id);

            $role->syncPermissions($request->permission_id);

            DB::commit();

            $output = [
                'icon' => 'success',
                'text' => "Permission updated succesfully",
            ];

        } catch (\Throwable $th) {
            DB::rollback();

            $output = [
                'icon' => 'error',
                'text' => $th->getMessage(),
            ];
        }

        return MyHelper::toastNotification($output);
    }

    public function list($role_id)
    {

        return view('rbac.role.tree_permission', compact('role_id'));

    }
}
