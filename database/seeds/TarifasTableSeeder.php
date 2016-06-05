<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TarifasTableSeeder extends Seeder
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
        $tarifas = [
            ['descricao'=>'Administracao Conta Corrente','valor'=>'39.99','dt_ini'=>$now,
                'created_at'=> $now,'updated_at' => $now],
            ['descricao'=>'Serviço de cheque','valor'=>'19.99','dt_ini'=>$now,
                'created_at'=> $now,'updated_at' => $now],
            ['descricao'=>'Acompanhamento de Emprestimo','valor'=>'21.99','dt_ini'=>$now,
                'created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('tarifas')->insert($tarifas);
    }
}
