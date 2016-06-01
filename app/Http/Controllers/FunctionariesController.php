<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Kodeine\Acl\Models\Eloquent\Role as Role;
use App\User;
use Auth;

class FunctionariesController extends Controller
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
      }])->where('slug', 'func')->first();

      return view('functionariesList', [
        'roleFunctionaries' => $roles
      ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
      return view('functionariesCreate');
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
      'senhaDeAcesso' => 'required|min:6',
    ]);

      $functionary = new User;
      $functionary->name = $request->nome;
      $functionary->email = $request->get('email');
      $functionary->phones = $request->telefones;
      $functionary->password = bcrypt($request->senhaDeAcesso);
      $functionary->client_id = $request->user()->client->id;
      $functionary->save();

      $functionary->assignRole('func');

      return redirect('/usuarios/funcionarios')->with('status', 'Funcionário criado com sucesso!');
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
  public function edit(User $funcionarios)
  {
      return view('functionariesEdit', [
        'functionary' => $funcionarios
      ]);
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
      $this->validate($request, [
        'nome' => 'required|max:255',
        'e-mail' => 'email|required',
        'telefones' => 'required'
      ]);

      $funcionario = User::findOrFail($id);
      $funcionario->name = $request->nome;
      $funcionario->email = $request->get('e-mail');
      $funcionario->phones = $request->telefones;
      if (!empty($request->senhaDeAcesso)) {
          $funcionario->password = bcrypt($request->senhaDeAcesso);
      }
      $funcionario->save();

      return redirect('/usuarios/funcionarios')->with('status', 'Funcionário editado com sucesso!');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, User $funcionarios)
  {
      $this->authorize('destroy', $funcionarios);
      $funcionarios->revokeAllPermissions();
      $funcionarios->revokeAllRoles();
      $funcionarios->delete();
      return redirect('/usuarios/funcionarios')->with('status', 'Funcionário excluído com sucesso!');
  }
}
