@extends('adminlte::page') @section('content_header')
<h1>Enviar base de dados</h1>
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

      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form method="post" action="{{route('uploadDocument')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="title">Nome:</label>
            <input type="text" class="form-control" name="name" value="{{Session::get('admin_name')}}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="title">CPF:</label>
            <input type="text" class="form-control" name="name" value="{{formata_cpf(Session::get('admin_cpf'))}}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="title">Pedido:</label>
            <input type="text" class="form-control" name="name" value="{{$pedido->cd_pedido}}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="document">Base de dados:</label>
            <input type="file" class="form-control" name="document">
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
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
