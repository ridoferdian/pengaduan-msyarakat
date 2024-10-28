<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::insert([
            ['parent' => 'Kanwil Kementerian Hukum dan HAM Kalimantan Selatan',
             'name' => 'Lapas Perempuan Kelas IIA Bandung',
             'type' => 'Kementerian',
             'prefix_sms' => '-',
             'slug' => 'Kementerian-Uang'
        ],  
            ['parent' => '-',
             'name' => 'Pemkot Uang',
             'type' => 'Pemkot',
             'prefix_sms' => '-',
             'slug' => 'Pemkot-Uang'

        ],
            ['parent' => '-',
             'name' => 'Lembaga Uang',
             'type' => 'Lembaga',
             'prefix_sms' => '-',
             'slug' => 'Lembaga-Uang'
        ],
        ]);
    }
}
