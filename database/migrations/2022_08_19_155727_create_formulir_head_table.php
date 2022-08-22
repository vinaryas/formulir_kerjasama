<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirHeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir_head', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kerjasama');
            $table->string('jenis_pengajuan');
            $table->string('nama_mitra_kerjasama');
            $table->string('alamat_mitra_kerjasama');
            $table->string('kategori_mitra');
            $table->string('pic_mitra');
            $table->string('nama');
            $table->string('nama_unit');
            $table->string('jabatan');
            $table->string('no_telp');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulir_head');
    }
}
