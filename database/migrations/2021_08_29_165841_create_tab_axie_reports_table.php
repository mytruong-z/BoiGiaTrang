<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabAxieReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axie_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slp');
            $table->integer('ruin');
            $table->integer('level');
            $table->integer('rank');
            $table->string('note');
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained();
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
        Schema::dropIfExists('axie_reports');
    }
}
