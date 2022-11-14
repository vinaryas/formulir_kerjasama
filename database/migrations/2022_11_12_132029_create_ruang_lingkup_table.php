<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangLingkupTable extends Migration
{
    public function up()
    {
        Schema::create('ruang_lingkup', function (Blueprint $table) {
            $table->id();
			$table->string('nama');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruang_lingkup');
    }
}
