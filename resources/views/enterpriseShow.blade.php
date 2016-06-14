@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{ $enterprise->name }} - {{ $enterprise->cnpj }} <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p class="text-muted font-13 m-b-30">
            Faça o gerenciamento de quadras e lotes.
          </p>
          @include('common.success')
          @include('common.errors')
          <div class="col-md-6">
            <h4>Quadras</h4>

            <form class="form-inline" action="{{ url('quadras') }}" method="POST" data-parsley-validate>
              {{ csrf_field() }}
              <input type="hidden" value="{{ $enterprise->id }}" name='empreendimento' />
              <label for="nome">Nome * :</label>
              <input type="text" id="nome" class="form-control" name="nome" required value="{{ old('nome') }}"/>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            <hr />
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach($enterprise->blocks as $block)
                <tr>
                  <td>{{ $block->name }}</td>
                  <td>
                    <a class="btn btn-default btn-xs" href={{ url("usuarios/corretores/$block->id/edit") }} data-toggle="tooltip" data-placement="top" title="Editar">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <form method="POST" action={{ url("/quadras/$block->id") }} style="display:initial" data-toggle="tooltip" data-placement="top" title="Excluir">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" id="delete-task-{{ $block->id }}" class="btn btn-danger btn-xs">
                        <i class="fa fa-btn fa-trash"></i>
                      </button>

                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <h4>Lotes</h4>

            <form class="form-inline" action="{{ url('lotes') }}" method="POST" data-parsley-validate>
              {{ csrf_field() }}
              <input type="hidden" value="{{ $enterprise->id }}" name='empreendimento' />
              <label for="nome">Quadra:</label>
              <select name="quadra" class="form-control">
                @foreach($enterprise->blocks as $block)
                <option value="{{ $block->id }}">{{ $block->name }}</option>
                @endforeach
              </select>
              <label for="nomeDoLote">Nome * :</label>
              <input type="text" id="nome" class="form-control" name="nomeDoLote" required value="{{ old('nomeDoLote') }}"/>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            <hr />
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Quadra</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach($enterprise->blocks as $block)
                @foreach($block->lots as $lot)
                <tr>
                  <td>{{ $lot->name }}</td>
                  <td>{{ $lot->block->name }}</td>
                  <td>
                    <a class="btn btn-default btn-xs" href={{ url("usuarios/corretores/$lot->id/edit") }} data-toggle="tooltip" data-placement="top" title="Editar">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <form method="POST" action={{ url("/lotes/$lot->id") }} style="display:initial" data-toggle="tooltip" data-placement="top" title="Excluir">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" id="delete-task-{{ $lot->id }}" class="btn btn-danger btn-xs">
                        <i class="fa fa-btn fa-trash"></i>
                      </button>

                    </form>
                  </td>
                </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
