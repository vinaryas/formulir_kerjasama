<?php

namespace App\Services;

use App\Models\KategoriMitra;

class KategoriMitraService
{
   private $KategoriMitra;

   public function __construct(KategoriMitra $KategoriMitra)
   {
        $this->KategoriMitra = $KategoriMitra;
   }

   public function all()
   {
        return $this->KategoriMitra->query();
   }

   public function store($data)
   {
        return $this->KategoriMitra->create($data);
   }

   public function getById($id)
   {
        return $this->KategoriMitra->where('id', $id);
   }

   public function update($data, $id)
   {
        return $this->KategoriMitra->where('id', $id)->update($data);
   }
}
