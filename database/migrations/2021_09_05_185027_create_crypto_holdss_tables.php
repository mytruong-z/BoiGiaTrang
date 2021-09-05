<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoHoldssTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_holds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('type');
            $table->string('market')->nullable();
            $table->float('amount')->default(0);
            $table->dateTime('purchase_time')->nullable();
            $table->float('average_price')->default(0);
            $table->float('pre_money')->default(0);
            $table->float('sale_price')->nullable();
            $table->dateTime('sale_time')->nullable();
            $table->float('fixed_money')->nullable();
            $table->float('profit')->nullable();
            $table->string('address')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('crypto_holds');
    }
}
