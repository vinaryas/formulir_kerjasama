<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_kerjasama');
            $table->integer('jenis_pengajuan');
            $table->string('nama_mitra_kerjasama');
            $table->string('alamat_mitra_kerjasama');
            $table->integer('kategori_mitra');
            $table->string('pic_mitra');
            $table->string('nama');
            $table->string('nama_unit');
            $table->string('jabatan');
            $table->string('no_telp');
            $table->string('email');
            $table->string('lingkup_kerjasama');
            $table->string('rencana_kegiatan');
            $table->integer('rencana_formalisasi');
            $table->date('tgl');
            $table->string('tempat');
            $table->uuid('uuid')->nullable();
            $table->string('file')->nullable();
            $table->string('path')->nullable();
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
        Schema::dropIfExists('form');
    }
}
