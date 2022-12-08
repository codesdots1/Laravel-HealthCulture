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
        Schema::create('coach_recipe_rating', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_recipe_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->double('rating',8,2)->nullable();
            $table->text('comments')->nullable();
            $table->enum('status',['1','2','0'])->nullable()->default('1');
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
