<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lot;
use App\Status;
use App\Sale;

class LotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $this->validate($request, [
        'nomeDoLote' => 'required|max:255',
        'quadra' => 'required',
      ]);

      $lot = new Lot;
      $lot->name = $request->get('nomeDoLote');
      $lot->block_id = $request->get('quadra');
      $lot->save();

      //salva com status disponivel
      $statusDisponivel = Status::where('codigo', Status::$codigo['disponivel'])->first();

      $sale = new Sale;
      $sale->lot_id = $lot->id;
      $sale->status_id = $statusDisponivel->id;
      $sale->save();

      $empreendimento = $request->get('empreendimento');

      return redirect("/empreendimentos/$empreendimento")->with('status', 'Lote cadastrado com sucesso!');
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
        $lot = Lot::findOrFail($id);
        $enterpriseId = $lot->block->enterprise_id;
        
        $lot->sale->delete();
        $lot->delete();

        return redirect("/empreendimentos/$enterpriseId")->with('status', 'Lote excluído com sucesso!');
    }
}
