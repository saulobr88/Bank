@extends('layouts.app')
@section('content')
<?php
    $agencia = $user->agencia;
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

        <div class="col-lg-12">
            <h2>Minha agência</h2>
            <p>
                @if( $agencia != null )
                    Número: {{$agencia->id}} | Nome: {{$agencia->name}} | Meu Cargo: {{ $user->funcionario_tipo->name }}
                @else
                    Agência não configurada.
                @endif
            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Contas de Clientes
                </header>
                @if( $contas != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Conta</th>
                        <th><i class="icon_house_alt"></i> Agência</th>
                        <th><i class="icon_creditcard"></i> Saldo (R$)</th>
                        <th><i class="icon_profile"></i> Cliente</th>
                        <th><i class="icon_document"></i> CPF</th>
                        <th><i class="icon_mail_alt"></i> Email</th>
                        <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                    </tr>
                    @foreach($contas as $conta)
                        <tr>
                            <td>{{ $conta->numero }}</td>
                            <td>{{ $conta->agencia->id  }}</td>
                            <td>{{ $conta->saldo }}</td>
                            <td>{{ $conta->user->name }}</td>
                            <td>{{ $conta->user->cpf }}</td>
                            <td>{{ $conta->user->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    Nenhuma conta vinculada.
                @endif
            </section>
        </div>

    </div><!--/.row-->
@endsection