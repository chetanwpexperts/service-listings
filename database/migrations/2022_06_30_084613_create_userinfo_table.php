<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->enum('roles', array('User', 'General', 'Service Provider'))->nullable();
            $table->integer('state')->nullable();
			$table->integer('city')->nullable();
            $table->integer('country')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->integer('premium_service_provider')->nullable();
            $table->string('website')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('gstnumber')->nullable();
            $table->longText('address')->nullable();
            $table->string('company_name')->nullable();
            $table->longText('company_address')->nullable();
            $table->string('plan')->nullable();
            $table->dateTime('plan_start')->nullable();
            $table->dateTime('plan_end')->nullable();
            $table->string('duration')->nullable();
            $table->string('payment_status')->nullable();
            $table->float('amount', 8, 2)->nullable();
            $table->string('payment_through')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('userinfo');
    }
}
