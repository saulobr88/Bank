@extends('layouts.app')
@section('content')
<?php
    $contas = $user->contas;
?>
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Painel</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Início</a></li>
            <li><i class="fa fa-laptop"></i>Painel</li>
        </ol>
    </div>
</div>

<div class="row">


    @if( $contas != null )
        @foreach($contas as $conta)
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
                <p>Conta: {{ $conta->numero }} </p>
                <p>Agência: {{ $conta->agencia_id }}</p>
                <div class="count">R$ {{ $conta->saldo  }}</div>
                <div class="title">Saldo Atual (Conta {{ $conta->conta_tipo->name }})</div>
            </div><!--/.info-box-->
        </div><!--/.col-->
        @endforeach
    @else
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <p>Nenhuma conta vinculada.</p>
        </div>
    @endif

</div><!--/.row-->
@endsection