<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Funcionario_tiposTableSeeder extends Seeder
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
        $funcionario_tipos = [
            ['name'=>'Atendente','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Caixa','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Gerente','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Supervisor de Agência','created_at'=> $now,'updated_at' => $now ],
        ];
        DB::table('funcionario_tipos')->insert($funcionario_tipos);
    }
}
