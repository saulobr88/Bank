<?php
$agencia = $user->agencia;
$contas = $user->contas;
?>
<h1>{{$user->name}} | {{$user->email}} | {{ $user->cpf}}</h1>
<hr>
<h2>Minha agência</h2>
<p>
@if( $agencia != null )
    Número: {{$agencia->id}} | Nome: {{$agencia->name}}
@else
    Agência não configurada.
@endif
</p>
<hr>
<h2>Contas de Clientes</h2>
@if( $contas != null )
    @foreach ( $contas as $conta )
        <p>
            Conta: {{ $conta->numero }} | Agência: {{ $conta->agencia->id  }}({{ $conta->agencia->name }}) | Saldo: R$ {{ $conta->saldo }}
            <br>
            Cliente: {{ $conta->user->name }} | CPF: {{ $conta->user->cpf }} | Email: {{ $conta->user->email }}
        </p>
    @endforeach
@else
    Nenhuma conta vinculada.
@endif

<hr>
@if ( isset($guard) )
    <p>O guard de autenticação é: {{ $guard }}</p>
@endif