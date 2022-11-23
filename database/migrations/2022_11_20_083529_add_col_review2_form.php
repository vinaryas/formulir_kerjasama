<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColReview2Form extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form', function (Blueprint $table) {
            $table->bigInteger('reviewed2_by')->nullable();
			$table->timestamp('reviewed2_at')->nullable();
			$table->string('file_review2')->nullable();
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
            $table->dropColumn('reviewed2_by');
            $table->dropColumn('reviewed2_at');
            $table->dropColumn('file_review2');
        });
    }
}
