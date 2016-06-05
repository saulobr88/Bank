<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CartaosTableSeeder extends Seeder
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
        $cartaos = [
            ['numero'=>'1701-1','cod_seguranca'=>'112','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'1',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1701-2','cod_seguranca'=>'115','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'1',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1702-1','cod_seguranca'=>'121','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'2',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1702-2','cod_seguranca'=>'212','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'2',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1703-1','cod_seguranca'=>'122','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'3',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1703-2','cod_seguranca'=>'213','dt_validade'=>'2018-06-01',
                'bandeira'=>'A', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'3',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1704-1','cod_seguranca'=>'121','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'4',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1704-2','cod_seguranca'=>'212','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'4',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1705-1','cod_seguranca'=>'221','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'5',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1705-2','cod_seguranca'=>'512','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'5',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1706-1','cod_seguranca'=>'121','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'DEBITO', 'user_id'=>'6',
                'created_at'=>$now, 'updated_at'=>$now],
            ['numero'=>'1706-2','cod_seguranca'=>'212','dt_validade'=>'2018-06-01',
                'bandeira'=>'B', 'limite'=>'25000.00', 'tipo'=>'CREDITO', 'user_id'=>'6',
                'created_at'=>$now, 'updated_at'=>$now],
        ];
        DB::table('cartaos')->insert($cartaos);
    }
}
