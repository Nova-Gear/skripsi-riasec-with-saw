<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstra;

class EkstraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ekstras = [
            ['name' => 'Sepak Bola'],
            ['name' => 'Tenis'],
            ['name' => 'Voli'],
            ['name' => 'KTI']
        ];
        foreach ($ekstras as $key => $ekstra) {
            Ekstra::create($ekstra);
        }

    }
}
