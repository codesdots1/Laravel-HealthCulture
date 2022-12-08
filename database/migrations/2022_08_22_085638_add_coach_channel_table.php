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
        Schema::create('coach_channel', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_id')->nullable();
            $table->string('ingest_endpoint',191)->nullable();
            $table->string('playbackurl',191)->nullable();
            $table->text('streamdata')->nullable();
            $table->text('channel_details')->nullable();
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
