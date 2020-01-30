@extends('adminlte::page') @section('content_header')
<h1>Enviar base de dados - {{Session::get('gestor_pedido_selecionado')->cd_pedido}}</h1>
@stop @section('css')

@stop @section('content')

@if (\Session::has('success'))
    <div class="alert alert-success">{!! \Session::get('success') !!}</div>
@endif

@if (\Session::has('error'))
    <div class="alert alert-danger">{!! \Session::get('error') !!}</div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><a class="btn btn-success" href="{{route('gestor.exportaBaseFull')}}"><i class="fa fa-download"></i> Exportar base full</a></h3>
          <h3 class="box-title"><a class="btn btn-warning" href="{{route('gestor.exportaLayout')}}"><i class="fa fa-download"></i> Exportar layout</a></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form class="form-horizontal" method="post" action="{{route('uploadDocument')}}" enctype="multipart/form-data">
          <div class="box-body">
            {{csrf_field()}}

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Base</label>
                <div class="col-sm-10">
                  <input type="radio" name="tipo[]" value="Base Full" checked /> Base full
                  <input type="radio" name="tipo[]" value="Inclusão" /> Somente inclusão
                </div>
              </div>

              <div class="form-group">
                  <label for="document"  class="col-sm-2 control-label">Base de dados</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="document">
                  </div>
              </div>

          </div>

            <div class="box-footer" style="background-color:transparent">
                <button type="submit" class="btn btn-success pull-right">Enviar</button>
            </div>

        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@component('gestor.formCadastroEdicaoVidas')
@endcomponent


@stop @section('js')

@stop
