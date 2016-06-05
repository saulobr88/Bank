@extends('layouts.app')
@section('content')
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Painel</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Cliente</a></li>
                <li><i class="fa fa-laptop"></i>Cadastrar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cadastro de Cliente
                </header>
                <div class="panel-body">

                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {!! Form::open( ['url'=>'/funcionario/cliente/store', 'class'=>'form-horizontal'])!!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'name', old('name'),
                            ['class'=>'form-control','placeholder'=>'Nome Completo','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                                'email', old('email'),
                                ['class'=>'form-control','placeholder'=>'Endereço de E-mail','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-8">
                            {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Senha']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">CPF</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'cpf', old('cpf'),
                            ['class'=>'form-control','placeholder'=>'CPF Somente números','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">CEP</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'cep', old('cep'),
                            ['class'=>'form-control','placeholder'=>'CEP Somente números','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'numero', old('numero'),
                            ['class'=>'form-control','placeholder'=>'Número referênte ao endereço','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Salvar</button>

                    {!! Form::close() !!}

                </div>
            </section>
        </div>

    </div><!--/.row-->
@endsection