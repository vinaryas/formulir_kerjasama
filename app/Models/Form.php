<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table ='form';
    protected $guarded = [];

    public function jenis_kerjasama()
    {
        return $this->hasOne(JenisKerjasama::class, 'id', 'jenis_kerjasama');
    }

    public function jenis_pengajuan()
    {
        return $this->hasOne(JenisPengajuan::class, 'id', 'jenis_pengajuan');
    }

    public function kategori_mitra()
    {
        return $this->hasOne(KategoriMitra::class, 'id', 'kategori_mitra');
    }

    public function rencana_formalisasi()
    {
        return $this->hasOne(RencanaFormalisasi::class, 'id', 'rencana_formalisasi');
    }

}
