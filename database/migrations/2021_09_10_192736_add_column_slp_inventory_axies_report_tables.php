<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSlpInventoryAxiesReportTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('axie_reports', function (Blueprint $table) {
            $table->bigInteger('slp_inventory')->default(0)->after('slp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('axie_reports', function (Blueprint $table) {
            $table->dropColumn('slp_inventory');
        });
    }
}
