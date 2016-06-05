<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Conta_tiposTableSeeder extends Seeder
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
        $conta_tipos = [
            ['name'=>'Corrente','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Poupança','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Investimento','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Especial','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('conta_tipos')->insert($conta_tipos);
    }
}
