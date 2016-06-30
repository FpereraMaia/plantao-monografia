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

    public function getPriceAttribute($value)
    {
      //se ñ tiver o preço setado na tabela de vendas, pega o valor do lote
      if($value == "0.00"){
        return $this->lot->price;
      }
      else{
        return $value;
      }
    }
}
