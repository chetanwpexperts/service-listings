<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
	public $table = 'states';
	
    use HasFactory;
	
	protected $fillable = [
		'id',
		'name',
		'country_id'
    ];
}
