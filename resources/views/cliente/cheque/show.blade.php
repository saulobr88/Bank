@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Cheque</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Cheque</a></li>
                <li><i class="fa fa-newspaper-o"></i>Detalhes</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
                <div class="panel-body">
                    <div class="col-lg-2 col-sm-2">
                        <h4>{{ $cheque->id  }}</h4>
                    </div>
                    <div class="col-lg-4 col-sm-4 follow-info">
                        <p> R$ {{ $cheque->valor }}</p>

                            <span><i class="icon_id-2"></i> Beneficiário: {{ $cheque->nome_destino }}</span>
                        <br>
                            <span><i class="icon_ribbon_alt"></i> Status: {{ $cheque->status }}</span>
                        <br>
                            <span><i class="icon_calendar"></i> Criado em: {{ $cheque->created_at }}</span>
                        <br>
                            <span><i class="icon_calendar"></i> Atualizado em: {{ $cheque->updated_at }}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection