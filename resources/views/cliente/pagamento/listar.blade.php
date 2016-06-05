@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar Pagamentos</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Pagamentos</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pagamentos
                </header>

                @include('flash::message')

                @if( $pagamentos != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Data</th>
                        <th><i class="icon_house_alt"></i> Valor</th>
                        <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                    </tr>
                    @foreach($pagamentos as $pagamento)
                        <tr>
                            <td>{{ $pagamento->dt_pagamento }}</td>
                            <td>{{ $cliente->valor }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    Nenhum Pagamento.
                @endif
            </section>
        </div>

    </div><!--/.row-->
@endsection