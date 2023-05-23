<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ukm;

class UkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ukms = [
            [
                'name' => 'Kesejahteraan Masyarakat',
                'detail' => 'Usaha Mahasiswa (USMA Polinema)',
                'image' => 'ukm1.jpg',
            ],
            [
                'name' => 'Pendidikan/Jurnalistik',
                'detail' => 'Pendidikan dan Penalaran Polinema Komunikasi Pendidikan (KOMPEN) Radio PLFM',
                'image' => 'ukm2.jpg',
            ],
            [
                'name' => 'Sosial',
                'detail' => 'Bhakti Karya Mahasiswa PASTI Polinema Resimen Mahasiswa',
                'image' => 'ukm3.jpg',
            ],
            [
                'name' => 'Olahraga',
                'detail' => 'UKM Olahraga OPA Ganendra Giri',
                'image' => 'ukm3.jpg',
            ],
            [
                'name' => 'Seni',
                'detail' => 'Seni Theatrisic',
                'image' => 'ukm3.jpg',
            ],
            [
                'name' => 'Keagamaan',
                'detail' => 'Kerohanian islam polinema KMK Talitakum Family Polinema',
                'image' => 'ukm3.jpg',
            ],
        ];
        
        Ukm::insert($ukms);
    }
}
