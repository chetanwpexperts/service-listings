<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('listing_id')->nullable();
            $table->string('offer_name')->nullable();
            $table->string('offer_image')->nullable();
            $table->string('offer_details')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('offer_view_more_link')->nullable();
            $table->enum('offer_status', array('active', 'deactive'))->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
