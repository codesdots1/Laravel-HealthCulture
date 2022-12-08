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
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name');
            $table->string('username');
            $table->enum('username_verified',['1','0'])->default('0');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('countrycode');
            $table->string('phonecode');
            $table->string('phoneno');
            $table->enum('status',['1','0','2'])->default('0')->comment('0-disable,1-enable,2=block');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('passport_number');
            $table->string('user_image');
            $table->text('user_passport_id_image');
            $table->text('coach_banner_file');
            $table->text('coach_trailer_file');
            $table->text('base_currency');
            $table->text('account_currency');
            $table->text('monthly_subscription_fee');
            $table->string('google_id');
            $table->string('facebook_id');
            $table->string('social_type');
            $table->string('social_username');
            $table->enum('login_type',['0','1','2'])->default('0')->comment('0-normal,1-instagram,2=facebook');
            $table->text('device_token');
            $table->text('stripe_customer_id');
            $table->tinyInteger('badge')->default('0');
            $table->string('email_varify')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
