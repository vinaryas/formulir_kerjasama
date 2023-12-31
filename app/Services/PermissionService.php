<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
	private $Permission;

    public function __construct(Permission $Permission)
    {
        $this->Permission = $Permission;
    }

	public function all(){
		return $this->Permission->query();
	}

    public function sync($data){
        return $this->Permission->updateOrCreate($data);
    }

    public function store($data){
        return $this->Permission->create($data);
    }

    public function find($id){
        return $this->all()->where('id', $id);
    }

   public function update($data, $id)
   {
        return $this->KategoriMitra->where('id', $id)->update($data);
   }

   public function delete($data, $id)
   {
        return $this->KategoriMitra->where('id', $id)->delete($data);
   }

}
