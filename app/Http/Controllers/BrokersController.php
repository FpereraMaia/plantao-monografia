<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Kodeine\Acl\Models\Eloquent\Role as Role;
use Auth;
use App\User;

class BrokersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with(['users' => function ($query) {
            $query->where('client_id', Auth::user()->client_id);
        }])->where('slug', 'corretor')->first();

        return view('brokersList', [
        'roleBrokers' => $roles
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brokersCreate');
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
          'email' => 'email|required|unique:users',
          'telefones' => 'required',
          'creci' => 'required',
          'senhaDeAcesso' => 'required|min:6',
        ]);

        $functionary = new User;
        $functionary->name = $request->nome;
        $functionary->creci = $request->creci;
        $functionary->email = $request->get('email');
        $functionary->phones = $request->telefones;
        $functionary->password = bcrypt($request->senhaDeAcesso);
        $functionary->client_id = $request->user()->client->id;
        $functionary->save();

        $functionary->assignRole('corretor');

        return redirect('/usuarios/corretores')->with('status', 'Corretor criado com sucesso!');
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
    public function destroy(Request $request, User $corretores)
    {
        $this->authorize('destroy', $corretores);
        $corretores->revokeAllPermissions();
        $corretores->revokeAllRoles();
        $corretores->delete();
        return redirect('/usuarios/corretores')->with('status', 'Corretor excluído com sucesso!');
    }
}
