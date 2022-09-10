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

   public function getById($id)
   {
        return $this->RencanaFormalisasi->where('id', $id);
   }

   public function update($data, $id)
   {
        return $this->RencanaFormalisasi->where('id', $id)->update($data);
   }

   public function delete($data, $id)
   {
        return $this->RencanaFormalisasi->where('id', $id)->delete($data);
   }

}
