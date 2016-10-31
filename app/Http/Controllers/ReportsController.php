<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests,App\Enterprise, App\Status, Auth, App\User, Kodeine\Acl\Models\Eloquent\Role as Role;
use Spatie\Activitylog\Models\Activity;

class ReportsController extends Controller
{
    public function financial()
    {
      return view('reports.financial',[
        'enterprises' => Enterprise::where('client_id', Auth::user()->client_id)->get()
      ]);
    }

    public function lots()
    {
      return view('reports.lots', [
        'enterprises' => Enterprise::where('client_id', Auth::user()->client_id)->get()
      ]);
    }

    public function showBrokerReport($id)
    {
      return view('reports.broker', [
        'broker' => User::findOrFail($id)
      ]);
    }

    public function brokerRank()
    {
      //pegar os corretores ordenados por venda
      $role = Role::with(['users' => function ($query) {
          $query->where('client_id', Auth::user()->client_id);
      }])->where('slug', 'corretor')->first();
      //pegar o total das vendas de cada corretor e comparar

      return view('reports.rank', [
        'brokers' => $role->users
      ]);
    }

    public function log()
    {
      $idsUser = User::where('client_id', Auth::user()->client_id)->lists('id');
      
      return view('reports.log', [
        'logs' => Activity::with('user')->whereIn('user_id', $idsUser)->get()
      ]);
    }
}
