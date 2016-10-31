
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
          <h2>Relatório <small>Lotes</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/usuarios/corretores/create') }}">Imprimir</a>
                </li>
              </ul>
            </li> -->
            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li> -->
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        @foreach($enterprises as $enterprise)

        <h4> Empreendimento: {{ $enterprise->name }} - CNPJ: {{ $enterprise->cnpj }}</h4>
        <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Lote</th>
              <th>Quadra</th>
              <th>Status</th>
              <th>Preço de Venda (R$)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($enterprise->lots as $lot)
            <tr>
              <td> {{$lot->name}} </td>
              <td> {{ $lot->block->name }} </td>
              <td> <strong>{{ $lot->sale->status->name }}</strong> </td>
              <td> {{ number_format($lot->sale->price, 2, ',', '.') }} </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endforeach
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
  $('.datatable-responsive').DataTable();
});
</script>
@endsection
