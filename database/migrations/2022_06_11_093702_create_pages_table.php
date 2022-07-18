<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->unique();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('keywords');
            $table->string('g_schema');
            $table->string('listing_id');
            $table->string('product_ids');
            $table->string('blog_ids');
            $table->integer('status');
            $table->string('page_settings');
            $table->enum('page_visibility', array('private', 'public'));
			$table->string('route_name');
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
        Schema::dropIfExists('pages');
    }
}
