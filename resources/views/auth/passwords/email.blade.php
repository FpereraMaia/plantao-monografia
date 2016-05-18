@extends('layouts.app')

<!-- Main Content -->
@section('content')
<style type="text/css">
body{
  background:#F7F7F7;
}
</style>
<div id="wrapper">
  <div id="register" class=" form">
    <section class="login_content">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <form role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <h1>Recuperar Senha</h1>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}"/>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div>
          <button type="submit" class="btn btn-default submit">
            <i class="fa fa-btn fa-envelope"></i> Enviar link de recuperação
          </button>
        </div>
        <div class="clearfix"></div>
        <div class="separator">

          <p class="change_link">Já é um membro ?
            <a href="{{ url('login') }}" class="to_register"> Acesse aqui </a>
          </p>
          <p class="change_link">Que cadastrar <strong> DE GRAÇA </strong> ?
            <a href="{{ url('register') }}" class="to_register"> Acesse aqui </a>
          </p>
          <div class="clearfix"></div>
          <br />
          <div>
            <h1><i class="fa fa-umbrella" style="font-size: 26px;"></i> P.O.V - Gestão de Plantão de Vendas de Loteamento</h1>

          </div>
        </div>
      </form>
    </section>
  </div>
</div>
@endsection
