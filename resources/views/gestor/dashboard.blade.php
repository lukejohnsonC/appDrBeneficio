@extends('adminlte::page')

@section('content')

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">TOTAL</span>
        @if($sem_sexo)
        <span class="info-box-number" style="font-size:25px">{{$total}} vidas</span>
        <span class="progress-description">
          {{$sem_sexo}} vidas estão na base sem informação sobre sexo
        </span>
        @else
        <span class="info-box-number" style="font-size:40px">{{$total}} vidas</span>
        @endif
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fas fa-mars"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Masculino</span>
        <span class="info-box-number">{{$masculino}} vidas</span>

        <div class="progress">
          <div class="progress-bar" style="width: {{$perc_masculino}}%"></div>
        </div>
            <span class="progress-description">
              Corresponde a {{$perc_masculino}}% do total
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box bg-red">
    <span class="info-box-icon"><i class="fas fa-venus"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Feminino</span>
      <span class="info-box-number">{{$feminino}} vidas</span>

      <div class="progress">
        <div class="progress-bar" style="width: {{$perc_feminino}}%"></div>
      </div>
          <span class="progress-description">
            Corresponde a {{$perc_feminino}}% do total
          </span>
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
      <div class="box-header with-border">
          <h3 class="box-title">Benefícios</h3>
      </div>
<div class="box-body">
    <table class="table table-striped">
      <tbody>
        @foreach($beneficios as $b)
        <tr>
          <td><b>{{$b->NM_BENEF}}</b></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
  </div>
</div>










<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="box box-primary no-border">
{{--
<div class="box-header with-border">
    <h3 class="box-title">Area Chart</h3>

    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
</div>
--}}
<div class="box-body">
    <div class="chart">
        <canvas id="myChart1"></canvas>
    </div>
</div>
</div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="box box-primary no-border">
<div class="box-body">
    <div class="chart">
        <canvas id="graph_ativo_inativo"></canvas>
    </div>
</div>
</div>
  </div>
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
      text:'Quantidade de vidas por mês',
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




















var myChart1 = document.getElementById('myChart1');
myChart1.getContext('2d');
myChart1.height = 500;

// Global Options
/*
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';
*/

var massPopChart = new Chart(myChart1, {
  type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[
      @foreach($grafico_idade as $key => $gi)
      '{{$key}} anos',
      @endforeach
    ],
    datasets:[{
      label:'Quantidade',
      data:[
        @foreach($grafico_idade as $gi)
        {{$gi}},
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
      text:'Quantidade de vidas por idade',
      fontSize:25,
      responsive: true
    },
    legend:{
      display:true,
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











var graph_ativo_inativo = document.getElementById('graph_ativo_inativo');
graph_ativo_inativo.getContext('2d');
graph_ativo_inativo.height = 500;

// Global Options
/*
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';
*/

var massPopChart = new Chart(graph_ativo_inativo, {
  type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[
      @foreach($ativo_inativo as $key => $ai)
      '{{$key}}',
      @endforeach
    ],
    datasets:[{
      label:'Quantidade',
      data:[
        @foreach($ativo_inativo as $ai)
        {{$ai}},
        @endforeach
      ],
      //backgroundColor:'#ff710f',
      backgroundColor:[
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 99, 132, 0.6)',
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
      text:'Quantidade de ativos/inativos',
      fontSize:25,
      responsive: true
    },
    legend:{
      display:true,
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
</script>
 @stop
