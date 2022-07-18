<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingOtherInfomration extends Model
{
    public $table = 'listing_other_information';

    use HasFactory;

    protected $fillable = [
		'id',
        'listing_id',
		'meta_name',
        'meta_value'
    ];
}
