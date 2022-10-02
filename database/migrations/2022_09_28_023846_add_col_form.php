<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form', function (Blueprint $table) {
            $table->smallInteger('status')->after('path')->default(0);
			$table->bigInteger('disposition_by')->after('status')->nullable();
			$table->timestamp('disposition_at')->after('disposition_by')->nullable();
			$table->bigInteger('approved_by')->after('disposition_at')->nullable();
			$table->timestamp('approved_at')->after('approved_by')->nullable();
			$table->bigInteger('rejected_by')->after('approved_at')->nullable();
			$table->timestamp('rejected_at')->after('rejected_by')->nullable();
			$table->bigInteger('reviewed_by')->after('rejected_at')->nullable();
			$table->timestamp('reviewed_at')->after('reviewed_by')->nullable();
			$table->string('remark')->after('reviewed_at')->nullable();
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
            $table->dropColumn('status');
            $table->dropColumn('disposition_by');
            $table->dropColumn('disposition_at');
            $table->dropColumn('approved_by');
            $table->dropColumn('approved_at');
            $table->dropColumn('rejected_by');
            $table->dropColumn('rejected_at');
            $table->dropColumn('reviewed_by');
            $table->dropColumn('reviewed_at');
            $table->dropColumn('remark');
        });
    }
}
