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
        Schema::create('coach_recipe', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_id')->nullable();
            $table->string('thumbnail_image',191)->nullable();
            $table->string('title',191)->nullable();
            $table->text('sub_title')->nullable();
            $table->string('duration',191)->nullable();
            $table->text('recipe_step')->nullable();
            $table->text('qty_ingredient')->nullable();
            $table->enum('status',['1','2','0'])->default('1');
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
