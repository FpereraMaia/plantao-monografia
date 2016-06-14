<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    public function block(){
      return $this->belongsTo('App\Block');
    }

    public function sale() {
      return $this->hasOne('App\Sale');
    }
}
