<?php

namespace App\Services;

use App\Models\Form;

class FormService
{
   private $FormHead;

   public function __construct(Form $Form)
   {
        $this->Form = $Form;
   }

   public function all()
   {
        return $this->Form->query();
   }

   public function store($data)
   {
        return $this->Form->create($data);
   }
}
