@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Extratos</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Extrato</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Extrato
                </header>

                <div class="col-lg-12">
                    <h2>Conta</h2>
                    <p>
                        Número: {{ $conta->numero }} | Agência: {{ $conta->agencia_id }}
                        <br>
                        Títular: {{ $conta->user->name }}  | Saldo atual: {{ $conta->saldo }}
                    </p>
                </div>

                @include('flash::message')

                @if( $transacaos != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Data</th>
                        <th><i class="icon_document_alt"></i> Identificação</th>
                        <th><i class="icon_house_alt"></i> Valor</th>
                        <th><i class="icon_document"></i> Tipo </th>
                        <th><i class="icon_document"></i> Descrição </th>
                    </tr>
                    @foreach($transacaos as $t)
                        <tr>
                            <td>{{ $t->dt_realizacao }}</td>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->valor }}</td>
                            @if ( $t->transacao_tipos->debito == 1)
                            <td> DÉBITO </td>
                            @else
                            <td> CRÉDITO </td>
                            @endif
                            <td>{{ $t->transacao_tipos->nome }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    Nenhuma Transação.
                @endif
            </section>
        </div>

    </div><!--/.row-->
@endsection