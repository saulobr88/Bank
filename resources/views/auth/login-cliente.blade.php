@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login Cliente</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('identificacao') ? ' has-error' : '' }}">
                            <label for="identificacao" class="col-md-4 control-label">Identificação</label>

                            <div class="col-md-6">
                                <input id="identificacao" type="text" class="form-control" name="identificacao" value="{{ old('identificacao') }}" placeholder="Email ou CPF">

                                @if ($errors->has('identificacao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identificacao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
