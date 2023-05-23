<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ukm;


class MahasiswaUkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa_users = User::role('Mahasiswa')->get();

        foreach ($mahasiswa_users as $mahasiswa_user) {
            // Get a random UKM for this Mahasiswa user
            $random_ukm = Ukm::inRandomOrder()->first();

            // Attach the UKM to this Mahasiswa user
            $mahasiswa_user->ukm()->attach($random_ukm->id);
        }
    }
}
