<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Acl\Traits\HasRole;

class User extends Authenticatable
{
    use HasRole;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'client_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function sales()
    {
      return $this->hasMany('App\Sale', 'broker_id');
    }

    public function scopeSalesSoldAndInNegotiation($query)
    {
      $idStatusSold = Status::where('codigo', Status::$codigo['vendido'])->first()->id;
      $idStatusNegotiation = Status::where('codigo', Status::$codigo['emNegociacao'])->first()->id;
      return $this->sales()->whereIn('status_id', [$idStatusSold, $idStatusNegotiation]);
    }

    public function scopeSalesSold($query)
    {
      $idStatusSold = Status::where('codigo', Status::$codigo['vendido'])->first()->id;
      return $this->sales()->where('status_id', $idStatusSold);
    }

    public static function getBrokerRules($state = null)
    {
        $rules = [
          'nome' => 'required|max:255',
          'telefones' => 'required',
          'creci' => 'required'
        ];

        if ($state != 'update') {
            $rules['email'] = 'email|required|unique:users';
            $rules['senhaDeAcesso'] = 'required|min:6';
        }

        return $rules;
    }
}
