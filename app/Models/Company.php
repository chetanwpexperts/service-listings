<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = 'company';
    use HasFactory;

    protected $fillable = [
		'id',
        'member_id',
		'name',
		'address',
        'email',
        'phone',
        'website',
        'taxno',
        'social_accounts',
        'description',
        'logo',
        'bannerlogo',
        'banner',
        'products',
        'blogs',
        'seo_description',
        'seo_keywords'
    ];
}
