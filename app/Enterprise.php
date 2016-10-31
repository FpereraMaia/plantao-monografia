<?php

namespace App;

use Illuminate\Database\Eloquent\Model, App\Status;

class Enterprise extends Model
{
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($enterprise) { // before delete() method call this
          $enterprise->blocks()->delete();
        });
    }

    public function lots()
    {
      return $this->hasManyThrough('App\Lot', 'App\Block');
    }

    public function scopeLotsSold($query)
    {
      //pegar os lots que estão vendidos
      return $this->lots()->whereHas('sale', function($q){
        $idStatusVendido = Status::where('codigo', Status::$codigo['vendido'])->first()->id;
        $q->where('status_id', $idStatusVendido);
      });

    }
}
