<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdp extends Model
{
	public $table = 'userdp';
	
    use HasFactory;
	
	protected $fillable = [
        'member_id',
		'image'
    ];
}
