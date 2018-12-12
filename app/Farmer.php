<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    public function area(){
    	return $this->belongsTo('App\Area', 'areaId', 'id');
    }
}
