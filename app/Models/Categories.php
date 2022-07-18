<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	public $table = 'listing_categories';
	
    use HasFactory;
	
	protected $fillable = [
		'id',
		'category_name',
		'category_slug',
		'category_image',
		'seo_title',
		'seo_description',
		'keywords',
		'parent_id',
		'sort_order'
    ];
	
	
	public function Category() 
	{
		return $this->belongsTo('App\Models\Categories', 'id', 'parent_id');
	}
}
