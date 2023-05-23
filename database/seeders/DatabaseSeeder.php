<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
            UserSeeder::class,
            KriteriaSeeder::class,
            UkmSeeder::class,
            EkstraSeeder::class,
            PrestasiSeeder::class,
            RiasecTestSeeder::class,
            RiasecResultSeeder::class,
            BobotRiasecSeeder::class,
            MahasiswaUkmSeeder::class,
            MahasiswaEkstraSeeder::class,
        ]);

        echo "\n\n";
        echo " Seeder has finished\n";
        echo " you can login with this \n\n";
        echo " for admin\n email:admin@gmail.com\n password:password\n\n";
        echo " for user\n email:mahasiswa@gmail.com\n password:password\n\n";
    }
}

