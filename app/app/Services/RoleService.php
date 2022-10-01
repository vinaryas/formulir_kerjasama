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
        return $this->Role->create($data);
    }

    public function update($data, $id)
    {
        return $this->Role->where('id', $id)->update($data);
    }

    public function delete($data, $id)
    {
         return $this->Role->where('id', $id)->delete($data);
    }

    public function getWakilDekan()
    {
        return $this->Role
        ->where('id', '!=' , 1)
        ->where('id', '!=' , 5)
        ->where('id', '!=' , 7);
    }

}
