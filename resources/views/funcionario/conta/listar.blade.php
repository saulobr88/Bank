@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar Contas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Contas</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Clientes ( {{ $contador }} )
                </header>

                @include('flash::message')

                @if( $contas != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Conta</th>
                        <th><i class="icon_house_alt"></i> Agência</th>
                        <th><i class="icon_document_alt"></i> Titular</th>
                        <th><i class="icon_document_alt"></i> CPF</th>
                        <th><i class="icon_document_alt"></i> Gerente</th>
                        <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                    </tr>
                    @foreach($contas as $conta)
                        <tr>
                            <td>{{ $conta->numero }}</td>
                            <td>{{ $conta->agencia_id }}</td>
                            <td>{{ $conta->user->name }}</td>
                            <td>{{ $conta->user->cpf }}</td>
                            <td>{{ $conta->funcionario->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- <a class="btn btn-primary" href="{{ url('/funcionario/conta/'.$conta->id)}}"><i class="icon_plus_alt2"></i></a> -->
                                    <a class="btn btn-success" href="{{ url('/funcionario/conta/'.$conta->id.'/edit')}}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ url('/funcionario/conta/'.$conta->id.'/destroy')}}"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    Nenhum Cliente.
                @endif
            </section>
        </div>

    </div><!--/.row-->
@endsection