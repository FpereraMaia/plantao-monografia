<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'status';

    public static $codigo = [
      'disponivel' => 1,
      'emNegociacao' => 2,
      'reservado' => 3,
      'vendido' => 4
    ];
}
