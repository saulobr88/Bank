@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Notificações</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Notificações</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Notificações
                </header>

                @include('flash::message')

                @if( $notificacoes != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Data</th>
                        <th><i class="icon_quotations_alt2"></i> Mensagem</th>
                    </tr>
                    @foreach($notificacoes as $n)
                        <tr>
                            <td>{{ $n->created_at }}</td>
                            <td>{{ $n->msg }}</td>
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