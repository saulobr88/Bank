@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar Cheques</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Cheques</a></li>
                <li><i class="fa fa-laptop"></i>Listar</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cheques
                </header>

                @include('flash::message')

                @if( $cheques != null )
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_document_alt"></i> Número</th>
                        <th><i class="icon_house_alt"></i> Valor</th>
                        <th><i class="icon_document"></i> Status </th>
                        <th><i class="icon_cogs"></i> Aç&atilde;o</th>
                    </tr>
                    @foreach($cheques as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->valor }}</td>
                            <td>{{ $c->status }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ url('/cliente/cheque/'.$c->id)}}"><i class="icon_plus_alt2"></i></a>
                                </div>
                            </td>
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