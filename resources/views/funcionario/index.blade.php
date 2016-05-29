<?php
 $funcionario = auth()->guard('funcionarios')->user();
 $agencias = auth()->guard('funcionarios')->user()->agencias();
 $clientes = auth()->guard('funcionarios')->user()->clientes();

?>
<h1>{{$funcionario->name}} | {{$funcionario->email}} | {{ $funcionario->cpf}}</h1>
<hr>
<h2>Agências</h2>
@foreach ( $agencias as $agencia)
    <p>
        Agência: {{ $agencia->name }} | CEP: {{ $agencia->cep }}
    </p>
@endforeach

<hr>
<h2>Clientes</h2>
@foreach ( $clientes as $cliente)
    <p>
        Cliente: {{ $cliente->name }} | CPF: {{ $cliente->cpf }} | Email: {{ $cliente->email }}
    </p>
@endforeach