@extends('layouts.app')

@section('content')
<style type="text/css">
body{
  background:#F7F7F7;
}
</style>
  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class=" form">
        <section class="login_content">
          <form role="form" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}
            <h1>Entre Agora</h1>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required="" />
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" class="form-control" placeholder="Senha" required="" name="password" />

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div>
              <button type='submit' class="btn btn-default submit">Acessar</button>
              <a class="reset_pass" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Novo no site?
                <a href="{{ url('register') }}" class="to_register"> Cadastre-se Grátis! </a>
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
  </div>
@endsection
