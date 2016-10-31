<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>P.V.O - Gestão de Plantão de Vendas de Loteamento</title>

  <!-- Bootstrap -->
  <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
  <!-- Specific page stylesheets -->
  @yield('stylesheets')
  <!-- Custom Theme Style -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      @if (!Auth::guest())
      <!-- SIDE BAR -->
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('home') }}" class="site_title"><i class="fa fa-umbrella" style="font-size: 26px;"></i> <span>P.V.O</span></a>
            <!-- plig verkope onderverdeling -->
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{ asset('images/img.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bem Vindo,</span>
              <h2>{{ Auth::user()->name }}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>{{ Auth::user()->roles[0]->name }}</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('usuarios/funcionarios') }}">Funcionários</a>
                    </li>
                    <li><a href="{{ url('usuarios/corretores') }}">Corretores</a>
                    </li>
                  </ul>
                </li>
                <li><a href="{{ url('empreendimentos') }}"><i class="fa fa-map-marker"></i> Empreendimentos </a></li>
                <li><a href="{{ url('vendas') }}"><i class="fa fa-exchange"></i> Vendas </a></li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Relatórios</h3>
              <ul class="nav side-menu">
                <li><a href="{{ url('relatorios/financeiro') }}"><i class="fa fa-money"></i> Financeiro </a></li>
                <li><a href="{{ url('relatorios/lotes') }}"><i class="fa fa-braille"></i> Lotes </a></li>
                <li><a href="{{ url('relatorios/corretores') }}"><i class="fa fa-user-secret"></i> Corretores </a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
          @endif
          @if (!Auth::guest())
          <!-- /menu footer buttons -->
          <!-- <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div> -->
<!-- /menu footer buttons -->
@endif
</div>
</div>

<!-- top navigation -->
<div class="top_nav">

  <div class="nav_menu hidden-print">
    <nav class="" role="navigation">
      @if (!Auth::guest())
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      @endif

      <ul class="nav navbar-nav navbar-right">
        @if (!Auth::guest())
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/img.png') }}" alt="">{{ Auth::user()->name }}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;">  Profile</a>
            </li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            <li>
              <a href="javascript:;">Help</a>
            </li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
          </ul>
        </li>
        @else
        <li><a href="{{ url('/login') }}">Acessar</a></li>
        <li><a href="{{ url('/register') }}">Cadastre-se Grátis</a></li>
        @endif
      </ul>
    </nav>
  </div>

</div>
<!-- /top navigation -->


<!-- page content -->
<div class="right_col" role="main">
  @yield('content')
</div>
<!-- /page content -->
@if (!Auth::guest())
<!-- footer content -->
<footer>
  <div class="pull-right">
    P.V.O - Gestão de Plantão de Vendas de Loteamento - Desenvolvido por <a href="http://felipequadros.com/" target="_blank">Perera</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
@endif
</div>
</div>
<script type="text/javascript">
var APP_URL = "{{ url('/') }}";
</script>
<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>

<!-- jQuery Sparklines -->
<script src="{{ asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('js/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/jquery-mask/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<!-- Specific page scripts -->
@yield('scripts')
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.js') }}"></script>

<!-- jQuery Sparklines -->
<script>
$(document).ready(function() {
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});

  $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
    type: 'bar',
    height: '40',
    barWidth: 9,
    colorMap: {
      '7': '#a1a1a1'
    },
    barSpacing: 2,
    barColor: '#26B99A'
  });

  $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
    type: 'line',
    width: '200',
    height: '40',
    lineColor: '#26B99A',
    fillColor: 'rgba(223, 223, 223, 0.57)',
    lineWidth: 2,
    spotColor: '#26B99A',
    minSpotColor: '#26B99A'
  });
});
</script>
<!-- /jQuery Sparklines -->

<!-- bootstrap-daterangepicker -->
<script type="text/javascript">
$(document).ready(function() {

  var cb = function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  };

  var optionSet1 = {
    startDate: moment().subtract(29, 'days'),
    endDate: moment(),
    minDate: '01/01/2012',
    maxDate: '12/31/2015',
    dateLimit: {
      days: 60
    },
    showDropdowns: true,
    showWeekNumbers: true,
    timePicker: false,
    timePickerIncrement: 1,
    timePicker12Hour: true,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    opens: 'left',
    buttonClasses: ['btn btn-default'],
    applyClass: 'btn-small btn-primary',
    cancelClass: 'btn-small',
    format: 'MM/DD/YYYY',
    separator: ' to ',
    locale: {
      applyLabel: 'Submit',
      cancelLabel: 'Clear',
      fromLabel: 'From',
      toLabel: 'To',
      customRangeLabel: 'Custom',
      daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      firstDay: 1
    }
  };
  $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
  $('#reportrange').daterangepicker(optionSet1, cb);
  $('#reportrange').on('show.daterangepicker', function() {
    console.log("show event fired");
  });
  $('#reportrange').on('hide.daterangepicker', function() {
    console.log("hide event fired");
  });
  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
  });
  $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
    console.log("cancel event fired");
  });
  $('#options1').click(function() {
    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
  });
  $('#options2').click(function() {
    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
  });
  $('#destroy').click(function() {
    $('#reportrange').data('daterangepicker').remove();
  });
});
</script>
<!-- /bootstrap-daterangepicker -->

<!-- Skycons -->
<script>
var icons = new Skycons({
  "color": "#73879C"
}),
list = [
  "clear-day", "clear-night", "partly-cloudy-day",
  "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
  "fog"
],
i;

for (i = list.length; i--;)
icons.set(list[i], list[i]);

icons.play();
</script>
<!-- /Skycons -->
</body>
</html>
