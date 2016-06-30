@extends('layouts.app')

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
                <td>{{ $lot->sale->status->name }} </td>
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
