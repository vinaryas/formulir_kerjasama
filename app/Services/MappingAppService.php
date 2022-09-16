<?php

namespace App\Services;

use App\Models\MappingApp;

class MappingAppService
{
    private $MappingApp;

    public function __construct(MappingApp $MappingApp)
    {
        $this->MappingApp = $MappingApp;
    }

    public function all()
   {
        return $this->MappingApp->query();
   }

   public function store($data)
   {
        return $this->MappingApp->create($data);
   }

   public function getById($id)
   {
        return $this->MappingApp->where('id', $id);
   }

   public function update($data, $id)
   {
        return $this->MappingApp->where('id', $id)->update($data);
   }

   public function delete($data, $id)
   {
        return $this->MappingApp->where('id', $id)->delete($data);
   }

    public function getByTypeRoleId($roleId)
    {
        return $this->MappingApp
                    ->where('role_id', $roleId);
    }

    public function getByPosition($position)
    {
        return $this->MappingApp
                    ->where('position', $position);
    }
}
