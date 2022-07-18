<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable = [
		'id',
		'listing_id',
		'offer_name',
		'offer_image',
		'offer_details',
		'offer_price',
        'offer_view_more_link',
		'offer_status'
    ];
}
