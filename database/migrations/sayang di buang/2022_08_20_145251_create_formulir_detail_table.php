<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('formulir_head_id');
            $table->string('pic_fakultas');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('email');
            $table->string('lingkup_kerjasama');
            $table->string('rencana_kegiatan');
            $table->string('rencana_formalisasi');
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
        Schema::dropIfExists('formulir_detail');
    }
}
