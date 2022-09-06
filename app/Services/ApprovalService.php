<?php

namespace App\Services;

use App\Models\FormHead;
use App\Services\Support\MappingApprovalService;

class FormHeadService
{
   private $FormHead;

   public function __construct(FormHead $FormHead)
   {
        $this->FormHead = $FormHead;
   }

   public function all()
   {
        return $this->FormHead->query();
   }

   public function store($data)
   {
        return $this->FormHead->create($data);
   }

   public function getNextApp($roleId)
   {
       $thisPosition = MappingApprovalService::getByTypeRoleId($roleId)->first()->position;

       $nextPosition = MappingApprovalService::getByPosition($thisPosition + 1)->first();

       return ($nextPosition != null) ? $nextPosition->role_id : 0;
   }

   
}
