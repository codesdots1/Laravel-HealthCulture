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
        Schema::create('coach_class', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_id')->nullable();
            $table->enum('coach_class_type',['live','on_demand'])->default('live');
            $table->string('class_subtitle',191)->nullable();
            $table->string('thumbnail_image',191)->nullable();
            $table->text('thumbnail_video')->nullable();
            $table->bigInteger('class_type_id')->nullable();
            $table->bigInteger('class_difficulty_id')->nullable();
            $table->date('class_date')->nullable();
            $table->time('class_time')->nullable();
            $table->string('duration',191)->nullable();
            $table->double('subscriber_fee',8,2)->nullable();
            $table->double('non_subscriber_fee',8,2)->nullable();
            $table->text('base_currency')->nullable();
            $table->bigInteger('burn_calories')->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['1','2','0'])->default('1');
            $table->tinyInteger('class_completed')->default('0');
            $table->dateTime('started_at')->nullable();
            $table->string('video_duration')->default('0');
            $table->timestamp('deleted_at');
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
