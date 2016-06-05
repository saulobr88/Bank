<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgenciasTableSeeder extends Seeder
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
        $agencias = [
            ['name'=>'Agamenon Magalhães','cep'=>'52010-040','created_at'=> $now,'updated_at' => $now ],
            ['name'=>'Dom Manoel de Medeiros','cep'=>'52171-900','created_at'=> $now,'updated_at' => $now ],
        ];
        DB::table('agencias')->insert($agencias);
    }
}
