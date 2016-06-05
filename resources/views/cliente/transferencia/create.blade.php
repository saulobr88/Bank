@extends('layouts.app')
@section('content')
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Transferências</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Transferência</a></li>
                <li><i class="fa fa-laptop"></i>Cadastrar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Transferência
                </header>
                <div class="panel-body">

                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {!! Form::open( ['url'=>'/cliente/transferencia/store', 'class'=>'form-horizontal'])!!}

                    {!! Form::hidden('conta_id',$conta->id)!!}
                    {!! Form::hidden('tipo','TED')!!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número do Banco</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'banco', old('banco'),
                            ['class'=>'form-control','placeholder'=>'Número do Banco','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número da Agência</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'agencia', old('agencia'),
                            ['class'=>'form-control','placeholder'=>'Número da Agência','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número da Conta</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'numero', old('numero'),
                            ['class'=>'form-control','placeholder'=>'Número da Conta','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">CPF ou CNPJ</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'cnp_destino', old('cnp_destino'),
                            ['class'=>'form-control','placeholder'=>'Apenas números','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Beneficiário</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'nome_destino', old('nome_destino'),
                            ['class'=>'form-control','placeholder'=>'Nome títular da Conta','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Valor</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'valor', old('valor'),
                            ['class'=>'form-control','placeholder'=>'Valor','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Data</label>
                        <div class="col-sm-8">
                            <?php
                                $today = date('Y-m-d');
                            ?>
                            {!! Form::date(
                                'dt_t', $today,
                                ['class'=>'form-control','placeholder'=>'Data de realização da Transferência'
                                ,'maxlength'=>'255', 'min'=> $today]
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'tipo_2', 'TED',
                            ['class'=>'form-control','placeholder'=>'Descrição do pagamento','maxlength'=>'255',
                             'disabled'=>'true']
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