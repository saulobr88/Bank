@extends('layouts.app')
@section('content')
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Painel</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Cliente</a></li>
                <li><i class="fa fa-laptop"></i>Editar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Editar Conta ({{$conta->numero}})
                </header>
                <div class="panel-body">

                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {!! Form::model( $conta, [
                        'method'=>'POST',
                        'route'=>['funcionario.conta.update', $conta->id],
                        'class'=>'form-horizontal'
                    ]) !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Agência</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'agencia_id', null,
                            ['class'=>'form-control','placeholder'=>'Número único da Conta','maxlength'=>'255', 'disabled'=>'true']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'numero', null,
                            ['class'=>'form-control','placeholder'=>'Número único da Conta','maxlength'=>'255', 'disabled'=>'true']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo de Conta</label>
                        <div class="col-sm-8">
                            {!! Form::select('conta_tipo_id', $conta_tipos , null, ['id'=>'agencias_list', 'class'=>'form-control', 'disabled'=>'true']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Títular</label>
                        <div class="col-sm-8">
                            {!! Form::select('user_id', $clientes , null, ['id'=>'agencias_list', 'class'=>'form-control', 'disabled'=>'true']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gerente</label>
                        <div class="col-sm-8">
                            {!! Form::select('funcionario_id', $funcionarios , null, ['id'=>'agencias_list', 'class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Saldo</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'saldo', old('saldo'),
                            ['class'=>'form-control','placeholder'=>'Saldo inicial da conta','maxlength'=>'255', 'disabled'=>'true']
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