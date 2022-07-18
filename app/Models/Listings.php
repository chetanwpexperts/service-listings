<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
		'id',
		'listing_id',
        'member_id',
		'listing_name',
        'listing_slug',
        'listing_email',
        'listing_phone',
        'listing_whatsapp_number',
        'company_website_link',
        'company_address',
        'pincode',
        'country',
        'state',
        'city',
        'category_id',
        'sub_category_id',
        'listing_description',
		'image',
        'banner',
        'service_locations',
		'meta_title',
		'meta_description',
		'keywords',
		'g_schema',
		'route_name',
        'google_map',
        'view_360',
        'status',
        'created_by',
        'veryfied',
        'views'
    ];
}
