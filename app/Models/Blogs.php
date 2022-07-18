<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    public $table = 'blogs';

    use HasFactory;

    protected $fillable = [
		'id',
		'member_id',
		'blog_name',
        'blog_slug',
        'blog_description',
        'blog_image',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'isenquiry',
        'blog_status',
        'blog_cdt'
    ];
}
