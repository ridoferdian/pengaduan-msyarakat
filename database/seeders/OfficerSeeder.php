<?php

namespace Database\Seeders;

use App\Models\Officer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Officer::create([
            'name_officer' => 'rido ferdian',
            'username' => 'rido',
            'password' => Hash::make('123'),
            'telp' => '234234235',
            'level' => 'admin'
        ]);
    }
}