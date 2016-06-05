<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContasTableSeeder extends Seeder
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
        $contas = [
            ['numero'=>'1701','agencia_id'=>'1','user_id'=>'1', 'funcionario_id'=>'1',
                'saldo'=>'5000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1702','agencia_id'=>'1','user_id'=>'2', 'funcionario_id'=>'4',
                'saldo'=>'13000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1703','agencia'=>'1','user_id'=>'3', 'funcionario_id'=>'5',
                'saldo'=>'57000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1704','agencia'=>'1','user_id'=>'4', 'funcionario_id'=>'6',
                'saldo'=>'70000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1705','agencia'=>'1','user_id'=>'5', 'funcionario_id'=>'3',
                'saldo'=>'75000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
            ['numero'=>'1706','agencia'=>'1','user_id'=>'6', 'funcionario_id'=>'3',
                'saldo'=>'76000.00','conta_tipo_id'=>'1','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('contas')->insert($contas);
    }
}
