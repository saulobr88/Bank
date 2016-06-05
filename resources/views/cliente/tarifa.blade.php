@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Tarifas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Tarifas</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tarifas
                </header>

                @include('flash::message')

                @if( $tarifas != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Descrição</th>
                        <th><i class="icon_house_alt"></i> Valor</th>
                        <th><i class="icon_document"></i> Data Inicial </th>
                        <th><i class="icon_document"></i> Data Final </th>
                    </tr>
                    @foreach($tarifas as $t)
                        <tr>
                            <td>{{ $t->descricao }}</td>
                            <td>{{ $t->valor }}</td>
                            <td>{{ $t->dt_ini }}</td>
                            <td>{{ $t->dt_fim }}</td>
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