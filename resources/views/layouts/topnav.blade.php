<div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
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