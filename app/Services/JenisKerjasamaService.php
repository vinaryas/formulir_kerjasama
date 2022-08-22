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
}
