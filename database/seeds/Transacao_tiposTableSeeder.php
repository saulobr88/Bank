<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Transacao_tiposTableSeeder extends Seeder
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
        $transacao_tipos = [
            ['nome'=>'Deposito','descricao'=>'Entrada de valor','debito'=>'0',
                'created_at'=> $now,'updated_at' => $now],
            ['nome'=>'Retirada','descricao'=>'Saída de valor','debito'=>'1',
                'created_at'=> $now,'updated_at' => $now],
            ['nome'=>'Transferência','descricao'=>'Saida de valor','debito'=>'1',
                'created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('transacao_tipos')->insert($transacao_tipos);
    }
}
