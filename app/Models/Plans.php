<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    public $table = "plans";

    use HasFactory;

    protected $fillable = [
        'id',
        'plan_type_code',
        'plan_type_name',
        'plan_type_price',
        'plan_type_duration',
        'plan_type_listing_count',
        'plan_type_product_count',
        'plan_type_event_count',
        'plan_type_blog_count',
        'plan_type_points',
        'plan_type_direct_lead',
        'plan_type_email_notification',
        'plan_type_verified',
        'plan_type_trusted',
        'plan_type_offers',
        'plan_type_offers_count',
        'plan_type_photos_count',
        'plan_type_photos',
        'plan_type_videos_count',
        'plan_type_videos',
        'plan_type_ratings',
        'plan_type_social',
        'plan_type_cdt',
        'plan_type_contact',
        'plan_type_description',
        'plan_type_maps',
        'plan_type_threedview',
        'plan_type_services',
        'plan_type_services_count'
      ];
}
