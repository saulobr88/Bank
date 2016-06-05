
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="#">
                    <i class="icon_house_alt"></i>
                    <span>Página Inicial</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Funcionarios</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    @if ( $user->funcionario_tipo_id > 3 )
                    <li><a class="" href="{{ url('/funcionario/cadastrar') }}">Cadastrar</a></li>
                    @endif
                    <li><a class="" href="{{ url('/funcionario/listar') }}">Listar</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Cadastrar</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Conta</a></li>
                    <li><a class="" href="#">Cliente</a></li>
                    @if ( $user->funcionario_tipo_id > 3 )
                    <li><a class="" href="#">Funcionario*</a></li>
                    @endif
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Clientes</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/funcionario/cliente/cadastrar') }}">Cadastrar</a></li>
                    <li><a class="" href="{{ url('/funcionario/cliente/listar') }}">Listar</a></li>
                    <li><a class="" href="#">Contas</a></li>
                    <li><a class="" href="#">Limites</a></li>
                    <li><a class="" href="#">Emprestimos</a></li>
                    <li><a class="" href="#">Investimentos</a></li>
                    <li><a class="" href="#">Outros</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Contas</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Cadastrar</a></li>
                    <li><a class="" href="#">Listar</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Taxas</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Consultar</a></li>
                    @if ( $user->funcionario_tipo_id > 3 )
                    <li><a class="" href="#">Cadastrar*</a></li>
                    <li><a class="" href="#">Alterar*</a></li>
                    <li><a class="" href="#">Excluir*</a></li>
                    @endif
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>