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
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Cartão</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Consultar Faturas</a></li>
                    <li><a class="" href="#">Pagar Faturas</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Cheques</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ url('/cliente/cheque/listar') }}">Consultar</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Emprestimos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Contratar</a></li>
                    <li><a class="" href="#">Consultar</a></li>
                    <li><a class="" href="#">Pagar</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Investimentos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Consultar</a></li>
                    <li><a class="" href="#">Contratar</a></li>
                    <li><a class="" href="#">Resgatar</a></li>
                </ul>
            </li>
            <li>
                <a class="" href="#">
                    <i class="icon_genius"></i>
                    <span>Agendamentos</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ url('/cliente/tarifa/listar') }}">
                    <i class="icon_genius"></i>
                    <span>Taxas</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>Outros Serviços</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="#">Informe IR</a></li>
                    <li><a class="" href="#">Notificaçoes</a></li>
                    <li><a class="" href="#">Recarga para Celular</a></li>
                    <li><a class="" href="#">Debito automático</a></li>
                    <li><a class="" href="#">Ordem Casa de Cámbio</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>