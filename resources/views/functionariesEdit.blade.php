@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Editar Funcionário <small></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                Para acesso ao sistema serão utilizados o <strong>e-mail e a senha</strong>. É muito importante utilizar um e-mail válido.
              </p>
              @include('common.errors')
              <!-- start form for validation -->
              <form id="demo-form" action={{ url("usuarios/funcionarios/$functionary->id") }} method="POST" data-parsley-validate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <label for="nome">Nome * :</label>
                <input type="text" id="nome" class="form-control" name="nome" required value="{{ $functionary->name }}"/>

                <label for="email">Email * :</label>
                <input type="email" id="email" class="form-control" name="e-mail" data-parsley-trigger="change" required value="{{ $functionary->email }}"/>

                <label for="telefones">Telefones :</label>
                <input type="text" id="telefones" class="form-control" name="telefones" required value="{{ $functionary->phones }}"/>

                <label for="senha">Senha de Acesso * :</label>
                <input type="password" id="senha" class="form-control" name="senhaDeAcesso" />

                <br>
                <button type="submit" class="btn btn-primary">Salvar</button>

              </form>
              <!-- end form for validations -->

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
