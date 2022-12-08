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
        Schema::create('user_to_coach_class_subscription', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_class_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->text('transaction_id')->nullable();
            $table->date('subscription_date')->nullable();
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
