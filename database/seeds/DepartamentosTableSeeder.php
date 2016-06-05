<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepartamentosTableSeeder extends Seeder
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
        $departamentos = [
            ['name'=>'SAC','agencia'=>'1','created_at'=> $now,'updated_at' => $now],
            ['name'=>'Gerencia Geral','agencia'=>'1','created_at'=> $now,'updated_at' => $now],
        ];
        DB::table('departamentos')->insert($departamentos);
    }
}
