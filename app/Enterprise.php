<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Auth;

class Enterprise extends Model implements LogsActivityInterface
{
    use LogsActivity;

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
      return $this->lots()->whereHas('sale', function ($q) {
          $idStatusVendido = Status::where('codigo', Status::$codigo['vendido'])->first()->id;
          $q->where('status_id', $idStatusVendido);
      });
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
        return 'Empreendimento "' . $this->name . ' foi criado pelo usuário ' . Auth::user()->name . ' em ' . $this->created_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'updated') {
        return 'Empreendimento "' . $this->name . ' foi criado pelo usuário ' . Auth::user()->name . ' em ' . $this->updated_at->format('d/m/Y H:i:s');
    }

    if ($eventName == 'deleted') {
        return 'Empreendimento "' . $this->name . ' foi deletado pelo usuário ' . Auth::user()->name;
    }

    return '';
}
}
