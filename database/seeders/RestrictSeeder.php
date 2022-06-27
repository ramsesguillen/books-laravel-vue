<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restricts')->insert([
            [
                'description' => 'Para todo el público'
            ],
            [
                'description' => 'Para adolecentes de 12 años en adelante'
            ],
            [
                'description' => 'No recomendable para menosres de 15 años de adad'
            ],
            [
                'description' => 'Para adultos de 18 años en adelante'
            ],
            [
                'description' => 'Para adultos, con sexo explicito, lenguaje procaz o alto grado de violencia'
            ],
        ]);
    }
}
