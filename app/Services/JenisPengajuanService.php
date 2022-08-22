<?php

namespace App\Services;

use App\Models\JenisPengajuan;

class JenisPengajuanService
{
   private $JenisPengajuan;

   public function __construct(JenisPengajuan $JenisPengajuan)
   {
        $this->JenisPengajuan = $JenisPengajuan;
   }

   public function all()
   {
        return $this->JenisPengajuan->query();
   }

   public function store($data)
   {
        return $this->JenisPengajuan->create($data);
   }
}
