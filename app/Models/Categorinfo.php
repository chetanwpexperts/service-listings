<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorinfo extends Model
{
    public $table = "categorinfo";
    use HasFactory;

    protected $fillable = [
      'id',
      'category_id',
      'heading',
      'otherinfo',
      'type'
    ];
}
