<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealersOfDistributor extends Model
{
	public function distributor(){
	    return $this->belongsTo('App\User', 'distributorId', 'id');
	}

	public function dealer(){
	    return $this->belongsTo('App\User', 'dealerId', 'id');
	}
}
