<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileApprovalFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form', function (Blueprint $table) {
            $table->string('lembar_persetujuan')->nullable()->after('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form', function (Blueprint $table) {
            $table->removeColumn('lembar_persetujuan');
        });
    }
}
