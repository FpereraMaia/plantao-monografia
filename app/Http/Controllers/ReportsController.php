<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests,App\Enterprise, App\Status, Auth;

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
}
