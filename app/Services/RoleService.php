<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
   private $Role;

   public function __construct(Role $Role)
    {
        $this->Role = $Role;
    }

   public function all()
	{
		return $this->Role->query();
	}

    public function sync($data){
        return $this->Role->updateOrCreate($data);
    }

    public function store($data){
        return $this->Permission->create($data);
    }

    public function update($data, $id)
    {
        return $this->RoleUser->where('user_id', $id)->update($data);
    }

}
