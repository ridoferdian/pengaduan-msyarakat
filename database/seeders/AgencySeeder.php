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
            ['parent' => '-',
             'name' => 'Kementerian Uang',
             'type' => 'Kementerian',
             'prefix_sms' => '-',
             'slug' => 'name'
        ],
            ['parent' => '-',
             'name' => 'Pemkot Uang',
             'type' => 'Pemkot',
             'prefix_sms' => '-',
             'slug' => 'a'

        ],
            ['parent' => '-',
             'name' => 'Lembaga Uang',
             'type' => 'Lembaga',
             'prefix_sms' => '-',
             'slug' => 'b'
        ],
        ]);
    }
}