<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
	public $table = 'userinfo';
	
    use HasFactory;
	
	protected $fillable = [
        'member_id',
		'roles',
		'state',
		'city',
		'country',
		'facebook_url',
		'twitter_url',
		'premium_service_provider',
		'website',
		'aadhar',
		'gstnumber',
		'address',
		'company_name',
		'company_address',
		'plan',
		'plan_start',
		'plan_end',
		'duration',
		'payment_status',
		'amount',
		'payment_through',
		'transaction_id'
    ];
}
