@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('js/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Gerenciar Vendas <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Empreendimento</th>
                <th>Quadra</th>
                <th>Lote</th>
                <th>Status</th>
                <th>Corretor</th>
                <th>Valor</th>
                <th>Porcentagem do Corretor</th>
                <th>Ações </th>
              </tr>
            </thead>

            <tbody>
              @foreach($enterprises as $key => $enterprise)
              @foreach($enterprise->blocks as $block)
              @foreach($block->lots as $lot)
              <tr>
                <td>{{ $enterprise->name }}</td>
                <td>{{ $block->name }}</td>
                <td>{{ $lot->name }}</td>
                <td>
                  <select class="selectpicker show-tick" data-value="{{ $lot->sale->id }}" data-tipo="status" data-style="btn-xs btn-default" data-width="fit" data-live-search="true">
                    @foreach($status as $key => $itemStatus)
                    @if($lot->sale->status->id == $key)
                    <option value="{{ $key }}" selected="selected"> {{$itemStatus}} </option>
                    @else
                    <option value="{{ $key }}"> {{$itemStatus}} </option>
                    @endif
                    @endforeach
                  </select>
                </td>
                <td>
                  <select class="selectpicker show-tick" data-value="{{ $lot->sale->id }}" data-tipo="corretor" data-style="btn-xs btn-default" data-width="fit" data-live-search="true">
                    <option value="" data-sale="{{ $lot->sale->id }}"> Selecione o Corretor </option>
                    @foreach($brokers as $key => $broker)
                    @if(!empty($lot->sale->broker) && $lot->sale->broker->id == $broker->id)
                    <option value="{{ $broker->id }}" selected="selected"> {{$broker->name}} </option>
                    @else
                    <option value="{{ $broker->id }}" > {{ $broker->name }} </option>
                    @endif
                    @endforeach
                  </select>
                </td>
                <td> {{ "R$ " . number_format($lot->sale->price, 2, ',', '.') }} </td>
                <td>{{ $lot->sale->percentage }} </td>
                <td> Vender </td>
              </tr>
              @endforeach
              @endforeach
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
<script src="{{ asset('js/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-1.10.0/dist/js/i18n/defaults-pt_BR.min.js') }}"></script>
<script src="{{ asset('js/services/statusServices.js') }}"> </script>
<script src="{{ asset('js/services/corretorServices.js') }}"> </script>
<script src="{{ asset('js/sale.js') }}"> </script>
@endsection
