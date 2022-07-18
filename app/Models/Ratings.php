<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    public $table = "ratings";
    use HasFactory;

    protected $fillable = [
      'id',
      'listing_id',
      'member_id',
      'rating'
    ];

    public function avgRating()
    {
        return $this->rating->avg('rating');
    }
}
