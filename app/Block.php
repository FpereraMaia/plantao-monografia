<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function enterprise() {
      return $this->belongsTo('App\Enterprise');
    }

    public function lots(){
      return $this->hasMany('App\Lot');
    }
}
