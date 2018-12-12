<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    public function storage(){
    	return $this->belongsTo('App\Storage', 'storageId', 'id');
    }
}
