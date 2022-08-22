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
}
