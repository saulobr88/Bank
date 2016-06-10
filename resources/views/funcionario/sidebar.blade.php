
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ url('/funcionario/')  }}">
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
                    <span>Clientes</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/funcionario/cliente/cadastrar') }}">Cadastrar</a></li>
                    <li><a class="" href="{{ url('/funcionario/cliente/listar') }}">Listar</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Contas</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/funcionario/conta/cadastrar') }}">Cadastrar</a></li>
                    <li><a class="" href="{{ url('/funcionario/conta/listar') }}">Listar</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>