<?php

namespace App\Services\Rbac;

use App\Models\Role;

class RoleService{

    public function saveData($data)
    {
        $user = Role::create($data);

        return $user;
    }

    public function updateData($data, $id)
    {
        $user = Role::where('id', '=', $id)->update($data);

        return $user;
    }


}
