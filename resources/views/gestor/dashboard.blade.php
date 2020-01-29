@extends('adminlte::page')

@section('content')

<div class="row">

  @if(Session::get('gestor_pedidos')->count() > 1)
  <div class="col-md-10 col-sm-12 col-xs-12">
  @else
  <div class="col-md-12 col-sm-12 col-xs-12">
  @endif
    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">TOTAL</span>
            <span class="info-box-number" style="font-size:40px">{{$total}} vidas</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>



    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary no-border">
          <div class="box-body">
              <div class="chart">
                  <canvas id="graph_qtd_mes"></canvas>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary no-border">
          <div class="box-body">
              <div class="chart">
                  <canvas id="grafico_movimentacao_mensal"></canvas>
              </div>
          </div>
        </div>
      </div>


    </div>
  </div>


  @if(Session::get('gestor_pedidos')->count() > 1)
  <div class="col-md-2 col-sm-12 col-xs-12">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Selecione os pedidos que serão computados nos gráficos</h3>
        <form method="POST" action="{{route('gestor.postDashboard')}}">
          {{csrf_field()}}
          <div class="form-group">
            @foreach(Session::get('gestor_pedidos') as $p)
            <div class="checkbox">
              <label>
                <input type="checkbox" name="pedidos[]" value="{{$p->id_pedido}}" @if(isset($retornaPedidosSelecionados) && isset($retornaPedidosSelecionados[$p->id_pedido])) checked="checked" @endif /> {{$p->cd_pedido}}
              </label>
            </div>
            @endforeach
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Enviar" />
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif

</div>


@stop

@section('js')
<script>











var graph_qtd_mes = document.getElementById('graph_qtd_mes');
graph_qtd_mes.getContext('2d');
graph_qtd_mes.height = 500;

// Global Options
/*
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';
*/

var massPopChart = new Chart(graph_qtd_mes, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[
      @foreach($grafico_qtd_mes as $key => $qtd)
      '{{$key}}',
      @endforeach
    ],
    datasets:[{
      label:'Quantidade',
      data:[
        @foreach($grafico_qtd_mes as $qtd)
        {{$qtd}},
        @endforeach
      ],
      //backgroundColor:'#ff710f',
      backgroundColor:[
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)'
      ],
      borderWidth:1,
      borderColor:'#f39c12',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }]
  },
  options:{
    title:{
      display:true,
      text:'Quantidade total de vidas',
      fontSize:25,
      responsive: true
    },
    legend:{
      display:false,
      position:'right',
      labels:{
        fontColor:'#000'
      }
    },
    layout:{
      padding:{
        left:50,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips: {
        enabled: true,
      /*  mode: 'single',
        callbacks: {
            label: function(tooltipItems, data) {
              console.log(tooltipItems);
              console.log(data);
                return tooltipItems.yLabel + ' vidas';
            }
        } */
    },



  }
});











var grafico_movimentacao_mensal = document.getElementById('grafico_movimentacao_mensal');
grafico_movimentacao_mensal.getContext('2d');
grafico_movimentacao_mensal.height = 500;

// Global Options
/*
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';
*/

var massPopChart = new Chart(grafico_movimentacao_mensal, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[
      @foreach($grafico_qtd_mes as $key => $qtd)
      '{{$key}}',
      @endforeach
    ],
    datasets: [
      {
        label               : 'Entradas',
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
        data:[
          @foreach($grafico_movimentacao_mensal as $qtd)
          {{$qtd['entradas']}},
          @endforeach
        ]
      },
      {
        label               : 'Saídas',
        backgroundColor: 'rgba(255, 99, 132, 0.6)',
        data:[
          @foreach($grafico_movimentacao_mensal as $qtd)
          {{$qtd['saidas']}},
          @endforeach
        ]
      }
    ]
  },
  options:{
    title:{
      display:true,
      text:'Movimentação mensal de vidas',
      fontSize:25,
      responsive: true
    },
    legend:{
      display:false,
      position:'right',
      labels:{
        fontColor:'#000'
      }
    },
    layout:{
      padding:{
        left:50,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips: {
        enabled: true,
        mode: 'index',
    },



  }
});









</script>
 @stop
