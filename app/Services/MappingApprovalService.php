<?php

namespace App\Services;

use App\Models\MappingApp;

class MappingApprovalFormHeadService
{
    private $MappingApprovalFormHead;

    public function __construct(MappingApp $MappingApprovalFormHead)
    {
        $this->MappingApprovalFormHead = $MappingApprovalFormHead;
    }

    public function getByTypeRoleId($roleId, $regionId)
    {
        return $this->MappingApprovalFormHead
                    ->where('role_id', $roleId);
    }

    public function getByPosition($position, $regionId)
    {
        return $this->MappingApprovalFormHead
                    ->where('position', $position);
    }
}
