<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form', function (Blueprint $table) {
            // $table->after('updated_at', function ($table) {
                $table->integer('status')->after('updated_at');
                $table->integer('disposition_by')->nullable()->after('status');
                $table->timestamp('disposition_at')->nullable()->after('disposition_by');
                $table->integer('approved_by')->nullable()->after('disposition_at');
                $table->timestamp('approved_at')->nullable()->after('approved_by');
                $table->integer('rejected_by')->nullable()->after('approved_at');
                $table->timestamp('rejected_at')->nullable()->after('rejected_by');
                $table->integer('reviewed_by')->nullable()->after('rejected_at');
                $table->timestamp('reviewed_at')->nullable()->after('reviewed_by');
                $table->string('remark')->nullable()->after('reviewed_at');
            // });
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
