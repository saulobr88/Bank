@extends('layouts.login')

@section('content')

<div class="container">
    <div class="row">
        {!! Form::open( ['url'=>'/funcionario/login', 'class'=>'login-form'])!!}
        {{ csrf_field() }}
        <div class="login-wrap">
            <h2>Funcion&aacute;rio</h2>
            <p class="login-img"><i class="icon_lock_alt"></i></p>

            <div class="form-group{{ $errors->has('identificacao') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_document"></i></span>
                    {!! Form::text(
                        'identificacao', old('identificacao'),
                        ['class'=>'form-control','placeholder'=>'Email ou CPF','maxlength'=>'255']
                    ) !!}
                </div>
                @if ($errors->has('identificacao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('identificacao') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Senha']) !!}
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection