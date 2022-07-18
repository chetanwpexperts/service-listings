<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featuredlisting extends Model
{
    public $table = 'featuredlisting';
    
    use HasFactory;

    protected $fillable = [
		'id',
		'listing_id',
    ];

}
