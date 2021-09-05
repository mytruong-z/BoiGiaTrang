<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAmountCryptoHoldsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crypto_holds', function (Blueprint $table) {
            $table->decimal('amount', 12, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crypto_holds', function (Blueprint $table) {
            $table->float('amount')->change();
        });
    }
}
