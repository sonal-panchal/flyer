<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Note extends Model
{
    //


	public function card()
	{
		return $this->belongsTo('App\Card');
	}
}
