@extends('layouts.app')
@section('content')
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
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Clientes
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th><i class="icon_document"></i> CPF</th>
                            <th><i class="icon_profile"></i> Nome</th>
                            <th><i class="icon_mail_alt"></i> Email</th>
                            <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                        </tr>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
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
                </section>
            </div>

        </div><!--/.row-->
@endsection