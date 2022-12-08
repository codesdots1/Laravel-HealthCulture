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
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->enum('payment_method',['debit','credit','paypal','stripe'])->default('debit');
            $table->enum('payment_type',['debit','credit'])->default('debit');
            $table->double('amount',8,2)->nullable();
            $table->text('note')->nullable();
            $table->enum('status',['1','2','0'])->default('1')->comment('0-fail,1-success,2=pending');
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
