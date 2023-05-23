<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = User::where('name','mahasiswa')->first();

        $prestasis = [
            'Juara 1 Sepak Bola',
            'Juara 2 Tenis',
            'Juara 3 Voli',
        ];

        foreach ($prestasis as $key => $prestasi) {
            Prestasi::create([
                'user_id' => $mahasiswa->id,
                'title' => $prestasi,
                'description' => $mahasiswa->name.' '.$prestasi,
            ]);
        }
    }
}
