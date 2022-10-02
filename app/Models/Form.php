<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table ='form';
    protected $guarded = [];

	public function jenisKerjasama()
	{
		return $this->hasOne(JenisKerjasama::class, 'id', 'jenis_kerjasama');
	}

	public function jenisPengajuan()
	{
		return $this->hasOne(JenisPengajuan::class, 'id', 'jenis_pengajuan');
	}

	public function kategoriMitra()
	{
		return $this->hasOne(KategoriMitra::class, 'id', 'kategori_mitra');
	}

	public function rencanaFormalisasi()
	{
		return $this->hasOne(RencanaFormalisasi::class, 'id', 'rencana_formalisasi');
	}

	public function scopewithRelations($query)
    {
        return $query->with([
            'jenisKerjasama',
			'jenisPengajuan',
			'kategoriMitra',
			'rencanaFormalisasi'
        ]);
    }
}
