<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
