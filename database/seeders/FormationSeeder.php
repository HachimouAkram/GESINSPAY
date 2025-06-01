<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Formation::create([
            'nom' => 'Développement Web',
            'description' => 'Formation complète en développement web moderne',
            'duree' => 6,
            'prix' => 1200.00,
            'is_featured' => true
        ]);
    }
}
