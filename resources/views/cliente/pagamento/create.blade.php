@extends('layouts.app')
@section('content')
    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Pagamento</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Pagamento</a></li>
                <li><i class="fa fa-laptop"></i>Cadastrar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pagamento
                </header>
                <div class="panel-body">

                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    {!! Form::open( ['url'=>'/cliente/pagamento/store', 'class'=>'form-horizontal'])!!}

                    {!! Form::hidden('conta_id',$conta->id)!!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Código</label>
                        <div class="col-sm-8">
                            {!! Form::number(
                            'codigo', old('codigo'),
                            ['class'=>'form-control','placeholder'=>'Número do boleto','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Vencimento</label>
                        <div class="col-sm-8">
                            <?php
                                $today = date('Y-m-d');
                            ?>
                            {!! Form::date(
                                'dt_vencimento', $today,
                                ['class'=>'form-control','placeholder'=>'Data de Vencimento','maxlength'=>'255',
                                'min'=> $today]
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pagamento</label>
                        <div class="col-sm-8">
                            {!! Form::date(
                            'dt_pagamento', $today,
                            ['class'=>'form-control','placeholder'=>'Data de Pagamento','maxlength'=>'255',
                                'min'=>$today]
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Multa</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'vl_multa', old('vl_multa'),
                            ['class'=>'form-control','placeholder'=>'Valor da Multa','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Valor</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'valor', old('valor'),
                            ['class'=>'form-control','placeholder'=>'Valor da Multa','maxlength'=>'255']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-8">
                            {!! Form::text(
                            'descricao', old('descricao'),
                            ['class'=>'form-control','placeholder'=>'Descrição do pagamento','maxlength'=>'255']
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