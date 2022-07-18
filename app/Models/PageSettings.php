<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSettings extends Model
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
		'show_banner',
		'show_categories'
    ];
}
