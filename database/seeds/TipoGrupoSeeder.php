<?php

use Illuminate\Database\Seeder;

class TipoGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TIPOGRUPO')->insert([
            'NOMBRETIPOGRUPO' => "TEORICO",
        ]);
        DB::table('TIPOGRUPO')->insert([
            'NOMBRETIPOGRUPO' => "DISCUSION",
        ]);
        DB::table('TIPOGRUPO')->insert([
            'NOMBRETIPOGRUPO' => "LABORATORIO",
        ]);
    }
}
