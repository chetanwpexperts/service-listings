<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('footer_description')->nullable();
            $table->string('admin_primary_email')->nullable();
            $table->longText('admin_home_youtube')->nullable();
            $table->longText('website_complete_url')->nullable();
            $table->longText('website_address')->nullable();
            $table->integer('admin_home_page')->nullable();
            $table->longText('currency_symbol')->nullable();
            $table->integer('cost_per_point')->nullable();
            $table->integer('admin_language')->nullable();
            $table->longText('admin_countries')->nullable();
            $table->longText('header_logo')->nullable();
            $table->longText('mobile_view_logo')->nullable();
            $table->string('header_logo_width')->nullable();
            $table->string('header_logo_height')->nullable();
            $table->longText('user_default_image')->nullable();
            $table->integer('admin_install_flag')->nullable();
            $table->longText('footer_address')->nullable();
            $table->string('footer_mobile')->nullable();
            $table->longText('admin_photo')->nullable();
            $table->longText('footer_fb')->nullable();
            $table->longText('footer_google_plus')->nullable();
            $table->longText('footer_twitter')->nullable();
            $table->longText('footer_linked_in')->nullable();
            $table->longText('footer_youtube')->nullable();
            $table->longText('footer_whatsapp')->nullable();
            $table->longText('footer_payment_option')->nullable();
            $table->longText('footer_copyright')->nullable();
            $table->longText('admin_google_analytics')->nullable();
            $table->longText('admin_google_ad_sense')->nullable();
            $table->string('admin_paypal_id')->nullable();
            $table->string('admin_paypal_currency_code')->nullable();
            $table->string('admin_paypal_status')->nullable();
            $table->string('admin_stripe_id')->nullable();
            $table->string('admin_stripe_secret_id')->nullable();
            $table->string('admin_stripe_currency_code')->nullable();
            $table->string('admin_stripe_status')->nullable();
            $table->longText('admin_razor_pay_key_id')->nullable();
            $table->longText('admin_razor_pay_key_id_secret')->nullable();
            $table->longText('admin_razor_pay_currency_code')->nullable();
            $table->string('admin_razor_pay_status')->nullable();
            $table->string('admin_paytm_merchant_id')->nullable();
            $table->string('admin_paytm_merchant_key')->nullable();
            $table->string('admin_paytm_merchant_website')->nullable();
            $table->string('admin_paytm_status')->nullable();
            $table->string('admin_cod_status')->nullable();
            $table->integer('admin_google_login')->nullable();
            $table->integer('admin_facebook_login')->nullable();
            $table->string('admin_google_client_id')->nullable();
            $table->string('admin_google_client_secret')->nullable();
            $table->string('admin_facebook_app_id')->nullable();
            $table->string('admin_seo_title')->nullable();
            $table->string('admin_seo_description')->nullable();
            $table->string('admin_seo_keywords')->nullable();
            $table->string('home_page_fav_icon')->nullable();
            $table->string('home_page_banner')->nullable();
            $table->string('admin_geo_map_api')->nullable();
            $table->string('admin_geo_default_latitude')->nullable();
            $table->string('admin_geo_default_longitude')->nullable();
            $table->string('admin_geo_default_zoom')->nullable();
            $table->integer('admin_share_facebook')->nullable();
            $table->integer('admin_share_twitter')->nullable();
            $table->integer('admin_share_whatsapp')->nullable();
            $table->integer('admin_share_linkedin')->nullable();
            $table->integer('admin_share_instagram')->nullable();
            $table->integer('admin_share_pinterest')->nullable();
            $table->integer('admin_mobile_app_feature')->nullable();
            $table->integer('admin_footer_mobile_app_feature')->nullable();
            $table->integer('admin_country_list_feature')->nullable();
            $table->integer('admin_get_in_touch_feature')->nullable();
            $table->integer('top_category_1')->nullable();
            $table->integer('top_category_2')->nullable();
            $table->integer('top_category_3')->nullable();
            $table->integer('top_category_4')->nullable();
            $table->integer('top_category_5')->nullable();
            $table->integer('top_category_6')->nullable();
            $table->integer('top_category_7')->nullable();
            $table->integer('top_category_8')->nullable();
            $table->integer('trend_category_1')->nullable();
            $table->integer('trend_category_2')->nullable();
            $table->integer('trend_category_3')->nullable();
            $table->integer('trend_category_4')->nullable();
            $table->integer('trend_category_5')->nullable();
            $table->integer('trend_category_6')->nullable();
            $table->integer('trend_category_7')->nullable();
            $table->integer('trend_category_8')->nullable();
            $table->longText('mobile_app_andriod')->nullable();
            $table->longText('mobile_app_ios')->nullable();
            $table->integer('admin_listing_show')->nullable();
            $table->integer('admin_job_show')->nullable();
            $table->integer('admin_expert_show')->nullable();
            $table->integer('admin_product_show')->nullable();
            $table->integer('admin_blog_show')->nullable();
            $table->integer('admin_event_show')->nullable();
            $table->integer('admin_news_show')->nullable();
            $table->integer('admin_place_show')->nullable();
            $table->integer('admin_coupon_show')->nullable();
            $table->longText('footer_page_name_1')->nullable();
            $table->longText('footer_page_url_1')->nullable();
            $table->longText('footer_page_name_2')->nullable();
            $table->longText('footer_page_url_2')->nullable();
            $table->longText('footer_page_name_3')->nullable();
            $table->longText('footer_page_url_3')->nullable();
            $table->longText('footer_page_name_4')->nullable();
            $table->longText('footer_page_url_4')->nullable();
            $table->longText('footer_country_name_1')->nullable();
            $table->longText('footer_country_url_1')->nullable();
            $table->longText('footer_country_name_2')->nullable();
            $table->longText('footer_country_url_2')->nullable();
            $table->longText('footer_country_name_3')->nullable();
            $table->longText('footer_country_url_3')->nullable();
            $table->longText('footer_country_name_4')->nullable();
            $table->longText('footer_country_url_4')->nullable();
            $table->longText('footer_country_name_5')->nullable();
            $table->longText('footer_country_url_5')->nullable();
            $table->longText('footer_country_name_6')->nullable();
            $table->longText('footer_country_url_6')->nullable();
            $table->longText('footer_country_name_7')->nullable();
            $table->longText('footer_country_url_7')->nullable();
            $table->longText('admin_service_expert_email')->nullable();
            $table->longText('admin_service_expert_mobile')->nullable();
            $table->longText('admin_service_expert_whatsapp')->nullable();
            $table->string('copyright_year')->nullable();
            $table->string('copyright_website')->nullable();
            $table->string('copyright_website_link')->nullable();
            $table->dateTime('footer_cdt')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
