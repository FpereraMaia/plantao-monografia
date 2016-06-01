@extends('layouts.app')

@section('stylesheets')
<!-- Datatables -->
<link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Usuários <small>Corretores</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/usuarios/corretores/create') }}">Novo Corretor</a>
                </li>
                <li><a href="{{ url('/usuarios/corretores/log-geral') }}">Log Geral</a>
                </li>
              </ul>
            </li>
            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li> -->
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          A tabela abaixo representa a lista dos corretores cadastrados no sistema. Para obter a auditoria do que eles efetuaram no sistema, clique no botão na coluna <code> Ações </code>.
        </p>
        @include('common.success')
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CRECI</th>
              <th>E-mail</th>
              <th>Telefones</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @foreach($roleBrokers->users as $broker)
            <tr>
              <td>{{ $broker->name }}</td>
              <td>{{ $broker->creci }}</td>
              <td>{{ $broker->email }}</td>
              <td>{{ $broker->phones }}</td>
              <td>
                <a class="btn btn-default btn-xs" href={{ url("usuarios/corretores/$broker->id/edit") }} data-toggle="tooltip" data-placement="top" title="Editar">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a class="btn btn-info btn-xs" href={{ url("usuarios/corretores/$broker->id/log") }} data-toggle="tooltip" data-placement="top" title="Visualizar Log">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                </a>
                <form method="POST" action={{ url("/usuarios/corretores/$broker->id") }} style="display:initial" data-toggle="tooltip" data-placement="top" title="Excluir">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" id="delete-task-{{ $broker->id }}" class="btn btn-danger btn-xs">
                    <i class="fa fa-btn fa-trash"></i>
                  </button>

                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script>
$(document).ready(function(){
  $('#datatable-responsive').DataTable();
});
</script>
@endsection
