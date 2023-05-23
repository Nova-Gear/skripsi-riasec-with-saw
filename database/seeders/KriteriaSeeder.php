<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $defaultWeights = [0.15, 0.15, 0.15, 0.30, 0.15, 0.10];

        for ($i = 0; $i < count($defaultWeights); $i++) {
            Kriteria::create([
                'name' => "C".($i+1),
                'weight' => $defaultWeights[$i],
            ]);
        }
    }
}
