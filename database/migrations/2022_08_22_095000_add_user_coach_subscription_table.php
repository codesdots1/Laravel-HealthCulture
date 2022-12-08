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
        Schema::create('user_to_coach_subscription', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('coach_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->text('transaction_id')->nullable();
            $table->dateTime('start_subscription_date')->nullable();
            $table->dateTime('end_subscription_date')->nullable();
            $table->string('unsubscribe_status')->nullable()->default('0')->comment('0-subscribe,1-unsubscribe');
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
