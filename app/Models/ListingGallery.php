<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingGallery extends Model
{
    public $table = 'listing_gallery';

    use HasFactory;

    protected $fillable = [
		'id',
        'listing_id',
		'type',
        'image',
		'video'
    ];
}
