<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Auth;

class Sale extends Model implements LogsActivityInterface
{
  use LogsActivity;

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
    /**
 * Get the message that needs to be logged for the given event name.
 *
 * @param string $eventName
 * @return string
 */
public function getActivityDescriptionForEvent($eventName)
{

    if ($eventName == 'updated') {
        return 'Venda do lote "' . $this->lot->name .'" da quadra '. $this->lot->block->name .' de valor ' .$this->price. ' com o status '.$this->status->name
        .' de corretor '.$this->broker->name.' foi atualizado pelo usuário ' . Auth::user()->name . ' em ' . $this->updated_at->format('d/m/Y H:i:s');
    }

    return '';
}
}
