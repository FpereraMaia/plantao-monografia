<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Auth;

class Block extends Model implements LogsActivityInterface
{
    use LogsActivity;

    public function enterprise() {
      return $this->belongsTo('App\Enterprise');
    }

    public function lots(){
      return $this->hasMany('App\Lot');
    }

    /**
 * Get the message that needs to be logged for the given event name.
 *
 * @param string $eventName
 * @return string
 */
public function getActivityDescriptionForEvent($eventName)
{
    if ($eventName == 'created')
    {
        return 'Quadra "' . $this->name . '" do empreendimento '. $this->enterprise->name . ' foi criada pelo usuário ' . Auth::user()->name . ' em ' . $this->created_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'updated')
    {
      return 'Quadra "' . $this->name . '" do empreendimento '. $this->enterprise->name . ' foi atualizada pelo usuário ' . Auth::user()->name . ' em ' . $this->updated_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'deleted')
    {
        return 'Quadra "' . $this->name . '" do empreendimento '. $this->enterprise->name . ' foi deletada pelo usuário ' . Auth::user()->name;
    }

    return '';
}
}
