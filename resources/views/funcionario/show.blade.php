@extends('layouts.app')
@section('content')

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Perfil</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Funcionários</a></li>
                <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
                <div class="panel-body">
                    <div class="col-lg-2 col-sm-2">
                        <h4>{{ $funcionario->name  }}</h4>
                        <h6>{{ $funcionario->funcionario_tipo->name }}</h6>
                    </div>
                    <div class="col-lg-4 col-sm-4 follow-info">
                        <p>{{ $funcionario->email }}</p>
                        <h6>
                            <span><i class="icon_calendar"></i>{{ $funcionario->created_at }}</span>
                            <span><i class="icon_pin_alt"></i>{{ $funcionario->cep }}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection