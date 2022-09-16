<?php

namespace App\Services;

use App\Models\Approval;

use App\Services\Support\MappingAppService;

class ApprovalService
{
   private $Approval;

   public function __construct(Approval $Approval)
   {
        $this->Approval = $Approval;
   }

   public function all()
   {
        return $this->Approval->query();
   }

   public function store($data)
   {
        return $this->Approval->create($data);
   }

   public function update($data, $formId)
    {
        return $this->Approval->where('form_id', $formId)->update($data);
    }

   public function getNextApp($roleId)
   {
       $thisPosition = MappingAppService::getByTypeRoleId($roleId)->first()->position;

       $nextPosition = MappingAppService::getByPosition($thisPosition + 1)->first();

       return ($nextPosition != null) ? $nextPosition->role_id : 0;
   }


}
