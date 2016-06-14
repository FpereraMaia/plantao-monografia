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
          <h2>Empreendimentos LISTAR QUADRA E LOTES<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/empreendimentos/create') }}">Novo Empreendimento</a>
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
          A tabela abaixo representa a lista dos empreendimentos cadastrados no sistema.
        </p>
        @include('common.success')
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CNPJ</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @foreach($enterprises as $key => $enterprise)
            <tr>
              <td>{{ $enterprise->name }}</td>
              <td>{{ $enterprise->cnpj }}</td>
              <td>
                <a class="btn btn-default btn-xs" href={{ url("empreendimentos/$enterprise->id") }} data-toggle="tooltip" data-placement="top" title="Editar">
                  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <!-- Button trigger modal -->
                <button id="delete-task-{{ $enterprise->id }}" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#myModal{{ $key }}" data-backdrop='static'>
                  <i class="fa fa-btn fa-trash"></i>
                </button>
              </td>
            </tr>

            <!-- Modal Excluir-->
            <div class="modal fade" id="myModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    Todas as <strong>Quadras </strong> e <strong> Lotes</strong> relacionados ao empreendimento <strong>{{ $enterprise->name }}</strong> serão EXCLUÍDOS.
                    <br/>
                    Você tem certeza que quer excluir o empreendimento?
                  </div>
                  <form method="POST" action='{{ url("empreendimentos/$enterprise->id") }}' style="display:initial" data-toggle="tooltip" data-placement="top" title="Excluir">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FIM DO MODAL DE EXCLUIR  -->
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
