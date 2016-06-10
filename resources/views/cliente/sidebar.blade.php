<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ url('/cliente') }}">
                    <i class="icon_house_alt"></i>
                    <span>Página Inicial</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Saldo e Extratos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/cliente/extrato/listar') }}">Extrato</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Transferências</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/cliente/transferencia/cadastrar') }}">Efetuar</a></li>
                    <li><a class="" href="{{ url('/cliente/transferencia/listar') }}">Listar</a></li>
                    <li><a class="" href="{{ url('/cliente/transferencia/listarAgendados') }}">Agendadas</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Pagamentos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/cliente/pagamento/cadastrar') }}">Efetuar</a></li>
                    <li><a class="" href="{{ url('/cliente/pagamento/listar') }}">Listar</a></li>
                    <li><a class="" href="{{ url('/cliente/pagamento/listarAgendados') }}">Agendados</a></li>
                </ul>
            </li>

            <li>
                <a class="" href="{{ url('/cliente/cheque/listar') }}">
                    <i class="icon_document_alt"></i>
                    <span>Cheques</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ url('/cliente/notificacao/listar') }}">
                    <i class="icon_document_alt"></i>
                    <span>Notificações</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ url('/cliente/tarifa/listar') }}">
                    <i class="icon_genius"></i>
                    <span>Taxas</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>