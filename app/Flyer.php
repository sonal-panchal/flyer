<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{


	protected $fillable=[
		'street',
		'city',
		'zip',
		'country',
		'price',
		'desc',
		'user_id'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function flyer_photo()
	{
		return $this->hasMany('App\Flyer_photo','flyer_id');
    }

}
