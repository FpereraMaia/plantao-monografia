<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Auth;

class Lot extends Model implements LogsActivityInterface
{
  use LogsActivity;

    public function block(){
      return $this->belongsTo('App\Block');
    }

    public function sale() {
      return $this->hasOne('App\Sale');
    }
    /**
 * Get the message that needs to be logged for the given event name.
 *
 * @param string $eventName
 * @return string
 */
public function getActivityDescriptionForEvent($eventName)
{
    if ($eventName == 'created') {
        return 'Lote "' . $this->name .'da quadra '. $this->block->name .' foi criado pelo usuário ' . Auth::user()->name . ' em ' . $this->created_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'updated') {
        return 'Lote "' . $this->name .'da quadra '. $this->block->name .' foi atualizado pelo usuário ' . Auth::user()->name . ' em ' . $this->updated_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'deleted') {
        return 'Lote "' . $this->name .'da quadra '. $this->block->name .' foi deletado pelo usuário ' . Auth::user()->name;
    }

    return '';
}
}
