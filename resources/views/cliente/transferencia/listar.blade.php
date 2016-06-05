@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar Transferências</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Transferências</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Transferências
                </header>

                @include('flash::message')

                @if( $transferencias != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Data</th>
                        <th><i class="icon_house_alt"></i> Valor</th>
                        <th><i class="icon_document"></i> Beneficiado </th>
                        <th><i class="icon_document"></i> Status </th>
                    </tr>
                    @foreach($transferencias as $t)
                        <tr>
                            <td>{{ $t->dt_t }}</td>
                            <td>{{ $t->valor }}</td>
                            <td>{{ $t->nome_destino }}</td>
                            <td>{{ $t->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    Nenhuma Transferência.
                @endif
            </section>
        </div>

    </div><!--/.row-->
@endsection