<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryfaq extends Model
{
    public $table = "categoryfaq";
    use HasFactory;

    protected $fillable = [
      'id',
      'category_id',
      'heading',
      'otherinfo',
      'type'
    ];
}
