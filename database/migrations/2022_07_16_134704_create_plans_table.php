<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_type_code')->nullable();
            $table->string('plan_type_name')->nullable();
            $table->string('plan_type_price')->nullable();
            $table->string('plan_type_duration')->nullable();
            $table->string('plan_type_listing_count')->nullable();
            $table->string('plan_type_product_count')->nullable();
            $table->string('plan_type_event_count')->nullable();
            $table->string('plan_type_blog_count')->nullable();
            $table->string('plan_type_points')->nullable();
            $table->string('plan_type_direct_lead')->nullable();
            $table->string('plan_type_email_notification')->nullable();
            $table->string('plan_type_verified')->nullable();
            $table->string('plan_type_trusted')->nullable();
            $table->string('plan_type_offers')->nullable();
            $table->string('plan_type_offers_count')->nullable();
            $table->string('plan_type_photos_count')->nullable();
            $table->string('plan_type_photos')->nullable();
            $table->string('plan_type_videos_count')->nullable();
            $table->string('plan_type_videos')->nullable();
            $table->string('plan_type_services_count')->nullable();
            $table->string('plan_type_job_count')->nullable();
            $table->string('plan_type_ratings')->nullable();
            $table->string('plan_type_social')->nullable();
            $table->string('plan_type_status')->nullable();
            $table->string('plan_type_cdt')->nullable();
            $table->string('plan_type_contact')->nullable();
            $table->longText('plan_type_description')->nullable();
            $table->string('plan_type_maps')->nullable();
            $table->string('plan_type_threedview')->nullable();
            $table->string('plan_type_services')->nullable();
            $table->string('plan_type_services_count')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
