<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationality', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->string('country_nationality',191)->nullable();
            $table->string('iso2',191)->nullable();
            $table->string('phonecode',191)->nullable();
            $table->string('currency',191)->nullable();
            $table->string('currency_symbol',191)->nullable();
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
        //
    }
};
