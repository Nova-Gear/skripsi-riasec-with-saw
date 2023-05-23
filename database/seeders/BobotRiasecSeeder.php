<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BobotRiasec;

class BobotRiasecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot = [
            ['Tipe' => 'R', 'A1' => 0, 'A2' => 0, 'A3' => 1, 'A4' => 1, 'A5' => 0.5, 'A6' => 0],
            ['Tipe' => 'I', 'A1' => 1, 'A2' => 1, 'A3' => 0.5, 'A4' => 0, 'A5' => 0, 'A6' => 0.5],
            ['Tipe' => 'A', 'A1' => 0.5, 'A2' => 0, 'A3' => 0, 'A4' => 0, 'A5' => 1, 'A6' => 0],
            ['Tipe' => 'S', 'A1' => 1, 'A2' => 0, 'A3' => 1, 'A4' => 0.5, 'A5' => 0.5, 'A6' => 1],
            ['Tipe' => 'E', 'A1' => 0.5, 'A2' => 0.5, 'A3' => 1, 'A4' => 0.5, 'A5' => 1, 'A6' => 0],
            ['Tipe' => 'C', 'A1' => 1, 'A2' => 0, 'A3' => 0, 'A4' => 1, 'A5' => 0, 'A6' => 1]
        ];

        foreach ($bobot as $data) {
            BobotRiasec::create($data);
        }
    }
}
