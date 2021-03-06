<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Enterprise;
use Auth;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enterprisesList', [
          "enterprises" => Enterprise::where('client_id', Auth::user()->client_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enterprisesCreate');
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
          'nome' => 'required|max:255',
          'cnpj' => 'required'
        ]);

        $enterprise = new Enterprise;
        $enterprise->client_id = Auth::user()->client_id;
        $enterprise->name = $request->get('nome');
        $enterprise->cnpj = $request->get('cnpj');
        $enterprise->save();

        return redirect('/empreendimentos')->with('status', 'Empreendimento criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('enterpriseShow', [
          'enterprise' => Enterprise::findOrFail($id)
        ]);
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
        $enterprise = Enterprise::findOrFail($id);
        $enterprise->delete();

        return redirect('/empreendimentos')->with('status', 'Empreendimento excluído com sucesso!');
    }
}
