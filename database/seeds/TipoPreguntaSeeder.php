<?php

use Illuminate\Database\Seeder;

class TipoPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('TIPOPREGUNTA')->insert([
            'NOMBRETIPOPREGUNTA' => "Opcion Multiple",
        ]);
        DB::table('TIPOPREGUNTA')->insert([
            'NOMBRETIPOPREGUNTA' => "Verdadero-Falso",
        ]);
    }
}
