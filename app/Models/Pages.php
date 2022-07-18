<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;	

	/**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
		'id',
		'page_id',
		'title',
		'description',
		'image',
		'meta_title',
		'meta_description',
		'keywords',
		'g_schema',
		'listing_id',
		'product_ids',
		'blog_ids',
		'status',
		'page_settings',
		'page_visibility',
		'route_name'
    ];
}
