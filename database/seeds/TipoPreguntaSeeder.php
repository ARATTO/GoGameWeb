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
            'NOMBRETIPOPREGUNTA' => "PRINCIPIANTE",
        ]);
        DB::table('TIPOPREGUNTA')->insert([
            'NOMBRETIPOPREGUNTA' => "INTERMEDIO",
        ]);
        DB::table('TIPOPREGUNTA')->insert([
            'NOMBRETIPOPREGUNTA' => "AVANZADO",
        ]);
    }
}
