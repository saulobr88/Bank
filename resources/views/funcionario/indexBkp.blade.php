<?php
 $f = auth()->guard('funcionarios')->user();
 $agencia = $f->agencia;
 $contas = $f->contas;

?>
<h1>{{$f->name}} | {{$f->email}} | {{ $f->cpf}}</h1>
@if( $agencia != null )
    <hr>
    <h2>Minha agência</h2>
    <p>
        Número: {{$agencia->id}} | Nome: {{$agencia->name}}
    </p>
@endunless

<hr>
<h2>Contas de Clientes</h2>
@foreach ( $contas as $conta)
    <p>
        Conta: {{ $conta->numero }} | Agência: {{ $conta->agencia->id  }}({{ $conta->agencia->name }}) | Saldo: R$ {{ $conta->saldo }}
        <br>
        Cliente: {{ $conta->user->name }} | CPF: {{ $conta->user->cpf }} | Email: {{ $conta->user->email }}
    </p>
@endforeach