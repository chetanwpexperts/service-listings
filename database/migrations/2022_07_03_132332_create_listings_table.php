<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('listing_id')->unique();
            $table->string('member_id')->nullable();
            $table->string('listing_name')->nullable();
            $table->longText('listing_slug')->nullable();
            $table->string('listing_email')->nullable();
            $table->string('listing_phone')->nullable();
            $table->string('listing_whatsapp_number')->nullable();
            $table->string('company_website_link')->nullable();
            $table->longText('company_address')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->longText('city')->nullable();
            $table->string('category_id')->nullable();
            $table->longText('sub_category_id')->nullable();
            $table->longText('listing_description')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->longText('service_locations')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('g_schema')->nullable();
            $table->string('route_name')->nullable();
            $table->longText('google_map')->nullable();
            $table->longText('view_360')->nullable();
            $table->enum('status',array('active', 'deactive', 'removed', 'open', 'close'))->nullable();
            $table->string('created_by')->nullable();
            $table->enum('veryfied',array('Yes', 'No'))->nullable();
            $table->integer('views')->nullable();
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
        Schema::dropIfExists('listings');
    }
}
