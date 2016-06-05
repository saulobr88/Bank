@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar Clientes</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Clientes</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Clientes
                </header>

                @include('flash::message')

                @if( $clientes != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> CPF</th>
                        <th><i class="icon_house_alt"></i> Nome</th>
                        <th><i class="icon_mail_alt"></i> Email</th>
                        <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                    </tr>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ url('/funcionario/cliente/'.$cliente->id)}}"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="{{ url('/funcionario/cliente/'.$cliente->id.'/edit')}}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ url('/funcionario/cliente/'.$cliente->id.'/destroy')}}"><i class="icon_close_alt2"></i></a>
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