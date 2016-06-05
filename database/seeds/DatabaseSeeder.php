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
        $this->call(AgenciasTableSeeder::class);
        $this->call(Conta_tiposTableSeeder::class);
        $this->call(Funcionario_tiposTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(FuncionariosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ContasTableSeeder::class);
        $this->call(TarifasTableSeeder::class);
        $this->call(CartaosTableSeeder::class);
        $this->call(Transacao_tiposTableSeeder::class);


    }
}
