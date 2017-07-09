<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('CATEGORIA')->insert([
            'NOMBRECATEGORIA' => "Metodo Cientifico",
        ]);
        DB::table('CATEGORIA')->insert([
            'NOMBRECATEGORIA' => "Unidades de medida",
        ]);
        DB::table('CATEGORIA')->insert([
            'NOMBRECATEGORIA' => "Laboratorio",
        ]);
    }
}
