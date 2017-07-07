<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoGrupoSeeder::class);
        $this->call(TipoPreguntaSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
