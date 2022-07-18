<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $table = 'follow';
    use HasFactory;

    protected $fillable = [
        'id',
        'followed',
        'followed_by',
    ];
}
