<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $senha = Hash::make('123456');
        $funcionarios = [
            ['name'=>'Felipe Rocha Goncalves','email'=>'feliperochagoncalves@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'24838069456','cep'=>'1203','numero'=>'321',
                'agencia_id'=>'1', 'funcionario_tipo_id'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Gustavo Ferreira Santos','email'=>'gustavoferreirasantos@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'83484091304','cep'=>'2066','numero'=>'654',
                'agencia_id'=>'1', 'funcionario_tipo'=>'1', 'salario'=>'1500.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Marisa Barbosa Carvalho','email'=>'marisabarbosacarvalho@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'14347664460','cep'=>'3253','numero'=>'452',
                'agencia_id'=>'1', 'funcionario_tipo'=>'4', 'salario'=>'9000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Gabrielle Cunha Lima','email'=>'gabriellecunhalima@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'70683800779','cep'=>'1058','numero'=>'71',
                'agencia_id'=>'1', 'funcionario_tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Convidado','email'=>'convidado@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'12345678910','cep'=>'1050','numero'=>'70',
                'agencia_id'=>'1', 'funcionario_tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Marcelo Luiz Monteiro Marinho','email'=>'marcelo.marinho@ufrpe.br','password'=>$senha,
                'cpf'=>'12345678911','cep'=>'1051','numero'=>'71',
                'agencia_id'=>'1', 'funcionario_tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('funcionarios')->insert($funcionarios);
    }
}
