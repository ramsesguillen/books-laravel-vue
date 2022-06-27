<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'description' => 'Historia'
            ],
            [
                'description' => 'Geografía'
            ],
            [
                'description' => 'Ciencias sociales y política'
            ],
            [
                'description' => 'Medicina y salud'
            ],
            [
                'description' => 'Ciencias físicas'
            ],
            [
                'description' => 'Filosofía'
            ],
            [
                'description' => 'Arquitectura'
            ],
            [
                'description' => 'Ingenieria'
            ],
            [
                'description' => 'Gastronomía'
            ],
            [
                'description' => 'Astes plásticas'
            ],
            [
                'description' => 'Negocios'
            ],
            [
                'description' => 'Comunicación'
            ],
        ]);
    }
}
