<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
	public $table = 'countries';
	
    use HasFactory;
	
	protected $fillable = [
		'id',
		'shortname',
		'name',
		'phonecode'
    ];
}
