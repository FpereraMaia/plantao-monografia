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

    public function getPercentageAttribute($value){
      if(empty($value)){
        return '0.00';
      }
      else{
        return $value;
      }
    }

    public function setValueOfPercentage(){
      $this->percentage_of_the_value = ( $this->percentage / 100 ) * $this->price;
    }

    public function getNetValue()
    {
      return ($this->price - $this->percentage_of_the_value);
    }
}
