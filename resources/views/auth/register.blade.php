@extends('layouts.app')

@section('content')
<style type="text/css">
body{
  background:#F7F7F7;
}
</style>
<div id="wrapper">
  <div id="register" class=" form">
    <section class="login_content">
      <form role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <h1>Cadastre-se Grátis</h1>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <input type="text" class="form-control" placeholder="Nome Completo" required="" name="name" value="{{ old('name') }}"/>
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}"/>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" class="form-control" placeholder="Senha" required="" name="password"/>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <input type="password" class="form-control" placeholder="Confirmar Senha" required="" name="password_confirmation"/>

          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </div>

        <div>
          <button type="submit" class="btn btn-default submit">Comece agora! <strong> Grátis! </strong></button>
        </div>
        <div class="clearfix"></div>
        <div class="separator">

          <p class="change_link">Já é um membro ?
            <a href="{{ url('login') }}" class="to_register"> Acesse aqui </a>
          </p>
          <div class="clearfix"></div>
          <br />
          <div>
            <h1><i class="fa fa-umbrella" style="font-size: 26px;"></i> P.V.O - Gestão de Plantão de Vendas de Loteamento</h1>

          </div>
        </div>
      </form>
    </section>
  </div>
</div>
@endsection
