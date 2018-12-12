<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public function distributor(){
    	return $this->belongsTo('App\User', 'distributorId', 'id');
    }
}
