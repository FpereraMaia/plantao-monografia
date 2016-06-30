<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Enterprise;
use App\Status;
use Kodeine\Acl\Models\Eloquent\Role as Role;
use App\Sale;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales', [
          'enterprises' => Enterprise::where('client_id', Auth::user()->client_id)->get(),
          'status' => Status::all()->lists('name', 'id'),
          'brokers' => Role::where('slug', 'corretor')->first()->users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeBrokerSale(Request $request)
    {
      $this->validate($request, [
        'sale' => 'required|int',
        'item' => 'required',
      ]);

      $sale = Sale::findOrFail($request->get('sale'));
      $sale->broker_id = $request->get('item');
      $sale->save();

      return response()->json($sale);
    }
}
