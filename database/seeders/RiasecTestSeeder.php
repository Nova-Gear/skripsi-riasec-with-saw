<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiasecTest;

class RiasecTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = [
            [
                'soal' => 'I enjoy building things with my hands and working outdoors.',
                'type' => 'R',
            ],
            [
                'soal' => 'I like to work on cars, trucks, or other vehicles.',
                'type' => 'I',
                
            ],
            [
                'soal' => 'I enjoy playing sports and outdoor activities.',
                'type' => 'A',
                
            ],
            [
                'soal' => 'I like to design and build things using a computer.',
                'type' => 'S',
                
            ],
            [
                'soal' => 'I enjoy cooking or baking.',
                'type' => 'E',
                
            ],
            [
                'soal' => 'I enjoy talking',
                'type' => 'C',
                
            ],
        ];

        foreach ($tests as $test) {
            RiasecTest::create($test);
        }
    }
}
