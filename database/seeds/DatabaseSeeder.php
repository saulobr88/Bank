<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $now = Carbon::now()->format('Y-m-d H:i:s');
        $agencias = [
            ['name'=>'Agamenon Magalhães','cep'=>'52010-040','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Dom Manoel de Medeiros','cep'=>'52171-900','created_at'=> $now,'updated_at' => $now ],
        ];
        DB::table('agencias')->insert($agencias);

        $funcionario_tipos = [
            ['name'=>'Atendente','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Caixa','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Gerente','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Supervisor de Agência','created_at'=> $now,'updated_at' => $now ],
        ];
        DB::table('funcionario_tipos')->insert($funcionario_tipos);

        $senha = Hash::make('123456');
        $funcionarios = [
            ['name'=>'Felipe Rocha Goncalves','email'=>'feliperochagoncalves@bcc.ufrpe.br','password'=>$senha,
             'cpf'=>'24838069456','cep'=>'1203','numero'=>'321',
             'tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Gustavo Ferreira Santos','email'=>'gustavoferreirasantos@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'83484091304','cep'=>'2066','numero'=>'654',
                'tipo'=>'1', 'salario'=>'1500.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Marisa Barbosa Carvalho','email'=>'marisabarbosacarvalho@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'14347664460','cep'=>'3253','numero'=>'452',
                'tipo'=>'4', 'salario'=>'9000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Gabrielle Cunha Lima','email'=>'gabriellecunhalima@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'70683800779','cep'=>'1058','numero'=>'71',
                'tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Convidado','email'=>'convidado@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'12345678910','cep'=>'1050','numero'=>'70',
                'tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Marcelo Luiz Monteiro Marinho','email'=>'marcelo.marinho@ufrpe.br','password'=>$senha,
                'cpf'=>'12345678911','cep'=>'1051','numero'=>'71',
                'tipo'=>'3', 'salario'=>'5000.00', 'created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('funcionarios')->insert($funcionarios);

        $departamentos = [
            ['name'=>'SAC','agencia'=>'1','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Gerencia Geral','agencia'=>'1','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('departamentos')->insert($departamentos);

        $users = [
            ['name'=>'Thaís Silva Carvalho','email'=>'thaissilvacarvalho@rhyta.com','password'=>$senha,
                'cpf'=>'62139843568','cep'=>'1188','numero'=>'834', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Guilherme Ferreira Azevedo','email'=>'guilhermeferreiraazevedo@dayrep.com','password'=>$senha,
                'cpf'=>'36575733808','cep'=>'4024','numero'=>'37', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Leon Aligue Madera','email'=>'jmleon12@yopmail.com','password'=>$senha,
                'cpf'=>'56363555688','cep'=>'774','numero'=>'1453', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Laia Dina Lemhamdi Sasheva','email'=>'hhlaiadina7@yopmail.com','password'=>$senha,
                'cpf'=>'55549440296','cep'=>'1187','numero'=>'897', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Convidado','email'=>'convidado@bcc.ufrpe.br','password'=>$senha,
                'cpf'=>'12345678910','cep'=>'1050','numero'=>'70', 'created_at'=> $now,'updated_at' => $now],

            ['name'=>'Marcelo Luiz Monteiro Marinho','email'=>'marcelo.marinho@ufrpe.br','password'=>$senha,
                'cpf'=>'12345678911','cep'=>'1051','numero'=>'71', 'created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('users')->insert($users);

        $conta_tipos = [
            ['name'=>'Corrente','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Poupança','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Investimento','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Especial','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('conta_tipos')->insert($conta_tipos);

        $contas = [
            ['numero'=>'1701','agencia'=>'1','user'=>'1','saldo'=>'5000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1702','agencia'=>'1','user'=>'2','saldo'=>'13000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1703','agencia'=>'1','user'=>'3','saldo'=>'57000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1704','agencia'=>'1','user'=>'4','saldo'=>'70000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1705','agencia'=>'1','user'=>'5','saldo'=>'75000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1706','agencia'=>'1','user'=>'6','saldo'=>'76000.00','tipo'=>'1','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('contas')->insert($contas);
    }
}
