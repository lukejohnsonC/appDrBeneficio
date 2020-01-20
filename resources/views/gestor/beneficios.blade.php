@extends('adminlte::page') @section('content_header')
<h1>Benefícios</h1>
@stop @section('css')

@stop @section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
      {{--  <h3 class="box-title"><button class="btn btn-success" id="cadastrarVida"><i class="fa fa-plus"></i> Cadastrar vida</button></h3> --}}
      </div>
      <!-- /.box-header -->
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
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@component('gestor.formCadastroEdicaoVidas') @endcomponent


@stop @section('js')

 @stop
