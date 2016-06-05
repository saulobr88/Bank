<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
    }
}
