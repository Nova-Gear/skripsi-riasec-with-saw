<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RiasecResult;

class RiasecResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = User::where('name','mahasiswa')->first();
        $mahasiswa_id = $mahasiswa->id;

        $results = [
            ['user_id' => $mahasiswa_id, 'answer' => 'R,I,A,S,E,C', 'score' => '10,9,8,7,6,5,4', 'result' => 'E,I,A,S,R', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $mahasiswa_id, 'answer' => 'R,I,A,S,E,C', 'score' => '10,9,8,7,6,5,4', 'result' => 'S,A,R,I,E', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $mahasiswa_id, 'answer' => 'R,I,A,S,E,C', 'score' => '10,9,8,7,6,5,4', 'result' => 'I,A,R,E,S', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $mahasiswa_id, 'answer' => 'R,I,A,S,E,C', 'score' => '10,9,8,7,6,5,4', 'result' => 'R,S,E,A,I', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $mahasiswa_id, 'answer' => 'R,I,A,S,E,C', 'score' => '10,9,8,7,6,5,4', 'result' => 'A,R,E,I,S', 'created_at' => now(), 'updated_at' => now()],
        ];

        RiasecResult::insert($results);
    }
}
