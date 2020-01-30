@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Criar um novo gestor</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label>Super usuário?</label>
                  <input type="checkbox" name="su" value="1" />
                  <span class="help-block" style="text-decoration:none;font-size:12px;">
                      <p>Atenção! Ao marcar essa opção, este usuário terá permissão para criar novos usuários, entre outras funções restritas na área do gestor.</p>
                  </span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('pedidos') ? 'has-error' : '' }}" style="max-height:300px;overflow-y: auto;">
                  <label>Selecione os pedidos em que o novo gestor terá acesso</label>
                  <span class="help-block">
                      <strong>{{ $errors->first('pedidos') }}</strong>
                  </span>
                  @foreach($pedidos as $p)
                  <input type="checkbox" name="pedidos[]" value="{{$p->id_pedido}}" /> #{{$p->id_pedido}} - {{$p->cd_pedido}}
                  <br />
                  @endforeach
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Criar gestor
                </button>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
