<?php

namespace App\Services;

use App\Models\LingkupKerjasama;

class LingkupKerjasamaService
{
   private $LingkupKerjasama;

   public function __construct(LingkupKerjasama $LingkupKerjasama)
   {
        $this->LingkupKerjasama = $LingkupKerjasama;
   }

   public function all()
   {
        return $this->LingkupKerjasama->query();
   }

   public function store($data)
   {
        return $this->LingkupKerjasama->create($data);
   }

   public function getById($id)
   {
        return $this->LingkupKerjasama->where('id', $id);
   }

   public function update($data, $id)
   {
        return $this->LingkupKerjasama->where('id', $id)->update($data);
   }

   public function delete($data, $id)
   {
        return $this->LingkupKerjasama->where('id', $id)->delete($data);
   }

}
