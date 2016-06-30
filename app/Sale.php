<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function lot(){
      return $this->belongsTo('App\Lot');
    }

    public function status()
    {
      return $this->belongsTo('App\Status');
    }

    public function broker()
    {
      return $this->belongsTo('App\User');
    }
}
