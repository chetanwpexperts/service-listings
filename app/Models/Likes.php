<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public $table = "likes";
    use HasFactory;

    protected $fillable = [
        'id',
        'listing_id',
        'member_id',
      ];
}