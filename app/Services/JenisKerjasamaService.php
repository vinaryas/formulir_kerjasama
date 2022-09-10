<?php

namespace App\Services;

use App\Models\JenisKerjasama;

class JenisKerjasamaService
{
   private $JenisKerjasama;

   public function __construct(JenisKerjasama $JenisKerjasama)
   {
        $this->JenisKerjasama = $JenisKerjasama;
   }

   public function all()
   {
        return $this->JenisKerjasama->query();
   }

   public function store($data)
   {
        return $this->JenisKerjasama->create($data);
   }

   public function getById($id)
   {
        return $this->JenisKerjasama->where('id', $id);
   }

   public function update($data, $id)
   {
        return $this->JenisKerjasama->where('id', $id)->update($data);
   }

   public function delete($data, $id)
   {
        return $this->JenisKerjasama->where('id', $id)->delete($data);
   }

}
