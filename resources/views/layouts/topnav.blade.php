<div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
        <!-- inbox notificatoin end -->
        <!-- alert notification start-->
        <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="icon-bell-l"></i>
                <span class="badge bg-important">7</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-blue"></div>
                <li>
                    <p class="blue">Você possui 2 notificações</p>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-primary"><i class="icon_profile"></i></span>
                        Atualize seu cadastro
                        <span class="small italic pull-right">5 mins</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-warning"><i class="icon_pin"></i></span>
                        Proteja seu cartão
                        <span class="small italic pull-right">50 mins</span>
                    </a>
                </li>
                <li>
                    <a href="#">Veja todas notificações</a>
                </li>
            </ul>
        </li>
        <!-- alert notification end-->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">
                                {{ $user->name  }}
                            </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                    <a href="#"><i class="icon_profile"></i> Perfil</a>
                </li>
                <li>
                    <a href="#"><i class="icon_mail_alt"></i> Caixa de Entrada</a>
                </li>
                <li>
                    <?php
                        $logoutUrl = "#";
                        if ( $guard == 'funcionarios'){
                            $logoutUrl = "/funcionario/logout";
                        }
                        if ( $guard == 'web'){
                            $logoutUrl = "/cliente/logout";
                        }
                    ?>
                    <a href="{{ url($logoutUrl) }}"><i class="icon_key_alt"></i> Sair do Sistema</a>
                </li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
</div>