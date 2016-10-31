
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
          <h2>Relatório <small>Financeiro</small></h2>
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
              <th>Preço de Venda (R$)</th>
              <th>Porcentagem do Corretor (%)</th>
              <th>Valor líquido (R$)</th>
            </tr>
          </thead>
          <tbody>
            <?php $valorLiquidoTotal = 0 ?>
            @foreach($enterprise->lotsSold()->get() as $lotsSold)
            <tr>
              <td> {{$lotsSold->name}} </td>
              <td> {{ $lotsSold->block->name }} </td>
              <td> {{ number_format($lotsSold->sale->price, 2, ',', '.') }} </td>
              <td> {{ $lotsSold->sale->percentage }} </td>
              <td> {{ number_format($lotsSold->sale->getNetValue(), 2, ',', '.') }} </td>
            </tr>
            <?php $valorLiquidoTotal += $lotsSold->sale->getNetValue() ?>
            @endforeach
            <tr>
              <td> <strong>TOTAIS</strong> </td>
              <td> </td>
              <td><strong>{{ number_format($enterprise->lotsSold()->sum('price'), 2, ',', '.') }}</strong></td>
              <td></td>
              <td><strong> {{ number_format($valorLiquidoTotal, 2, ',', '.') }} </strong></td>
            </tr>
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
