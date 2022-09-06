<?php

namespace App\Services;

use App\Models\MappingApp;

class MappingApprovalService
{
    private $MappingApp;

    public function __construct(MappingApp $MappingApp)
    {
        $this->MappingApp = $MappingApp;
    }

    public function getByTypeRoleId($roleId, $regionId)
    {
        return $this->MappingApp
                    ->where('role_id', $roleId);
    }

    public function getByPosition($position, $regionId)
    {
        return $this->MappingApp
                    ->where('position', $position);
    }
}
