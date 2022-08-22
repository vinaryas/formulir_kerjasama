<?php

namespace App\Services;

use App\Models\RencanaFormalisasi;

class RencanaFormalisasiService
{
   private $RencanaFormalisasi;

   public function __construct(RencanaFormalisasi $RencanaFormalisasi)
   {
        $this->RencanaFormalisasi = $RencanaFormalisasi;
   }

   public function all()
   {
        return $this->RencanaFormalisasi->query();
   }

   public function store($data)
   {
        return $this->RencanaFormalisasi->create($data);
   }
}
